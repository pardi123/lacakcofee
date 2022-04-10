<?php
function convertToSemester($year,$month = null)
{
    date_default_timezone_set("Asia/Jakarta");
    if(intval(date("Y")) == $year)
    {
        if(intval(date("n")) >= 9 || intval(date("n")) == 1)
        {
            $semester = 1;
        }
        else if(intval(date("n")) >= 2 && intval(date("n")) <= 7){
            $semester = 2;
        }
    }
    else{
        if(intval(date("n")) >= 9 || intval(date("n")) == 1)
        {
            $semester = (intval(date("Y")) - intval($year)) * 2 + 1;
        }
        else if(intval(date("n")) >= 2 && intval(date("n")) <= 7)
        {
            $semester = (intval(date("Y")) - intval($year)) * 2 + 2;
        }
    }

    return $semester;
}