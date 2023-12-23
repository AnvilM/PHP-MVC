<?php





/**
 * Get value from .env
 *
 * @param  string $param - Param name
 * @param  string $default - Default value
 * @return string
 */
function env(string $param = '', string $default = '')
{
    $env = file_get_contents(ROOT . '/.env');



    if (str_contains($env, $param))
    {
        $env = stristr($env, $param);
        $env = stristr($env, "\n", true);

        preg_match('/"([\s\S]+?)"/', $env, $matches);

        return $matches[1];
    }
    else
    {
        return $default;
    }
}
