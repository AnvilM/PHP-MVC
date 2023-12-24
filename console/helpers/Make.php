<?php

function GetControllerData($Controller)
{
    return "<?php

    namespace App\Controllers;
    
    
    class $Controller
    {
        //
    }
    ";
}
