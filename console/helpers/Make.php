<?php

function GetControllerData(string $Controller)
{
    return "<?php\n\nnamespace App\Controllers;\n\nclass $Controller\n{\n    //\n}";
}

function GetModelData(string $Model)
{
    return "<?php\n\nnamespace App\Models;\n\nuse Src\Database\Eloquent\Model;\n\nclass $Model extends Model\n{\n    //Set model database table\n    public function __construct()\n    {\n        " . '$this->setTable(get_class());' . "\n    }\n}";
}

function GetMiddlewareData(string $Middleware)
{
    return "<?php\n\nnamespace App\Middlewares;\n\nclass $Middleware\n{\n    public function __construct()\n    {\n        //\n    }\n}";
}
