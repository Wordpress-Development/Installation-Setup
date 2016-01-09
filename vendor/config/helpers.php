<?php
/** 
 * Function exst() - Checks if the variable has been set 
 * (copy/paste it in any place of your code)
 * 
 * If the variable is set and not empty returns the variable (no transformation)
 * If the variable is not set or empty, returns the $default value
 *
 * @param  mixed $var
 * @param  mixed $default
 * 
 * @return mixed 
 *
 * Example
 * $greeting = "Hello, ".exst($user_name, 'Visitor')." from ".exst($user_location);
 */

function exst( & $var, $default = "")
{
    $t = "";
    if ( !isset($var)  || !$var ) {
        if (isset($default) && $default != "") $t = $default;
    }
    else  {  
        $t = $var;
    }
    if (is_string($t)) $t = trim($t);
    return $t;
}