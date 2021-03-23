#Matthew Groarke
#B00022340
#Module Code: COMP H
#Group members: Luke Tormey and Derek Lattimore
# received help from https://www.startutorial.com/articles/view/how-to-build-a-web-calendar-in-php
# with building Calendar item in PHP


<?php
class Calendar{

    public function _construct(){
        $this->naviHref = htmlentities($_SERVER['PHP_SELF']);
    }//end of public function construct

    private $daysOfWeek = array("Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday", "Sunday");
    private $startingYear = 0;
    private $startingMonth;
    private $startingDay=0;
    private $currentDate=null;
    private $daysOfMonth=0;
    private $naviHref=null;

    public function show(){
        $year = null;
        $month = null;

        if(null==$year&&isset($_GET['year'])){
            $year = $_GET['year'];
        }elseif (null==$year){
            $year = date("Y",time());
        }
        if(null==$month&&isset($_GET['month'])){
           $month = $_GET['month'];
        }elseif (null==$month){
            $month = date("m",time());
        }

        $this->startingYear=$year;
        $this->startingMonth=$month;
        $this->daysOfMonth=$this->daysOfMonth($month,$year);

        $content='<div id="calendar">'.
                    '<div class="box">'.
                    $this->createNavi().
                    '</div>'.
                    '<div class="box-content">'.
                        '<ul class="label">'.$this->createLabels().'</ul>';
                    $content.='<div class="clear"></div>';
                    $content.='<ul class="dates">';

                    $weeksOfMonth = $this->_weeksOfMonth($month, $year);
                    for($i=0; i<$weeksOfMonth; $i++){ //for lop for weeks of the month
                        for($j=1; $j<=7; $j++){ //for loop for days within the week
                            $content.=$this->_dayItem($i*7+$j);
                        }//end of for loop of weeks of the month
                    }//end og for loop for days within the week

                    $content.='</ul>';
                    $content.='<div class="clear"></div>';
                    $content.='</div>';

        $content.='</div>';

        return $content;
    }//end of public function show

    private function _dayItem($cellNumber){

        //start of if statement
        if ($this->startingDay==0){
            $firstDayForWeek = date('N', strtotime($this->startingMonth. '-'.$this->startingYear. '-01'));
            if(intval($cellNumber) == intval($firstDayForWeek)){ //start of if interval statement
                $this->startingDay=1;
            }//end of if interval statement
        }//end of if statement

        //start of if else statement
        //start of if statement
        if(($this->startingDay != 0)&&($this->startingDay<=$this->daysOfMonth)){
            $this->currentDate = date('d-m-Y',strtotime($this->startingDay. '-' .$this->startingMonth. '-' .($this->startingYear)));
            $celllContent = $this->startingDay;
            $this->startingDay++;
        }else{ //start of else statement
            $this->startingDay = null;
            $cellContent = null;
        }//end of if else statement

        return '<li id="li-'.$this->currentDate. '"class="'.($cellNumber%7==1?' start ':($cellNumber%7==0?' end ':' ')).
            ($cellContent==null?'mask':'').'">'.$cellContent.'<li>';
    }//end of private function dayItem

    private function _createNavi(){
        $followingMonth = $this->startingMonth==12?1:intval($this->startingMonth)+1;
        $followingYear = $this->startingMonth==12?intval($this->startingYear)+1:$this->startingYear;
        $beforeMonth = $this->startingMonth==1?12:intval($this->startingMonth)-1;
        $beforeYear = $this->startingMonth==1?:intval($this->startingYear)-1:$this->startingYear;

        return
            '<div class="header">'.
                '<a class="previous" href="".$this->naviHref.'?month=.sprintf('%02d',$beforeMonth).'&year='.$beforeYear.'">Prev</a>'.
                    '<span class="title">'.date('Y M', strtotime($this->startingYear.'-'.$this->startingMonth.'-1')).'<div>'.
                '<a class="next" href="'.$this->naviHref.'?month='.sprintf("%02d",$followingMonth).'&year='.$followingYear.'">Next</a>'.
            '</div>';
    }//end of private function createNavi

    private function _createLabels(){
        $content='';

        foreach($this->dayLabels as $index=>$label){
            $content.='<li class=" '.($label==6?'end title':'start title').'title">'..$label.'</li>';
        }//end of foreach

        return $content;
    }//end of private function createLabels

    private function _weeksOfMonth($month=null,$year=null){
        if(null==($year)){
            $year = date("Y",time());
        }//end of if statement
        if(null==($month)){
            $month = date("m",time());
        }//end of if statement

        $daysOfMonth = $this->daysOfMonth($month,$year);
        $amountOfWeeks = ($daysOfMonth%7==0?0:1) + intval($daysOfMonth/7);
        $monthLastDay=date('N',strtotime($year.'-'.$month.'-'.$daysOfMonth));
        $monthFirstDay=date('N',strtotime($year.'-'.$month.'-01'));
        if($monthLastDay<$monthFirstDay){
            $amountOfWeeks++;
        }//end of if statement
        return $amountOfWeeks;
    }//end of private function weeksOfMonth

    private function _daysOfMonth($month=null,$year=null){

        if(null==($year)){
            $year=date("Y",time());
        }
        if(null==($month)){
            $month=date("m",time());
        }
        return date('t',strtotime($year.'-'.$month.'-01'));

    }//end of private function daysOfMonth

}//end of class Calendar

