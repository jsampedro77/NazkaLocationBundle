<?php

namespace Nazka\LocationBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Nazka\LocationBundle\Form\AddressType;
use Nazka\LocationBundle\Entity\Address;

/**
 * Description of AddressController
 *
 * @author Javier Sampedro <jsampedro77@gmail.com>
 */
class AddressController extends Controller
{

    /**
     *
     * @param type $id
     */
    public function indexAction($id)
    {
        $address = $this->findAddress($id);
        return $this->render('NazkaLocationBundle:Address:index.html.twig', array(
                    'address' => $address
        ));
    }

    public function newAction($userId)
    {
        $address = new Address();

        $request = $this->getRequest();
        $form = $this->createForm(new AddressType(), $address);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $user = $this->getDoctrine()->getManager()->getRepository('NazkaUserBundle:User')->find($userId);
            $address->setUser($user);
            $em = $this->getDoctrine()->getManager();
            $em->persist($address);
            $em->flush();

            return $this->redirect($this->generateUrl('nazka_user_address_list', array('userId' => $address->getUser()->getId())));
        }

        return $this->render('NazkaLocationBundle:Address:new.html.twig', array(
                    'form' => $form->createView(),
                    'userId' => $userId
        ));
    }

    public function editAction($id)
    {

        $address = $this->findAddress($id);

        $request = $this->getRequest();
        $form = $this->createForm(new AddressType(), $address);

        $form->handleRequest($request);

        if ($form->isValid()) {

            $em = $this->getDoctrine()->getManager();
            $em->persist($address);
            $em->flush();

            return $this->redirect($this->generateUrl('nazka_user_address_list', array('userId' => $address->getUser()->getId())));
        }

        return $this->render('NazkaLocationBundle:Address:edit.html.twig', array(
                    'form' => $form->createView()
        ));
    }

    public function userAddressesAction($userId)
    {
        $addresses = $this->getRepository()->findBy(array('user' => $userId));

        return $this->render('NazkaLocationBundle:Address:list.html.twig', array(
                    'addresses' => $addresses,
                    'userId' => $userId
        ));
    }

    public function removeAction($id)
    {
        $address = $this->findAddress($id);

        $em = $this->getDoctrine()->getManager();
        $em->remove($address);
        $em->flush();

        return $this->redirect($this->generateUrl('nazka_user_address_list', array('userId' => $address->getUser()->getId())));
    }

    private function findAddress($id)
    {
        $address = $this->getRepository()->find($id);

        if (null === $address) {
            throw new \Symfony\Component\HttpKernel\Exception\NotFoundHttpException('Address does not exist');
        }

        return $address;
    }

    private function getRepository()
    {
        return $this->getDoctrine()->getManager()->getRepository('NazkaLocationBundle:Address');
    }
}
