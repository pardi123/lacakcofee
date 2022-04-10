<?php
function date_convertmonth($intMonth)
{
    $monthString = null;
    if($intMonth == 1)
    {
        $monthString = "Januari";
    }
    else if($intMonth == 2)
    {
        $monthString = "Februari";
    }
    else if($intMonth == 3)
    {
        $monthString = "Maret";
    }
    else if($intMonth == 4)
    {
        $monthString = "April";
    }
    else if($intMonth == 5)
    {
        $monthString = "Mei";
    }
    else if($intMonth == 6)
    {
        $monthString = "Juni";
    }
    else if($intMonth == 7)
    {
        $monthString = "Juli";
    }
    else if($intMonth == 8)
    {
        $monthString = "Agustus";
    }
    else if($intMonth == 9)
    {
        $monthString = "September";
    }
    else if($intMonth == 10)
    {
        $monthString = "Oktober";
    }
    else if($intMonth == 11)
    {
        $monthString = "November";
    }
    else if($intMonth == 12)
    {
        $monthString = "Desember";
    }
    else
    {
        $monthString = "Invalid input!";
    }

    return $monthString;
}
function date_convertmonth2($intMonth)
{
	$monthString = null;
	if($intMonth == "01")
	{
		$monthString = "Januari";
	}
	else if($intMonth == "02")
	{
		$monthString = "Februari";
	}
	else if($intMonth == "03")
	{
		$monthString = "Maret";
	}
	else if($intMonth == "04")
	{
		$monthString = "April";
	}
	else if($intMonth == "05")
	{
		$monthString = "Mei";
	}
	else if($intMonth == "06")
	{
		$monthString = "Juni";
	}
	else if($intMonth == "07")
	{
		$monthString = "Juli";
	}
	else if($intMonth == "08")
	{
		$monthString = "Agustus";
	}
	else if($intMonth == "09")
	{
		$monthString = "September";
	}
	else if($intMonth == 10)
	{
		$monthString = "Oktober";
	}
	else if($intMonth == 11)
	{
		$monthString = "November";
	}
	else if($intMonth == 12)
	{
		$monthString = "Desember";
	}
	else
	{
		$monthString = "Invalid input!";
	}

	return $monthString;
}

