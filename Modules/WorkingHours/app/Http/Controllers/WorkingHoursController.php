<?php

namespace Modules\WorkingHours\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class WorkingHoursController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('workinghours::index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('workinghours::create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request) {}

    /**
     * Show the specified resource.
     */
    public function show($id)
    {
        return view('workinghours::show');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        return view('workinghours::edit');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id) {}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id) {}
}
