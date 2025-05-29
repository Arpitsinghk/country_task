<?php
namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Country;
use App\Models\State;
use Illuminate\Http\Request;

class CityController extends Controller
{
public function index(Request $request)
{
    $query = City::with(['state.country']);

    if ($request->filled('search')) {
        $query->where('city_name', 'like', '%' . $request->search . '%');
    }


    $cities = $query->paginate(10)->withQueryString();
    $states = State::all();
    $countries = Country::all();

    return view('cities.index', compact('cities', 'states', 'countries'));
}
   

    public function create()
    {
        $states = State::all();
        return view('cities.create', compact('states'));
    }

    public function store(Request $request)
    {
        $request->validate(['city_name' => 'required|unique:cities', 'state_id' => 'required']);
        City::create($request->all());
        return redirect()->route('cities.index')->with('success', 'City created successfully.');
    }

    public function show(City $city)
    {
        return view('cities.show', compact('city'));
    }

    public function edit(City $city)
    {
        $states = State::all();
        return view('cities.edit', compact('city', 'states'));
    }

    public function update(Request $request, City $city)
    {
        $request->validate(['city_name' => 'required|unique:cities,city_name,' . $city->id, 'state_id' => 'required']);
        $city->update($request->all());
        return redirect()->route('cities.index')->with('success', 'City updated successfully.');
    }

    public function destroy(City $city)
    {
        $city->delete();
        return redirect()->route('cities.index')->with('success', 'City deleted successfully.');
    }
}
