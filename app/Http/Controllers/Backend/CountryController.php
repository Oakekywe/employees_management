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
}
