<?php
include_once "Controller.php";
class Home extends Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->view("home");
    }
}
new Home();
