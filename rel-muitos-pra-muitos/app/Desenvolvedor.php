<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Desenvolvedor extends Model
{
    protected $table = 'desenvolvedores';

    function projetos(){
        /*************************tabela onde tem os projetos <-> Tabela onde se encontra os relacionamentos*****/
        return $this->belongsToMany("App\Projeto", "alocacoes")->withPivot('horas_semanais');
    }
}
