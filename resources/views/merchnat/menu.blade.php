@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row mb-3">
        <div class="col-auto">
            <a href="{{ route('merchant.create_menu')}}" class="btn btn-primary">Tambah menu</a>
        </div>
    </div>
    <div class="row">

        @foreach ($menus as $menu)

        <div class="col-md-4 mb-4">
            <div class="card">
                <div class="card-header">
                    {{ $menu['nama']}}
                </div>
                <div class="card-body">
                    <img class="img-fluid " src="https://d1vbn70lmn1nqe.cloudfront.net/prod/wp-content/uploads/2023/07/28042323/Resep-Olahan-Ayam-yang-Lebih-Padat-Nutrisi-dan-Bergizi-.jpg.webp" alt="">
                    <h1 class="mt-2">{{ $menu['nama']}}</h1>
                    <h3>Rp. {{ $menu['harga']}}</h3>
                    <p>{{ $menu['deskripsi']}}</p>
                    <div class="d-flex">
                        <a href="{{ route('merchant.edit_menu', ['id' => $menu->id]) }}" class="btn btn-primary">Ubah</a>
                        <form class="ms-2" action="{{ route('merchant.destroy_menu', ['id' => $menu->id]) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger" type="submit">Delete</button>
                        </form>

                    </div>

                </div>
            </div>
        </div>
        @endforeach
    </div>

</div>
@endsection