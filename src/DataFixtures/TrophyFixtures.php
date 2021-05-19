<?php

namespace App\DataFixtures;

use App\Entity\Trophy;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class TrophyFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $bronze = new Trophy();
        $bronze->setColor('bronze');

        $silver = new Trophy();
        $silver->setColor('silver');

        $gold = new Trophy();
        $gold->setColor('gold');

        $manager->persist($bronze);
        $manager->persist($silver);
        $manager->persist($gold);

        $manager->flush();
    }
}
