<?php

require_once(LIBRARY_PATH . DS . 'Template.php');
require_once(LIBRARY_PATH . DS . 'FormHelper.php');
require_once(APP_PATH . DS . 'models/Thing.php');

class Form1Controller {
    private $template;
    private $formhelper;
    private $formid;

    public function __construct() {
        $this->template = new Template;
        $this->template->template_dir = APP_PATH . DS . 'views' . DS . 'form1' . DS;
        $this->template->assign('title', 'Form1');

        $this->formid = 'myform';
        $this->formhelper = new FormHelper('myform');
        $this->formhelper->back_if_not_sent = false;
        $this->formhelper->back_if_error = false;
        $this->formhelper->action = 'http://' . $_SERVER['SERVER_NAME'] . '/~e02439/mvc/form1/view';
    }

    public function view() {
        $this->template->assign('title', 'TestForm');
        $this->formhelper->controlForm($this->template);
        $this->formhelper->controlValidation($this->template);
        $this->template->display('form.tpl');
    }
}
