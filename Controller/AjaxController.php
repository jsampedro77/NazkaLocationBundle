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

    public function zonesForCountryAction($countryId)
    {

        $zones = array();
        
        if ($countryId) {
            $country = $this->get('doctrine')->getManager()->getRepository('NazkaLocationBundle:Country')->find($countryId);


            foreach ($country->getZones() as $zone) {
                $zones[] = array(
                    'id' => $zone->getId(),
                    'name' => $zone->getName());
            }
        }

        return new Response(json_encode($zones));
    }

}
