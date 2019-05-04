<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Endereco extends Model
{
    /* Função responsável por reculperar a informação de outra tabela
    * Ex: eu tenho o endereço do cliente quero saber a qual cliente aquele endereço pertence
    */
    public function cliente(){
        return $this->belongsTo('App\Cliente', 'cliente_id', 'id');
    }
}
