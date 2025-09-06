<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class ClearAllDataSeeder extends Seeder
{
    public function run()
    {
        // Disable foreign key checks
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');

        // List of tables to clear
        $tables = [
            'users',
            'research_interests',
            'groups',
            'group_user',
            'group_requests',
            'group_notes',
            'group_progress',
            'group_resources',
            'checklist_items',
            'user_mentors',
            'resources',
            'forums',
            'forum_comments',
            'templates',
            'announcements'
        ];

        foreach ($tables as $table) {
            if (Schema::hasTable($table)) {
                DB::table($table)->truncate();
            }
        }

        // Re-enable foreign key checks
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        $this->command->info('All existing data cleared successfully!');
    }
}
