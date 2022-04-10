<?php
function getpref($pref)
{
    $ci = get_instance();
    $getter = $ci->db->query("SELECT pref_value AS PrefResult FROM siakad_preference WHERE pref_name = '$pref'")->row()->PrefResult;
    return $getter;
}