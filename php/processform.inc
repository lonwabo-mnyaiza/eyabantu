<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
foreach ($_POST as $key => $value)
{
    $temp = is_array($value) ? $value : trim($value);
    if (empty($temp) && in_array($key, $required))
    {
        $missing[] = $key;
    }
    else if (in_array($key, $required))
    {
        ${$key} = $temp;
    }
}
?>

