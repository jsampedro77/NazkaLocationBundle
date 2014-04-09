<?php

namespace Nazka\LocationBundle\DataFixtures;

use Nelmio\Alice\Fixtures;
use Symfony\Component\Finder\Finder;
use Doctrine\Common\Persistence\ObjectManager;

/**
 * @author Javier Sampedro <jsampedro77@gmail.com>
 */
abstract class AbstractLoader
{

    abstract public function load(ObjectManager $manager);

    /**
     * @param \Doctrine\Common\Persistence\ObjectManager $manager
     */
    public function loadFolder(ObjectManager $manager, $folder)
    {
        $finder = new Finder();
        $files = $finder->files()->name('*.yml')->in($folder);

        foreach ($files as $file) {
            Fixtures::load($file->getRealPath(), $manager, array('providers' => array($this)));
        }

        $manager->flush();
    }
}
