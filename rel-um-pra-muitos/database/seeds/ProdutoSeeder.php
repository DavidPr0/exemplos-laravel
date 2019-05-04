<?php

use Illuminate\Database\Seeder;

class ProdutoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('produtos')->insert(['nome' => 'Camiseta Polo', 'preco' => 100 , 'estoque' => '4', 'categoria_id' => 1 ]);
        DB::table('produtos')->insert(['nome' => 'Calça Jeans', 'preco' => 150 , 'estoque' => '5', 'categoria_id' => 1 ]);
        DB::table('produtos')->insert(['nome' => 'Camisa Manga Longa', 'preco' => 200 , 'estoque' => '2', 'categoria_id' => 1 ]);
        DB::table('produtos')->insert(['nome' => 'Pc Games', 'preco' => 11.000 , 'estoque' => '2', 'categoria_id' => 2 ]);
        DB::table('produtos')->insert(['nome' => 'Impressora', 'preco' => 1.000 , 'estoque' => '3', 'categoria_id' => 6 ]);
        DB::table('produtos')->insert(['nome' => 'Mouse', 'preco' => 80 , 'estoque' => '10', 'categoria_id' => 6 ]);
        DB::table('produtos')->insert(['nome' => 'Perfume', 'preco' => 99 , 'estoque' => '20', 'categoria_id' => 3 ]);
        DB::table('produtos')->insert(['nome' => 'Cama Casal', 'preco' => 15.000 , 'estoque' => '8', 'categoria_id' => 4 ]);
        DB::table('produtos')->insert(['nome' => 'Moveis', 'preco' => 7.000 , 'estoque' => '8', 'categoria_id' => 4 ]);
    }
}
