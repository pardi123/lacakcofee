<?php
function ajaxfilterrequest()
{
    if (empty($_SERVER['HTTP_X_REQUESTED_WITH']) && ($_SERVER['HTTP_X_REQUESTED_WITH'] !== 'XMLHttpRequest')) {
        redirect(base_url("handler/not_found"));
    }
}