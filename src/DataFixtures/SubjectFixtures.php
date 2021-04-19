<?php

namespace App\DataFixtures;

use App\Entity\StudyLength;
use App\Entity\Subject;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class SubjectFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $hard = new StudyLength();
        $hard->setName('hard');
        $hard->setMultiplier(3);
        $medium = new StudyLength();
        $medium->setName('medium');
        $medium->setMultiplier(2);
        $easy = new StudyLength();
        $easy->setName('easy');
        $easy->setMultiplier(1);

        $manager->persist($hard);
        $manager->persist($medium);
        $manager->persist($easy);

        $subject1 = new Subject();
        $subject1->setName('maths');
        $subject1->setDifficulty($hard);

        $manager->persist($subject1);
        $manager->flush();
    }
}
