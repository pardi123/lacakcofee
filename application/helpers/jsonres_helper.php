<?php
function genJsonResponse($title,$type,$text)
{
    $json = array(
        "title"=>$title,
        "type"=>$type,
        "text"=>$text
    );

    echo json_encode($json);
}