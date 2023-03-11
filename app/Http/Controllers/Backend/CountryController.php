<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\CountryStoreRequest;
use App\Models\Country;
use Illuminate\Http\Request;

class CountryController extends Controller
{
    public function index(Request $req)
    {
        $countries= Country::all();
        if ($req->search) {
            $countries = Country::where('name', 'like', "%{$req->search}%")->orWhere('country_code', 'like', "%{$req->search}%")->get();
        }
        return view('countries.index', compact('countries'));
    }
    public function create()
    {
        return view('countries.create');
    }
    public function store(CountryStoreRequest $req)
    {
        Country::create($req->validated());
        return redirect()->route('countries.index')->with('message', 'New Country Created!');
    }
    public function edit(Country $country)
    {
        return view('countries.edit', compact('country'));
    }
    public function update(CountryStoreRequest $req, Country $country)
    {
        $country->update($req->validated());
        return redirect()->route('countries.index')->with('message', 'Country successfully Updated!');
    }
    public function destroy(Country $country)
    {
        $country->delete();
        return redirect()->route('countries.index')->with('message', 'Country successfully Deleted!');
    }
}
