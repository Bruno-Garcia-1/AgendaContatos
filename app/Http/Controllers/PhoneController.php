<?php

namespace App\Http\Controllers;

use App\Models\Phone;
use Illuminate\Http\Request;

class PhoneController extends Controller
{
    private static function update(Request $request)
    {
        return $request;
    }

    public function index()
    {
        return view('phone.index');
    }

    public function save(Request $request)
    {
        if($request->update === true)
        {
            $res = self::update($request);
            dd($res);
        }

        $cellPhone       = preg_replace( '/[^0-9]/is', '', $request->cellPhone);
        $homePhone       = preg_replace( '/[^0-9]/is', '', $request->homePhone);
        $commercialPhone = preg_replace( '/[^0-9]/is', '', $request->commercialPhone);

        $phone = new Phone;

        $phone->cellPhone       = $cellPhone;
        $phone->homePhone       = $homePhone;
        $phone->commercialPhone = $commercialPhone;
        $phone->person_id       = $request->personId;

        return json_encode(
            $phone->save()
        );
    }
}
