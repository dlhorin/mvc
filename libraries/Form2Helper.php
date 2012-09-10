<?php

require_once('FormHelper.php');

class Form2Helper extends FormHelper {
    $formkeys = array('email');
    
    public function __construct($id, $method = 'GET'){
        $parent::__construct($id, $method);
        $this->formkeys[] = 'email';
    }

     public function validate(&$form){
        $parent::validate($form);
        $errors = NULL;
        if($form['email'] == '')
            $errors['email'] = 'Email field cannot be blank';
        elseif(!filter_var($form['email'], FILTER_VALIDATE_EMAIL)
            $errors['email'] = 'Not a valid email';
        return $errors;
    }
}



