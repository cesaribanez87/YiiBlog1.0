<?php
/**
 * Created by PhpStorm.
 * User: cesaralejandro
 * Date: 20/01/15
 * Time: 05:42 PM
 */

class UserTest extends CDbTestCase{

    public $fixtures= array(
        'user'=>'User'
    );

    public function testUser(){

    //Fetch the first record:
    $fetch=User::model()->findByPk(1);

    //Confirm it's a User object:
    $this->assertInstanceOf('User',$fetch);

    //Confirm the stored value:
    $this->assertEquals($this->user['data1']['name'],$fetch->name);

    $user=new User($this->user['data2']);
    $this->assertTrue($user->save(false));//When this code is executed fill the table with data2 in the position in the array of fixtures/user.php
    }

}