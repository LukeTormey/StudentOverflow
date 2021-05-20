<?php
namespace App\Tests;
use App\Tests\AcceptanceTester;

class ClickCabinetHubCest
{

    public function homePageLinkToCalender(AcceptanceTester $I)
    {
        $I->amOnPage('/');
        $I->click('hub');
        $I->seeInCurrentUrl('/login');
        $I->amOnPage('/login');
        $I->fillField('#inputEmail', 'user@user.com');
        $I->fillField('#inputPassword', 'user');
        $I->click('Sign in');
        $I->seeInCurrentUrl('/cabinethub');
        $I->amOnPage('/cabinethub');
    }
}
