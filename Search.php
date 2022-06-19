<?php
include_once "Controller.php";
class Search extends Controller
{
    public $search;
    public function __construct()
    {
        parent::__construct();
        $this->search = $_GET["search"];
        $this->view("search");
    }
}
new Search();
