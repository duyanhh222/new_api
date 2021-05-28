<?php

namespace App\Http\Controllers;

use App\Models\pots;
use Illuminate\Http\Request;
use App\Http\Resources\potscollection;
use App\Http\Resources\potsresource;
use App\Http\Requests\potsstore;
class POtsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return new potscollection(pots::paginate(5));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:255|unique:pots',
            'body' => 'required',
        ]);
        return pots::create($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\pots  $pots
     * @return \Illuminate\Http\Response
     */
    public function show(pots $id)
    {
        return new potsresource($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\pots  $pots
     * @return \Illuminate\Http\Response
     */
    public function edit(pots $pots)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\pots  $pots
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, pots $id)
    {
        $request->validate([
            'title' => 'required|max:255|unique:pots',
            'body' => 'required',
        ]);
        return $id->update($request->all());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\pots  $pots
     * @return \Illuminate\Http\Response
     */
    public function destroy(pots $id)
    {
        return $id->delete();
    }
}
