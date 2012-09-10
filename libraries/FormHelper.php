<?php

class FormHelper {
    private $id;
    private $method;
    protected $formkeys;
    public $back_if_error;
    public $back_if_not_sent;
    public $action;
    
    public function __construct($id, $method = 'GET'){

        $this->id = $id;
        $this->method = $method;
        $this->back_if_not_sent = true;
        $this->back_if_error = true;
        $this->action = NULL;
        $this->formkeys = array($id . '_submit');
    }

    protected function containsKeys($form){
        foreach($this->formkeys as $key){
            if(!array_key_exists($key, $form))
                return false;
        }
        return true;
    }

    public function controlForm($smartyView){
        $id = $this->id;
        $errtag = $id .'_errors';
        $formtag = $id .'_form';

        if($this->action == NULL)
            $smartyView->assign($id.'_action', '#');
        else{
            $smartyView->assign($id.'_action', $this->action);
        }

        $smartyView->assign($id.'_method', $this->method);
        $smartyView->assign($id.'_submit', $id . '_submit');

        //If you weren't redirected back to this page, there
        //can't be any session data
        if($this->back_if_error == false)
            return;

        $smartyView->assign($errtag, $_SESSION[$errtag]);
        $smarty_view->assign($formtag, $_SESSION[$formtag]);
    }

    public function validate(&$form){
        foreach($form as $key=>$val){
            $form[$key] = trim($val);
        }
        filter_var_array($form, FILTER_SANITIZE_STRING);
        return NULL;  //no errors
    }

    public function controlValidation($smartyView = NULL){
        //First check if the form was sent here.
        $sent = true;
        if( $this->method == 'GET' ){
            $form = $_GET;
            if(!isset($_GET)) $sent = false;
        }
        else{
            $form = $_POST;
            if(!isset($_POST)) $sent = false;
        }

        if($sent && !$this->containsKeys($form))
            $sent = false;

        //return if required
        if(!$sent){
            if($this->back_if_not_sent)
                header('Location: '.$_SERVER['HTTP_REFERER']);
            else{
                $smartyView->assign($this->id . '_notsent', true);
                return NULL;
            }
        }


        //then validate

        //If valid, check whether to redirect or return true

        //If not valid, check whether to redirect or return errors

        $errors = $this->validate($form);

        if($errors){
            if($this->back_if_error){
                if(session_id() != ''){
                    $_SESSION[$id . '_form'] = $form;
                    $_SESSION[$id . '_errors'] = $errors;
                }
                header('Location: ' . $this->error_redirect);
            }
            else
                return $errors;
        }
        else{
            $smartyView->assign($this->id . '_form', $form);
            return true;
        }
    }
}



