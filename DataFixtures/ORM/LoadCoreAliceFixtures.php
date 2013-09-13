<?php

namespace Nazka\LocationBundle\DataFixtures\ORM;

use Nelmio\Alice\Fixtures;
use Symfony\Component\Finder\Finder;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

/**
 * @author Javier Sampedro <jsampedro77@gmail.com>
 */
class LoadCoreAliceFixtures implements FixtureInterface
{
    /**
     * @param \Doctrine\Common\Persistence\ObjectManager $manager
     */
    public function load(ObjectManager $manager)
    {
        $finder = new Finder();
        $files = $finder->files()->name('*.yml')->in(__DIR__ . '/Alice/');

        foreach ($files as $file) {
            Fixtures::load($file->getRealPath(), $manager, array('providers' => array($this)));
        }

        $manager->flush();
    }
}
