<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LocationController extends Controller
{
    /**
     * Show lawyer services in Westlands, Nairobi
     */
    public function westlands()
    {
        $location = [
            'name' => 'Westlands',
            'title' => 'Lawyer in Westlands, Nairobi',
            'description' => 'Expert legal services in Westlands, Nairobi. Omonge Adero provides professional legal counsel for families and businesses in Westlands and surrounding areas.',
            'areas_served' => ['Westlands', 'Parklands', 'Highridge', 'Kangemi', 'Mountain View'],
            'services' => [
                'Corporate Law',
                'Family Law & Divorce',
                'Property &Land Law',
                'Civil Litigation',
                'Employment Law'
            ],
            'slug' => 'westlands'
        ];

        return view('pages.locations.show', compact('location'));
    }

    /**
     * Show lawyer services in Upper Hill, Nairobi
     */
    public function upperHill()
    {
        $location = [
            'name' => 'Upper Hill',
            'title' => 'Lawyer in Upper Hill, Nairobi',
            'description' => 'Professional legal representation in Upper Hill, Nairobi. Specializing in corporate law, civil litigation, and family matters for clients in Upper Hill and Nairobi CBD.',
            'areas_served' => ['Upper Hill', 'Nairobi CBD', 'Kilimani', 'Hurlingham', 'Lavington'],
            'services' => [
                'Corporate & Commercial Law',
                'Civil Litigation',
                'Family Law',
                'Property Disputes',
                'Contract Drafting'
            ],
            'slug' => 'upper-hill'
        ];

        return view('pages.locations.show', compact('location'));
    }

    /**
     * Show lawyer services in Kilimani, Nairobi
     */
    public function kilimani()
    {
        $location = [
            'name' => 'Kilimani',
            'title' => 'Lawyer in Kilimani, Nairobi',
            'description' => 'Trusted legal services in Kilimani, Nairobi. Omonge Adero offers expert legal counsel in family law, property disputes, and business matters for Kilimani residents.',
            'areas_served' => ['Kilimani', 'Hurlingham', 'Lavington', 'Kileleshwa', 'Ngong Road'],
            'services' => [
                'Family & Matrimonial Law',
                'Property Law',
                'Succession & Wills',
                'Business Law',
                'Dispute Resolution'
            ],
            'slug' => 'kilimani'
        ];

        return view('pages.locations.show', compact('location'));
    }
}
