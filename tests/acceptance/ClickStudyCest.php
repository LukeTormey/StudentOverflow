<?php
namespace App\Tests;
use App\Tests\AcceptanceTester;

class ClickStudyCest
{
    public function homePageLinkToStudy(AcceptanceTester $I)
    {
        $I->amOnPage('/');
        $I->click('study.');
        $I->seeInCurrentUrl('/login');
        $I->amOnPage('/login');
        $I->fillField('#inputEmail', 'user@user.com');
        $I->fillField('#inputPassword', 'user');
        $I->click('Sign in');
        $I->seeInCurrentUrl('/study');
        $I->amOnPage('/study');
    }
}
