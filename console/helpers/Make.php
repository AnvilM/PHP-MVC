<?php

function GetControllerData(string $Controller)
{
    return "<?php\n\nnamespace App\Controllers;\n\nclass $Controller\n{\n    //\n}";
}

function GetModelData(string $Model)
{
    return "<?php\n\nnamespace App\Models;\n\nuse Src\Database\Model;\n\nclass $Model extends Model\n{\n    //\n}";
}
