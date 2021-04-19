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
        $bronze->setPoints(100);
        $silver = new Trophy();
        $silver->setColor('silver');
        $silver->setPoints(200);
        $gold = new Trophy();
        $gold->setColor('gold');
        $gold->setPoints(300);

        $manager->persist($bronze);
        $manager->persist($silver);
        $manager->persist($gold);

        $manager->flush();
    }
}
