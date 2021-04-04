<?php

namespace App\Http\Controllers;

use App\Models\masyarakatt_rahma;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

class MasyarakattRahmaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $masyarakat = DB::table('masyarakatt_rahmas')
        ->select('masyarakatt_rahmas.*')
        ->get();

        return view('masyarakat',['masyarakat' => $masyarakat]);
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\masyarakatt_rahma  $masyarakatt_rahma
     * @return \Illuminate\Http\Response
     */
    public function show(masyarakatt_rahma $masyarakatt_rahma)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\masyarakatt_rahma  $masyarakatt_rahma
     * @return \Illuminate\Http\Response
     */
    public function edit(masyarakatt_rahma $masyarakatt_rahma)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\masyarakatt_rahma  $masyarakatt_rahma
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, masyarakatt_rahma $masyarakatt_rahma)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\masyarakatt_rahma  $masyarakatt_rahma
     * @return \Illuminate\Http\Response
     */
    public function destroy(masyarakatt_rahma $masyarakatt_rahma)
    {
        //
    }
}
