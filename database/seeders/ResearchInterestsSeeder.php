<?php

namespace Database\Seeders;

use App\Models\ResearchInterest;
use Illuminate\Database\Seeder;

class ResearchInterestsSeeder extends Seeder
{
    public function run()
    {
        $categories = [
    'Computer Science' => [
        'Artificial Intelligence (AI) and Machine Learning (ML)',
        'Computer Vision',
        'Natural Language Processing (NLP)',
        'Cybersecurity',
        'Human-Computer Interaction (HCI)',
        'Data Science',
        'Quantum Computing'
    ],
    'Electrical and Electronic Engineering' => [
        'Power Systems',
        'Communications',
        'Control Systems'
    ],
    'Business Study' => [
        'Marketing',
        'Accounting and Finance',
        'Management'
    ],
    'Medical Science' => [
        'Clinical Research',
        'Public Health Research'
    ],
    'Literature' => [
        'Genre Studies',
        'Period Studies',
        'Post-Colonial Literature',
        'Comparative Literature'
    ],
    'Social Science' => [
        'Anthropology',
        'Economics',
        'Political Science',
        'Psychology',
        'Sociology'
    ]
];


        foreach ($categories as $parent => $children) {
            $parentCategory = ResearchInterest::create(['name' => $parent]);
            foreach ($children as $child) {
                ResearchInterest::create(['name' => $child, 'parent_id' => $parentCategory->id]);
            }
        }
    }
}

