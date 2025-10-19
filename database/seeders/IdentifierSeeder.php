<?php

namespace Database\Seeders;

use App\Models\Identifier;
use Illuminate\Database\Seeder;

class IdentifierSeeder extends Seeder
{
    public function run(): void
    {
        Identifier::factory()->count(1000)->create();
    }
}
