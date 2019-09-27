<?php
class template
{
    private $pinto;
    public function __construct()
    {
        $this->pinto = explode("/", $_SERVER["SCRIPT_NAME"]);
        echo $this->getSidebar();
    }
    public function getNavbar()
    { }
    public function getSidebar()
    {
        switch (end($this->pinto)) {
            case 'user_plant_manage.php':
                return '<script>
                        document.getElementById("user_plant_manage").classList.add("active");
                        </script>';
                break;
            default:
                return '<script>
                        document.getElementById("user_manage").classList.remove("active");
                        </script>';
        }
    }
}
