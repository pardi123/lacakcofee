<?php
function user_get($phone)
{
    $ci = get_instance();
    $query = "SELECT * FROM user WHERE phone = '$phone'";
    $execute = $ci->db->query($query);

    //Returns
    $data['single'] = $execute->row();
    $data['multi'] = $execute->result();
    $data['count'] = $execute->num_rows();

    return $data;
}

function user_listing($phone)
{
    $ci = get_instance();
    $query = "SELECT * FROM listing WHERE phone = '$phone'";
    $execute = $ci->db->query($query);

    //Returns
    $data['single'] = $execute->row();
    $data['multi'] = $execute->result();
    $data['count'] = $execute->num_rows();
    return $data;
}