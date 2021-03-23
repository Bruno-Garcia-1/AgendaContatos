<?php

namespace App\Http\Controllers;

use App\Models\Address;
use Illuminate\Http\Request;

class AddressController extends Controller
{
    public function index()
    {
        return view('address.index');
    }

    public function save(Request $request)
    {

        if($request->update === true)
        {
            $res = self::update($request);
            dd($res);
        }

        $zipCode = preg_replace( '/[^0-9]/is', '', $request->zipCode);

        $address = new Address;

        $address->zipCode       = $zipCode;
        $address->street        = $request->street;
        $address->number        = $request->number;
        $address->neighborhood  = $request->neighborhood;
        $address->city          = $request->city;
        $address->state         = $request->state;
        $address->person_id     = $request->personId;

        return json_encode(
            $address->save()
        );
    }

    public function update($request)
    {
        return $request;
    }
}
