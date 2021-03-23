<?php

namespace App\Http\Controllers;

use App\Models\Person;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PersonController extends Controller
{
    private static function update(Request $request)
    {
        return $request;
    }

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
            return json_encode('');
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
        $cpf = json_decode(self::cpfCheck($request->cpf));

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
