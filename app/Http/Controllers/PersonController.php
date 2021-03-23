<?php

namespace App\Http\Controllers;

use App\Models\Person;
use Illuminate\Http\Request;

class PersonController extends Controller
{
    public function index()
    {
        return view('person.index');
    }

    public function searchIndex()
    {
        return view('person.search.index');
    }

    public function cpfCheck($cpf = null) //this function is reused in save()
    {
        $cpf = (!$cpf) ? Request::capture('cpf')->cpf : $cpf;

        $cpf = preg_replace( '/[^0-9]/is', '', $cpf);

        if (strlen($cpf) != 11) {
            return json_encode(false);
        }

        if (preg_match('/(\d)\1{10}/', $cpf)) {
            return json_encode(false);
        }

        for ($t = 9; $t < 11; $t++) {
            for ($d = 0, $c = 0; $c < $t; $c++) {
                $d += $cpf[$c] * (($t + 1) - $c);
            }
            $d = ((10 * $d) % 11) % 10;
            if ($cpf[$c] != $d) {
                return json_encode(false);
            }
        }
        return json_encode($cpf);
    }

    public function save(Request $request)
    {
        $person = new Person;

        $person->name       = $request->name;
        $person->cpf        = json_decode(self::cpfCheck($request->cpf));
        $person->email      = $request->email;
        $person->birthDate  = $request->birthDate;

        return json_encode(
            $person->save()
        );

    }

    public function getPerson(Request $request)
    {
        $person = Person::where('name', 'LIKE',"%$request->modalName%")->get();

        return json_encode
        (
            $person
        );
    }
}
