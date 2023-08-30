<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Tipologia;

class TipologiaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tipologias = ['Frontend', 'Backend', 'Fullstack', 'Designer', 'DevOps'];

        foreach ($tipologias as $item) {
            $tipologia = new Tipologia();

            $tipologia->name = $item;
            $tipologia->slug = $tipologia->generateSlug($item);

            $tipologia->save();
        }
    }
}
