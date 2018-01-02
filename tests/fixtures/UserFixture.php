<?php
/**
 * Created by PhpStorm.
 * User: naffiq
 * Date: 1/2/18
 * Time: 15:18
 */

namespace app\tests\fixtures;


use Da\User\Model\User;
use yii\test\ActiveFixture;

class UserFixture extends ActiveFixture
{
    public $modelClass = User::class;
}