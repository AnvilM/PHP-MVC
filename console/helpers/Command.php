<?php

function GetArgument(array $Command, int $Argument, string $Default = '')
{
    if (key_exists($Argument, $Command['Arguments']))
    {
        return $Command['Arguments'][$Argument];
    }
    else
    {
        return $Default;
    }
}
