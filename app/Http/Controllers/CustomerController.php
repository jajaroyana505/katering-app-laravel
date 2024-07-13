<?php

namespace App\Http\Controllers;

use App\Models\CustomerModel;
use App\Models\MenuModel;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('customer.home');
    }

    public function menu()
    {


        return view('customer.menu', [
            'menus' => MenuModel::all()
        ]);
    }
    public function profile()
    {


        return view('customer.profile', [
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
    public function show(CustomerModel $customerModel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(CustomerModel $customerModel)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, CustomerModel $customerModel)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CustomerModel $customerModel)
    {
        //
    }
}
