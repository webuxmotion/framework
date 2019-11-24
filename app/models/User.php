<?php
/**
 * Created by PhpStorm.
 * User: andriipereverziev
 * Date: 11/24/19
 * Time: 8:59 PM
 */

namespace app\models;

use core\base\Model;

class User extends Model
{
  public $attributes = [
    'login' => '',
    'password' => '',
    'email' => '',
    'name' => '',
    'role' => 'user',
  ];

  public $rules = [
    'required' => [
      ['login'],
      ['password'],
      ['email'],
      ['name'],
    ],
    'email' => [
      ['email'],
    ],
    'lengthMin' => [
      ['password', 6],
    ],
  ];
}