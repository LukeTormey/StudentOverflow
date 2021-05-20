<?php
namespace App\Tests;
use App\Tests\AcceptanceTester;

class ClickTrophyCest
{
    public function homePageLinkToTrophy(AcceptanceTester $I)
    {
        $I->amOnPage('/');
        $I->click('trophy cabinet');
        $I->seeInCurrentUrl('/login');
        $I->amOnPage('/login');
        $I->fillField('#inputEmail', 'user@user.com');
        $I->fillField('#inputPassword', 'user');
        $I->click('Sign in');
        $I->seeInCurrentUrl('/cabinet');
        $I->amOnPage('/cabinet');
    }
}
