<?php

use Carbon\Carbon;
use Hashids\Hashids;


function carbon($data)
{
    return Carbon::parse($data);
}

function hashids($data, $method)
{

    if ($method == 'encode') {
        $hashids = new Hashids('', 5);
        return  $hashids->encode($data);
    }

    if ($method == 'decode') {
        $hashids = new Hashids('', 5);
        return  $hashids->decode($data);
    }
}

function fullAddress($alamat, $dist, $city, $prov)
{
    return ucwords($alamat . ', ' . $dist . ', ' . $city . ', ' . $prov);
}
