<?php

namespace Nazka\LocationBundle\DataFixtures\MongoDB;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Nazka\LocationBundle\DataFixtures\AbstractLoader;

/**
 * @author Javier Sampedro <jsampedro77@gmail.com>
 */
class LoadAliceFixtures extends AbstractLoader implements FixtureInterface
{

    /**
     * @param \Doctrine\Common\Persistence\ObjectManager $manager
     */
    public function load(ObjectManager $manager)
    {
        $this->loadFolder($manager, __DIR__ . '/../AliceYml/MongoDB');

        $countries = $manager->getRepository('NazkaLocationBundle:Country')->findAll();

        //relate provinces to countries, not done in fixtures
        foreach ($countries as $country) {
            $provinces = $manager->getRepository('NazkaLocationBundle:Province')->findBy(array('country.id' => $country->getId()));

            foreach ($provinces as $province) {
                $country->addProvince($province);
            }
            $manager->persist($country);
        }

        $manager->flush();
    }
}
