<?php

use App\Models\User;
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

function smartUsername($name)
{

    $checkUsername = User::where('username', $name)->latest('id')->first();

    $name = strtolower($name);
    if ($checkUsername) {
        $num =  $checkUsername->id + 1;
        return $name . $num;
    }
    return $name;
}
