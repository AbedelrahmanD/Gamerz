<?php
include_once "Controller.php";
class Genres extends Controller
{
    public $genresId;
    public function __construct()
    {
        parent::__construct();
        $this->genresId = $_GET["id"];
        $this->view("genres");
    }
}
new Genres();
