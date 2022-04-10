<?php
function sesget($key)
{
    $ci = get_instance();
    $session = $ci->session->userdata($key);
    return $session;
}

function sesset($key,$value)
{
    $ci = get_instance();
    $set = $ci->session->set_userdata($key,$value);
    return $set;
}

function sesclear($key){
    $ci = get_instance();
    $ci->session->unset_userdata($key);
}