<?php
include_once "Controller.php";
class Platform extends Controller
{
    public $platformId;
    public function __construct()
    {
        parent::__construct();
        $this->platformId = $_GET["id"];
        $this->view("platform");
    }
}
new Platform();
