<?php


namespace App\Utils;


use App\Entity\Subject;
use App\Entity\User;

class Trophy
{
    private $bronze;
    private $silver;
    private $gold;
    private $platnium;

    public function incrementBronzeTrophyTotal(){
        if($bronze = 3){
            return silver;
        }
    }

    public function incrementSilverTrophyTotal(){
        if($silver = 3){
            return gold;
        }
    }

    public function incrementGoldTrophyTotal(){
        if($gold = 3){
            return platnium;
        }
    }

    public function addTrophy(Subject $subject, User $user){
        //Difficulty should be an integer 1,2,3 or 4
        $difficulty = $subject->getDifficulty()->getMultiplier();
        switch ($difficulty){
            case 1 :
                $user->incrementBronzeTrophyTotal();
                break;
            case 2 :
                $user->incrementSilverTrophyTotal();
                break;
            case 3 :
                $user->incrementGoldTrophyTotal();
                break;
        }
    }
}