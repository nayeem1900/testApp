<?php

namespace App\Http\Controllers;

use App\Models\MenuActivity;
use Illuminate\Http\Request;

class MenuActivityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
     * @param  \App\Models\MenuActivity  $menuActivity
     * @return \Illuminate\Http\Response
     */
    public function show(MenuActivity $menuActivity)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\MenuActivity  $menuActivity
     * @return \Illuminate\Http\Response
     */
    public function edit(MenuActivity $menuActivity)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\MenuActivity  $menuActivity
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, MenuActivity $menuActivity)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\MenuActivity  $menuActivity
     * @return \Illuminate\Http\Response
     */
    public function destroy(MenuActivity $menuActivity)
    {
        //
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\MenuActivity  $menuActivity
     * @return \Illuminate\Http\Response
     */
    static public function actionCheck($menuId, $actionId){
        
        $check = MenuActivity::where('menu_id', $menuId)->where('action_id', $actionId)->count();
        return $check;
    }
}
