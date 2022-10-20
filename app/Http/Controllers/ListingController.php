<?php

namespace App\Http\Controllers;

use App\Listing;
use Illuminate\Http\Request;

class ListingController extends Controller
{
    public function index() {
        return view('listings.index', [
            'listings' => Listing::latest()->filter(request(['tag', 'search']))->paginate(4)
        ]);
    }

    public function show(Listing $listing) {
        return view('listings.show', [
            'listing' => $listing
        ]);
    }

    public function create() {
        return view('listings.create');
    }

    public function store(Request $request) {
        // dd($request);
        $formField=$request->validate([
            'title' => 'required',
            'company' => ['required', 'unique:listings', 'max:255'],
            'location' => 'required',
            'email' => ['required', 'unique:listings'],
            'website' => ['required', 'unique:listings'],
            'tags' => 'required',
            'description' => ['required', 'max:500']
        ]);

        if ($formField ?? false) {
            Listing::create([
                'title' => request('title'),
                'company' => request('company'),
                'location' => request('location'),
                'email' => request('email'),
                'website' => request('website'),
                'tags' => request('tags'),
                'description' => request('description')
            ]);
        }
        return redirect('/')->with('message', "List Successfully created");
    }
}
