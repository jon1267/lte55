<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contact;

class ContactController extends Controller
{
    public function contact()
    {
        $active = [];
        for($i=0; $i<=7; $i++) $active[$i] = false;
        $active[7] = true;

        $contacts = Contact::get();

        $breadCrumb = 'Contact Us';

        $templates = [
            0 => 'site.contact.contact_sity',
            1 => 'site.contact.contact_form_map',
            2 => 'site.contact.contact_facilities'
        ];

        return view('site.contact.contact', [
            'breadCrumb' => $breadCrumb,
            'active' => $active,
            'templates' => $templates,
            'contacts' => $contacts
        ]);
    }
}
