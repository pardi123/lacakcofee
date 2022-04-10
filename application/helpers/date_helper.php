<?php
function myDate()
{
    date_default_timezone_set("Asia/Jakarta");
    return date("Y-m-d H:i:s");
}

function forwardDate($toForward,$daysForward)
{
    date_default_timezone_set("Asia/Jakarta");
    try {
        $datetime = new DateTime($toForward);
        $datetime->modify($daysForward);
        return $datetime->format("Y-m-d H:i:s");

    } catch (Exception $e) {
        $e->getTrace();
    }
}

function timeIncrement($hour,$minute,$incr)
{
    date_default_timezone_set("Asia/Jakarta");
    $time = new DateTime($hour.":".$minute);
    $time->add(new DateInterval("PT".$incr."M"));
    return $time->format('H.i');
}

function formatTime($hour,$minute)
{
    date_default_timezone_set("Asia/Jakarta");
    $time = new DateTime($hour.":".$minute);
    return $time->format('H.i');
}