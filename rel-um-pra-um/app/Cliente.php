<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    /* Função responsável por reculperar a informação de outra tabela
    * Ex: eu tenho o endereço do cliente quero saber a qual cliente aquele endereço pertence
    */
    public function endereco(){
        //  Caso mude a nomeclatura dos ids no banco precisa utilizar esse modelo de seleção
        return $this->hasOne('App\Endereco',   'cliente_id','id');
    }
}
