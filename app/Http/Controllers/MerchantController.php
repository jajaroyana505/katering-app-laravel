<?php

namespace App\Http\Controllers;

use App\Models\MenuModel;
use App\Models\MerchantModel;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

use function PHPUnit\Framework\isEmpty;

class MerchantController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function __construct()
    {

        if (MerchantModel::where('user_id', Session::get('user_id'))->first() == null) {
            return redirect()->route('merchant.create');
        }
    }
    public function index()
    {
        return view('merchnat.home');
    }


    public function menu()
    {
        if (MerchantModel::where('user_id', Session::get('user_id'))->first() == null) {
            return redirect()->route('merchant.create');
        }

        $merchant = MerchantModel::where('user_id', Session::get('user_id'))->first();
        // echo $merchant->id;

        return view('merchnat.menu', [
            'menus' => MenuModel::where('merchant_id', $merchant->id)->get()
        ]);
    }
    public function profile()
    {


        if (MerchantModel::where('user_id', Session::get('user_id'))->first() == null) {
            return redirect()->route('merchant.create');
        }

        return view('merchnat.profile', [
            'user' => User::where('id', Session::get('user_id'))->first()
        ]);
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create_merchant()
    {
        return view('merchnat.create_merchaint');
    }
    public function store_merchant(Request $request)
    {


        MerchantModel::create([
            'user_id' =>  Session::get('user_id'),
            'nama_merchant' => $request->nama_merchant,
            'alamat' => $request->alamat,
            'kontak' => $request->kontak,
            'deskripsi' => $request->deskripsi,

        ]);
        return redirect()->route('merchant.profile')->with('success', 'data berhasil disimpan!');
    }
    public function create_menu()
    {
        return view('merchnat.create_menu');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store_menu(Request $request)
    {
        $merchant = MerchantModel::where('user_id', Session::get('user_id'))->first();

        MenuModel::create([
            'merchant_id' =>  $merchant->id,
            'nama' => $request->nama,
            'deskripsi' => $request->deskripsi,
            'harga' => $request->harga,
        ]);
        return back()->with('success', 'data berhasil disimpan!');
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
    public function edit_menu($id)
    {

        // dd($data);
        return view('merchnat.edit_menu', [
            'menu' => MenuModel::findOrFail($id)
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update_menu(Request $request, $id)
    {

        $data = MenuModel::findOrFail($id);
        $data->fill($request->all());
        $data->save();
        return redirect()->route('merchant.menu');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy_menu($id)
    {
        $data = MenuModel::findOrFail($id);
        $data->delete();

        return redirect()->route('merchant.menu');
    }
}
