<?php

namespace App\Http\Controllers;

use App\Models\Phone;
use Illuminate\Http\Request;

class PhoneController extends Controller
{
    private static function checkExistPhone($colum, $phone)
    {
        $exist = Phone::where($colum, $phone)->get();

        if (isset($exist[0])) return true;

        return false;
    }
    public function index()
    {
        return view('phone.index');
    }

    public function save(Request $request)
    {
        if($request->update == 'true')
        {
            $phone = Phone::find($request->phoneId);
        }else{
            $phone = new Phone;
        }

        $cellPhone       = preg_replace( '/[^0-9]/is', '', $request->cellPhone);
        $homePhone       = preg_replace( '/[^0-9]/is', '', $request->homePhone);
        $commercialPhone = preg_replace( '/[^0-9]/is', '', $request->commercialPhone);


        $phone->cellPhone       = $cellPhone;
        $phone->homePhone       = $homePhone;
        $phone->commercialPhone = $commercialPhone;
        $phone->person_id       = $request->personId;

        return json_encode(
            $phone->save()
        );
    }

    public function phoneCheck(Request $request)
    {
        if (isset($request->cellPhone)){
            $phone = $request->cellPhone;

        } elseif (isset($request->homePhone)){
            $phone = $request->homePhone;

        }elseif (isset($request->commercialPhone)){
            $phone = $request->commercialPhone;

        }else{
            return false;
        }

        $phone = preg_replace( '/[^0-9]/is', '', $phone);

        if(self::checkExistPhone('cellPhone',$phone) || self::checkExistPhone('homePhone',$phone) || self::checkExistPhone('commercialPhone',$phone))
        {
           return json_encode('duplicated');
        }
            return json_encode('valid');
    }
}
