<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Identifier;
use App\Models\SNS;
use Illuminate\Database\Eloquent\Factories\Sequence;

class SNSSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // First, ensure you have some identifiers to choose from.
        // Let's create 20 for this example.
        Identifier::factory(20)->create();

        // --- Logic Integration Starts Here ---

        // 1. Get all available Identifier IDs and shuffle them.
        // This is much more efficient as it's only one query.
        $identifierIds = Identifier::pluck('id')->shuffle();

        // 2. Decide how many SNS posts you want to create.
        // For example, let's create 50 posts.
        $postCount = 50;

        // 3. Use the factory with a Sequence to assign the IDs.
        SNS::factory()
            ->count($postCount)
            ->state(new Sequence(
                // The map function creates an array of states, e.g.,
                // [['identifier_id' => 5], ['identifier_id' => 12], ...]
                ...$identifierIds->map(fn ($id) => ['identifier_id' => $id])->all()
            ))
            ->create();
    }
}