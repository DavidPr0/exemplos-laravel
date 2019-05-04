<?php

use Illuminate\Database\Seeder;

class AlocacoesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('alocacoes')->insert(['projeto_id'=>1,'desenvolvedor_id'=>1,'horas_semanais'=> 11]);
        DB::table('alocacoes')->insert(['projeto_id'=>1,'desenvolvedor_id'=>2,'horas_semanais'=> 13]);
        DB::table('alocacoes')->insert(['projeto_id'=>2,'desenvolvedor_id'=>2,'horas_semanais'=> 64]);
        DB::table('alocacoes')->insert(['projeto_id'=>2,'desenvolvedor_id'=>3,'horas_semanais'=> 25]);
        DB::table('alocacoes')->insert(['projeto_id'=>3,'desenvolvedor_id'=>1,'horas_semanais'=> 56]);
        DB::table('alocacoes')->insert(['projeto_id'=>3,'desenvolvedor_id'=>2,'horas_semanais'=> 77]);
        DB::table('alocacoes')->insert(['projeto_id'=>3,'desenvolvedor_id'=>3,'horas_semanais'=> 48]);
    }
}
