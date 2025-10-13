<?php

namespace Database\Seeders;

use App\Models\Identifier;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class IdentifierSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Identifier::factory()->count(1000000)->create();

    }
}