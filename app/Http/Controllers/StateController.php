<?php
namespace App\Http\Controllers;

use App\Models\State;
use App\Models\Country;
use Illuminate\Http\Request;

class StateController extends Controller
{
   
    public function index(Request $request)
{
    $query = State::with('country');

    if ($request->filled('search')) {
        $query->where('state_name', 'like', '%' . $request->search . '%');
    }

    if ($request->filled('country_id')) {
        $query->where('country_id', $request->country_id);
    }

    $states = $query->paginate(10)->withQueryString();
    $countries = Country::all();

    return view('states.index', compact('states', 'countries'));
}


    public function create()
    {
        $countries = Country::all();
        return view('states.create', compact('countries'));
    }

    public function store(Request $request)
    {
        $request->validate(['state_name' => 'required|unique:states', 'country_id' => 'required']);
        State::create($request->all());
        return redirect()->route('states.index')->with('success', 'State created successfully.');
    }

    public function show(State $state)
    {
        return view('states.show', compact('state'));
    }

    public function edit(State $state)
    {
        $countries = Country::all();
        return view('states.edit', compact('state', 'countries'));
    }

    public function update(Request $request, State $state)
    {
        $request->validate(['state_name' => 'required|unique:states,state_name,' . $state->id, 'country_id' => 'required']);
        $state->update($request->all());
        return redirect()->route('states.index')->with('success', 'State updated successfully.');
    }

    public function destroy(State $state)
    {
        $state->delete();
        return redirect()->route('states.index')->with('success', 'State deleted successfully.');
    }
}
