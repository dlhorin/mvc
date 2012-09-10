<?php

require_once(LIBRARY_PATH . DS . 'Template.php');
require_once(LIBRARY_PATH . DS . 'FormHelper.php');
require_once(APP_PATH . DS . 'models/Thing.php');

class Form1Controller {
    private $template;
    private $formhelper;
    private $formid;

    public function __construct() {
        session_start();
        $this->template = new Template;
        $this->template->template_dir = APP_PATH . DS . 'views' . DS . 'form2' . DS;
        $this->template->assign('title', 'Form2');

        $this->formid = 'myform';
        $this->formhelper = new Form2Helper('myform');
        $this->formhelper->action = 'http://' . $_SERVER['SERVER_NAME'] . '/~e02439/mvc/form2/submit';
  }

    public function view() {
        $this->template->assign('title', 'View Form 2');
        $this->formhelper->controlForm($this->template);
        $this->template->display('form.tpl');
    }

    public function submit(){
        $this->template->assign('title', 'Sumbit Form 2');
        $this->formhelper->controlValidation($this->template);
        $this->template->display('submit.tpl');
    }
}
