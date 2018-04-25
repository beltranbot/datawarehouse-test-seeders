<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Departamento extends Model
{

    function municipios() {
        return $this->hasMany('App\Municipio');
    }

}
