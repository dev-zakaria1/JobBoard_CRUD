<?php

namespace App\Http\Controllers;

use App\Http\Requests\Listing\StoreListingRequest;
use App\Http\Requests\Listing\UpdateListingRequest;
use Illuminate\Http\Request;
use App\Models\listings;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;

class ListingController extends Controller
{
    // show all listings
    public function index(Request $request)
    {
        return view('listings.index', ['listings' => listings::latest()->filter(request(['tag', 'search']))->paginate(4)]); //simplepaginate(4)]);
    }
    //show single listing
    public function show(listings $listing)
    {
        return view("listings.show", ['listing' => $listing]);
    }
    // show create form
    public function create()
    {
        return view('listings.create');
    }
    //store listing data
    public function store(StoreListingRequest $request)
    {
        
        
        $listing = new listings();
        $listing->fill($request->validated());
        if ($request->hasFile('logo')) {
            $path = $request->file('logo')->store('listing_image', 'public');
            $listing->logo = $path;
        }
        $listing->user_id = Auth::id();
        $listing->save();
        return redirect('/')->with('message', 'listing created successfully');
    }
    //show edit form
    public function edit(listings $listing)
    {
        $this->checkAction($listing);
        return view('listings.edit', ['listing' => $listing]);
    }
    public function checkAction($listing)
    {

        if ($listing->user_id != Auth::id()) {
            abort(403, 'Unauthorized action');
        }
    }
    public function update(UpdateListingRequest $request, Listings $listing)
    {
        $this->checkAction($listing);
        $val = $request->validated();
        if ($request->hasFile('logo')) {
            if ($listing->logo) {
                Storage::disk('public')->delete($listing->logo);
            }
            $filename = $request->file('logo')->store('listing_image', 'public');
            $val['logo'] = $filename;
        }
        $listing->update($val);
        return redirect()->route('home.index')->with('message', 'listing updated successfully');
    }
    // delete listing
    public function destroy(listings $listing)
    {
        $this->checkAction($listing);
        if ($listing->logo) {
            Storage::disk('public')->delete($listing->logo);
        }
        $listing->delete();
        return redirect()->route('home.index')->with('message', 'listing deleted');
    }
    public function manage()
    {
        return view('listings.manage', ['listings' => Auth::user()->listings]);
    }
}
