<?php

namespace Database\Seeders;

use App\Models\Tokens;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TokensTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Tokens::factory()->count(5000)->create();
    }
}
