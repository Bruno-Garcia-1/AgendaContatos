<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Person extends Model
{
    protected $table = 'persons';

    /*
     * Os models estão sem funções devido a utilização do Eloquent que
     * abstrais as operações básicas de interação com banco de dados.
     */
}
