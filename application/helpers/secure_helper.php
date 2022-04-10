<?php
function securevar($string)
{
    $ci = get_instance();
    return htmlspecialchars($ci->db->escape_str($string));
}