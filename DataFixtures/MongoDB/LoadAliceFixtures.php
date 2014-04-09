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
        return $this->loadFolder($manager, __DIR__ . '/../AliceYml/MongoDB');
    }
}
