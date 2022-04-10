<?php
function formatphone($raw,$dashed = true)
{
    $trim = str_replace("+628","08",$raw);
    $longTrim = substr($trim,2);

    $format = substr_replace($trim,"+628",0).$longTrim;

    $part1 = substr($format,0,3);
    $part2 = substr($format,3,3);
    $part3 = substr($format,6,4);
    $part4 = substr($format,10,10);

    if($dashed == true)
    {
        $combine = $part1." ".$part2."-".$part3."-".$part4;
    }
    else{
        $combine = $part1.$part2.$part3.$part4;

    }
    return $combine;
}

function phone_intlformat($raw)
{
    $trim = str_replace("+628","08",$raw);
    return $trim;
}