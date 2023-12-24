<?php

function GetControllerData(string $Controller)
{
    return "<?php\n\nnamespace App\Controllers;\n\nclass $Controller\n{\n    //\n}";
}

function GetModelData(string $Model)
{
    return "<?php\n\nnamespace App\Models;\n\nclass $Model\n{\n    //\n}";
}
