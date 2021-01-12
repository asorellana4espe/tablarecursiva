<?php

namespace App\Http\Controllers;

use App\Models\arbol;
use Illuminate\Http\Request;

class ArbolController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $arbol = Arbol::where('parent_id', null)->first();
        $hijos = $arbol->children()->paginate(10);
        return view('welcome', compact('arbol', 'hijos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function details(arbol $arbol)
    {
        $hijos = $arbol->children()->paginate(10);
        return view('welcome', compact('arbol', 'hijos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Arbol::create($request->all());
        $arbol = Arbol::where('id', $request->parent_id)->first();
        $hijos = $arbol->children()->paginate(10);
        return view('welcome', compact('arbol', 'hijos'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\arbol  $arbol
     * @return \Illuminate\Http\Response
     */
    public function show(arbol $arbol)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\arbol  $arbol
     * @return \Illuminate\Http\Response
     */

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\arbol  $arbol
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, arbol $arbol)
    {
        $arbol->update($request->all());
        $hijos = $arbol->children()->paginate(10);
        return view('welcome', compact('arbol', 'hijos'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\arbol  $arbol
     * @return \Illuminate\Http\Response
     */
    public function delete(arbol $arbol)
    {
        $arbol2 = $arbol->father()->first();
        $arbol->delete();
        $arbol = $arbol2;
        $hijos = $arbol->children()->paginate(10);
        return view('welcome', compact('arbol', 'hijos'));
    }
}
