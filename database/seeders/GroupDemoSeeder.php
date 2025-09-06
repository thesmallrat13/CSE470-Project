<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Group;
use App\Models\GroupResource;
use App\Models\GroupProgress;
use App\Models\GroupNote;
use App\Models\User;

class GroupDemoSeeder extends Seeder
{
    public function run(): void
    {
        // Get first user as creator
        $user = User::first() ?? User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
            'password' => bcrypt('password'),
        ]);

        // Create a group
        $group = Group::create([
            'name' => 'Demo Research Group',
            'description' => 'A demo group with resources, progress, and notes.',
            'created_by' => $user->id,
        ]);

        // Add user to group
        $group->users()->attach($user->id);

        // Add resources
        GroupResource::create([
            'group_id'    => $group->id,
            'user_id'     => $user->id,
            'uploaded_by' => $user->id,
            'title'       => 'Research Paper on AI',
            'link'        => 'uploads/papers/ai.pdf',
        ]);

        GroupResource::create([
            'group_id'    => $group->id,
            'user_id'     => $user->id,
            'uploaded_by' => $user->id,
            'title'       => 'Dataset for Analysis',
            'link'        => 'uploads/datasets/data.csv',
        ]);

        // Add progress goals
        GroupProgress::create([
            'group_id' => $group->id,
            'stage'    => 'Literature Review',
            'completed'=> false,
        ]);

        GroupProgress::create([
            'group_id' => $group->id,
            'stage'    => 'Data Collection',
            'completed'=> true,
        ]);

        // Add notes
        GroupNote::create([
            'group_id'  => $group->id,
            'created_by'=> $user->id,
            'content'   => 'We should meet next week to finalize methodology.',
        ]);

        GroupNote::create([
            'group_id'  => $group->id,
            'created_by'=> $user->id,
            'content'   => 'Don’t forget to review the dataset before analysis.',
        ]);
    }
}
