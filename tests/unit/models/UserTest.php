<?php

namespace tests\models;

use Da\User\Model\User;

class UserTest extends \Codeception\Test\Unit
{


    public function testFindUserById()
    {
        expect_that($user = User::findIdentity(1));
        expect($user->username)->equals('naffiq');

        expect_not(User::findIdentity(3));
    }

}
