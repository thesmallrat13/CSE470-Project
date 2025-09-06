<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ConferenceController extends Controller
{
    public function index()
    {
        $conferences = [
            [
                'name' => 'CHI',
                'submission' => 'Full',
                'deadline' => 'Abstract- 04.09.25, Paper- 11.09.25',
                'date' => '13-17 April 2026',
                'website' => 'https://chi2026.acm.org/'
            ],
            [
                'name' => 'CHI',
                'submission' => 'Poster',
                'deadline' => '22.01.2026',
                'date' => '13-17 April 2026',
                'website' => 'https://chi2026.acm.org/'
            ],
            [
                'name' => 'CSCW',
                'submission' => 'Full',
                'deadline' => '13.05.2025',
                'date' => 'October 2026',
                'website' => 'https://cscw.acm.org/2026/'
            ],
            [
                'name' => 'CSCW',
                'submission' => 'Short',
                'deadline' => '13.05.2025',
                'date' => '13.05.2025',
                'website' => 'https://cscw.acm.org/2026/'
            ],
            [
                'name' => 'ICTD',
                'submission' => 'Full',
                'deadline' => 'Not announced yet',
                'date' => '2026',
                'website' => 'https://ictd.org/'
            ],
            [
                'name' => 'CUI',
                'submission' => 'Full',
                'deadline' => 'Abstract- 13.02.25, Paper- 27.02.25',
                'date' => '8-10 July 2025',
                'website' => 'https://cui.acm.org/2025/'
            ],
            [
                'name' => 'CUI',
                'submission' => 'Poster',
                'deadline' => '17.04.25',
                'date' => '8-10 July 2025',
                'website' => 'https://cui.acm.org/2025/'
            ],
            [
                'name' => 'SOUPS',
                'submission' => 'Full',
                'deadline' => 'Abstract- 06.02.25, Paper- 12.02.25',
                'date' => '10-12 August 2025',
                'website' => 'https://www.usenix.org/conference/soups2025'
            ],
            [
                'name' => 'SOUPS',
                'submission' => 'Poster',
                'deadline' => 'Priority- 24.04.25, Usual- 22.05.25',
                'date' => '10-12 August 2025',
                'website' => 'https://www.usenix.org/conference/soups2025'
            ],
            [
                'name' => 'COMPASS',
                'submission' => 'Full',
                'deadline' => '31.01.25',
                'date' => '22-25 July 2025',
                'website' => 'https://compass.acm.org/'
            ],
            [
                'name' => 'COMPASS',
                'submission' => 'Short',
                'deadline' => '1st round- 09.12.24, 2nd round- 05.04.25',
                'date' => '22-25 July 2025',
                'website' => 'https://compass.acm.org/'
            ],
            [
                'name' => 'DIS',
                'submission' => 'Full',
                'deadline' => 'Abstract- 13.01.25, Paper- 20.01.25',
                'date' => '5-9 July 2025',
                'website' => 'https://dis.acm.org/2025/'
            ],
            [
                'name' => 'DIS',
                'submission' => 'Short',
                'deadline' => '21.03.25',
                'date' => '5-9 July 2025',
                'website' => 'https://dis.acm.org/2025/'
            ],
        ];

        return view('conferences.index', compact('conferences'));
    }
}
