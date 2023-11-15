<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\County;


class CountyController extends Controller
{
    public function index()
    {
        $counties = County::orderBy('name')->get();
        return view('county/index', compact('counties'));
    }

    public function create()
    {
        return view('county/create');
    }

    public function store(Request $request)
    {
        County::create($request->all());
        return redirect()->route('county/index');
    }


    public function edit(County $county)
    {
        return view('county/edit', compact('county'));
    }

    public function update(Request $request, County $county)
    {
        $county->update($request->all());
        return redirect()->route('county/index');
    }

    public function destroy(County $county)
    {
        $county->delete();
        return redirect()->route('county/index');
    }

    public function filter(Request $request)
    {
        $counties = County::where('name', 'like', '%' . $request->input('filter') . '%')->get();
        return view('county/index', compact('counties'));
    }
}
