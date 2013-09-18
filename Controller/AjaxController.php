<?php

namespace Nazka\LocationBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

/**
 * Description of Ajax
 *
 * @author Javier Sampedro <jsampedro77@gmail.com>
 */
class AjaxController extends Controller
{

    public function provincesForCountryAction($countryId)
    {

        $provinces = array();
        
        if ($countryId) {
            $country = $this->get('doctrine')->getManager()->getRepository('NazkaLocationBundle:Country')->find($countryId);


            foreach ($country->getProvinces() as $province) {
                $provinces[] = array(
                    'id' => $province->getId(),
                    'name' => $province->getName());
            }
        }

        return new Response(json_encode($provinces));
    }

}
