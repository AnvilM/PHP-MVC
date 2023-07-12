<?php

function smarty_function_env($params, &$smarty)
{
    $env = require_once $GLOBALS['ROOT'].'src/env.php';
    return key_exists($params['param'], $env) ? $env[$params['param']] : 'key '.$params['param'].' doesn\'t exist';
}

?>