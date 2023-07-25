<?php

function smarty_function_env($params, &$smarty)
{
    $env = file_get_contents($GLOBALS['ROOT'].'src/env.json');
    $env = json_decode($env, true);
    return key_exists($params['param'], $env) ? $env[$params['param']] : 'key '.$params['param'].' doesn\'t exist';
}

?>