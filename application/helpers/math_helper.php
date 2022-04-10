<?php
function calcOddEven($int)
{
    if($int % 2 == 0)
    {
        return true; //Genap
    }
    else{
        return false; //Ganjil
    }
}

function calcOddEvenToString($int)
{
    if($int % 2 == 0)
    {
        return "Genap"; //Genap
    }
    else{
        return "Ganjil"; //Ganjil
    }
}

function convertNilaiIntToHuruf($int)
{
    if($int >= 4.00)
    {
        return "A";
    }
    else if($int >= 3.75){
        return "A-";
    }
    else if($int >= 3.50)
    {
        return "B+";
    }
    else if($int >= 3.00)
    {
        return "B";
    }
    else if($int >= 2.75)
    {
        return "B-";
    }
    else if($int >= 2.50)
    {
        return "C+";
    }
    else if($int >= 2.00)
    {
        return "C";
    }
    else if($int >= 1.75)
    {
        return "C-";
    }
    else if($int >= 1.50)
    {
        return "D+";
    }
    else if($int >= 1.00)
    {
        return "D";
    }
    else if($int >= 0.75)
    {
        return "D-";
    }
    else if($int < 0.75)
    {
        return "E";
    }
}
function convertNilaiIntToIp($int)
{
	if($int >= 90.00)
	{
		return 4.00;
	}
	else if($int >= 85){
		return 3.75;
	}
	else if($int >= 80.00 )
	{
		return 3.50;
	}
	else if($int >= 75.00)
	{
		return 3.00;
	}
	else if($int >= 60.00)
	{
		return 2.75;
	}
	else if($int >= 55.00)
	{
		return 2.50;
	}
	else if($int >= 50.00)
	{
		return 2.50;
	}
	else if($int >= 45.00)
	{
		return 1.75;
	}
	else if($int >= 40.00)
	{
		return 1.50;
	}
	else if($int >= 35.00)
	{
		return 1.00;
	}
	else if($int >= 30.00)
	{
		return 0.75;
	}
	else if($int < 30)
	{
		return 0.75;
	}
}
