<?php 
namespace App\Core\Validator;

use App\Core\App;

class Validator
{
    protected function regex($type) {
        switch ($type) {
            case 'email':
                return static::checkRegex('email', $this->email);
                break;
            case 'password':
                return static::checkRegex('password', $this->password);
                break;
            default:
                return false;
                break;
        }
    }

    public static function checkRegex($type, $string) {
        switch ($type) {
            case 'email':
                return preg_match(App::get('config')['regex']['email'], $string);
                break;
            case 'password':
                return preg_match(App::get('config')['regex']['password'], $string);
                break;
            default:
                throw new \Exception("{$type} is not a case within the switch.");
                break;
        }
    }
}