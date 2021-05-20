<?php
namespace App\Tests;
use App\Tests\AcceptanceTester;

class ClickAssignmentCest
{
    public function homePageLinkToAssignment(AcceptanceTester $I)
    {
        $I->amOnPage('/');
        $I->click('assignments.');
        $I->seeInCurrentUrl('/login');
        $I->amOnPage('/login');
        $I->fillField('#inputEmail', 'user@user.com');
        $I->fillField('#inputPassword', 'user');
        $I->click('Sign in');
        $I->seeInCurrentUrl('/assignment');
        $I->amOnPage('/assignment');
    }
}
