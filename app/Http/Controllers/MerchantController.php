<?php

namespace App\Http\Controllers;

use App\Models\MenuModel;
use App\Models\MerchantModel;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class MerchantController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('merchnat.home');
    }


    public function menu()
    {

        // foreach (MenuModel::all() as $menu) {
        //     echo $menu->nama;
        // }

        // dd($data);
        return view('merchnat.menu', [
            'menus' => MenuModel::all()
        ]);
    }
    public function profile()
    {

        // foreach (MenuModel::all() as $menu) {
        //     echo $menu->nama;
        // }

        // dd($data);
        return view('merchnat.profile', [
            'user' => User::where('id', Session::get('user_id'))->first()
        ]);
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(MerchantModel $merchantModel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(MerchantModel $merchantModel)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, MerchantModel $merchantModel)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(MerchantModel $merchantModel)
    {
        //
    }
}
