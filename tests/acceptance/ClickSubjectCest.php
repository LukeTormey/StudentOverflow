<?php
namespace App\Tests;
use App\Tests\AcceptanceTester;

class ClickSubjectCest
{
    public function homePageLinkToSubject(AcceptanceTester $I)
    {
        $I->amOnPage('/');
        $I->click('subjects');
        $I->seeInCurrentUrl('/login');
        $I->amOnPage('/login');
        $I->fillField('#inputEmail', 'user@user.com');
        $I->fillField('#inputPassword', 'user');
        $I->click('Sign in');
        $I->seeInCurrentUrl('/subject');
        $I->amOnPage('/subject');
    }
}
