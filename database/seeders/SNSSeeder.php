<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Identifier;
use App\Models\SNS;
use Illuminate\Database\Eloquent\Factories\Sequence;

class SNSSeeder extends Seeder
{
    public function run(): void
    {
        $identifierIds = Identifier::pluck('id')->shuffle();
        $postCount = 1000;

        SNS::factory()
            ->count($postCount)
            ->state(new Sequence(
                ...$identifierIds->map(fn ($id) => ['identifier_id' => $id])->all()
            ))
            ->create();
    }
}