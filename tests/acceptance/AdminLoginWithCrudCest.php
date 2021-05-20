<?php
namespace App\Tests;
use App\Tests\AcceptanceTester;

class AdminLoginWithCrudCest
{
    public function AdminLoginWithCrudLink(AcceptanceTester $I)
    {
        $I->amOnPage('/');
        $I->click('login');
        $I->seeInCurrentUrl('/login');
        $I->amOnPage('/login');
        $I->fillField('#inputEmail', 'admin@admin.com');
        $I->fillField('#inputPassword', 'admin');
        $I->click('Sign in');
        $I->seeInCurrentUrl('/');
        $I->amOnPage('/');
        $I->click('Users');
        $I->seeInCurrentUrl('/user');
    }
}
