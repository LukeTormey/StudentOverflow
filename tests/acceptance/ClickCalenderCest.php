<?php
namespace App\Tests;
use App\Tests\AcceptanceTester;

class ClickCalenderCest
{
    public function homePageLinkToCalender(AcceptanceTester $I)
    {
        $I->amOnPage('/');
        $I->click('calender.');
        $I->seeInCurrentUrl('/login');
        $I->amOnPage('/login');
        $I->fillField('#inputEmail', 'user@user.com');
        $I->fillField('#inputPassword', 'user');
        $I->click('Sign in');
        $I->seeInCurrentUrl('/calender');
        $I->amOnPage('/calender');
    }
}
