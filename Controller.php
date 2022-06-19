<?php
class Controller
{
    public $version = 9;
    public $mode = "dark";
    public $websiteName = "Gamerz";
    public function __construct()
    {
        if (isset($_GET["mode"])) {
            $this->mode = $_GET["mode"];
            if ($this->mode != "dark" && $this->mode != "light") {
                $this->mode = "dark";
            }
        }
    }
    public function view($viewName, $data = [])
    {
        extract($data);
        include "views/partials/header.php";
        include "views/$viewName.php";
        include "views/partials/footer.php";
    }
    public function component($componentName, $data = [])
    {
        extract($data);
        include "views/components/$componentName.php";
    }
}
