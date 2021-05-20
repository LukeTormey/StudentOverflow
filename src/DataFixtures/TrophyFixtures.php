<?php

namespace App\DataFixtures;

use App\Entity\BronzeTrophy;
use App\Entity\SilverTrophy;
use App\Entity\GoldTrophy;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class TrophyFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $bronze = new BronzeTrophy();
        $bronze->setAward('bronze');
        $bronze->setImage('bronze.png');

        $silver = new SilverTrophy();
        $silver->setAward('silver');
        $silver->setImage('silver.png');

        $gold = new GoldTrophy();
        $gold->setAward('gold');
        $gold->setImage('gold.png');

        $manager->persist($bronze);
        $manager->persist($silver);
        $manager->persist($gold);

        $manager->flush();
    }
}
