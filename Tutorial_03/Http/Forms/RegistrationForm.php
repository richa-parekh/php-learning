<?php
namespace Http\Forms;

use Core\Validator;

class RegistrationForm{

    protected $errors = [];
    public function validate($email, $password){
        if (!Validator::email($email)) {
            $this->errors['email'] = "Please enter valid email.";
        }

        if (!Validator::string($password, 7, 255)) {
            $this->errors['password'] = "Please enter valid password.";
        }

        return empty($this->errors);
    }
    public function errors(){
        return $this->errors;
    }
}