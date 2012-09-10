<?php
require("/home/staff/e02439/php/Smarty-3.1.11/libs/Smarty.class.php");

class Template extends Smarty{
    function __construct(){
        parent::__construct();
        $this->compile_dir = "/home/staff/e02439/php/Smarty-Work-Dir/templates_c";
        $this->cache_dir = "/home/staff/e02439/php/Smarty-Work-Dir/cache";
        $this->config_dir = "/home/staff/e02439/php/Smarty-Work-Dir/configs";
        $this->error_reporting = E_ALL;
    }
}

?>
