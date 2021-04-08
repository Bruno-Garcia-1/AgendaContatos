<?php

namespace App\Http\Controllers;

use App\Models\Person;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PersonController extends Controller
{
    private static function checkExistPerson($cpf)
    {
        $exist = Person::where('cpf',$cpf)->get();

        if (isset($exist[0])) return true;

        return false;
    }

    public function index()
    {
        return view('person.index');
    }

    public function searchIndex()
    {
        return view('person.search.index');
    }

    public function cpfCheck(Request $request) //this function is reused in save()
    {
        $cpf = preg_replace( '/[^0-9]/is', '', $request->cpf);

        if (strlen($cpf) != 11) {
            return json_encode('');
        }

        if (preg_match('/(\d)\1{10}/', $cpf)) {
            return json_encode('invalid');
        }

        for ($t = 9; $t < 11; $t++) {
            for ($d = 0, $c = 0; $c < $t; $c++) {
                $d += $cpf[$c] * (($t + 1) - $c);
            }
            $d = ((10 * $d) % 11) % 10;
            if ($cpf[$c] != $d) {
                return json_encode('invalid');
            }
        }

        if (self::checkExistPerson($cpf)) {
            return json_encode('duplicated');
        } else {
            return json_encode('valid');
        }
    }

    public function save(Request $request)
    {
        $cpf = preg_replace( '/[^0-9]/is', '', $request->cpf);

        if (self::checkExistPerson($cpf)) return json_encode('duplicated');

            $person = new Person;

        $person->name       = $request->name;
        $person->cpf        = $cpf;
        $person->email      = $request->email;
        $person->birthDate  = $request->birthDate;

        return json_encode(
            $person->save()
        );
    }

    public function getPerson(Request $request)
    {
        if (!$request->name) return false;

        $name = preg_replace("/[^a-zA-Z0-9\s]/", "", $request->name);


        $sql = "
SELECT
	p.id AS personID,   p.name,    p.cpf,    p.email,    p.birthDate,
    ad.id AS addressID,  ad.zipCode,    ad.street,    ad.number,    ad.neighborhood,    ad.city,    ad.state,
    ph.id AS phoneID,  ph.cellPhone,    ph.homePhone,    ph.commercialPhone
FROM
	persons AS p
    LEFT JOIN addresses AS ad ON ad.person_id = p.id
    LEFT JOIN phones AS ph ON ph.person_id = p.id
WHERE
    p.name LIKE '%$name%'";
        $person = DB::select($sql);

        return json_encode
        (
            $person
        );
    }
}
