<?php

namespace App\Http\Controllers;

use App\Models\Dailay;
use Illuminate\Http\Request;

class DailayController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $dailays = Dailay::all();

        return view('daily.index', compact('dailays'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $this->authorize('create', Dailay::class);

        return view('daily.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'dailycontent' => 'required',
        ]);
        $dailay = new Dailay();
        $dailay->dailycontent = $request->input('dailycontent');
        $dailay->save();
        return redirect()->route('daily.index')->with('success', 'Daily created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Dailay $dailay)
    {
        $this->authorize('view', $dailay);
        return view('daily.show', compact('dailay'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Dailay $dailay)
    {
        $this->authorize('update', $dailay);

        return view('daily.edit', compact('dailay'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Dailay $dailay)
    {
        $request->validate([
            'dailycontent' => 'required',
        ]);

        $dailay->dailycontent = $request->input('dailycontent');

        $dailay->save();

        return redirect()->route('daily.index')->with('success', 'daily updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Dailay $dailay)
    {
        $this->authorize('delete', $dailay);

        $dailay->delete();

        return redirect()->route('daily.index')->with('success', 'daily deleted successfully');
    }
}
