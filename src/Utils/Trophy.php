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

    /**
     * @return mixed
     */
    public function getBronze()
    {
        return $this->bronze;
    }

    /**
     * @param mixed $bronze
     */
    public function setBronze($bronze): void
    {
        $this->bronze = $bronze;
    }

    /**
     * @return mixed
     */
    public function getSilver()
    {
        return $this->silver;
    }

    /**
     * @param mixed $silver
     */
    public function setSilver($silver): void
    {
        $this->silver = $silver;
    }

    /**
     * @return mixed
     */
    public function getGold()
    {
        return $this->gold;
    }

    /**
     * @param mixed $gold
     */
    public function setGold($gold): void
    {
        $this->gold = $gold;
    }

    /**
     * @return mixed
     */
    public function getPlatnium()
    {
        return $this->platnium;
    }

    /**
     * @param mixed $platnium
     */
    public function setPlatnium($platnium): void
    {
        $this->platnium = $platnium;
    }

    public function incrementBronzeTrophyTotal(){
        if($bronze = 3){
            $bronze->setBronze($bronze-3);
            return silver;
        }
    }

    public function incrementSilverTrophyTotal(){
        if($silver = 3){
            $silver->setSilver($silver-3);
            return gold;
        }
    }

    public function incrementGoldTrophyTotal(){
        if($gold = 3){
            $gold->setGold($gold-3);
            return platnium;
        }
    }

    public function addTrophy(Subject $subject, User $user){
        //Difficulty should be an integer 1,2,3 or 4
        $difficulty = $subject->getDifficulty();
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