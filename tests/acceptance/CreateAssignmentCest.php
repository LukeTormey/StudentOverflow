<?php
namespace App\Tests;
use App\Tests\AcceptanceTester;

class CreateAssignmentCest
{
    public function CreateAssignment(AcceptanceTester $I, $wordcount, $deadline, $subject, $user)
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
        $I->click('Create new');
        $I->fillField('#assignment_subject', 'MGP');
        $I->fillField('#assignment_deadline', '21/09/2022');
        $I->fillField('#assignment_wordcount', '1000');
        $I->fillField('#assignment_user', 'user@user.com');
        $I->click('Save');
    }
}
