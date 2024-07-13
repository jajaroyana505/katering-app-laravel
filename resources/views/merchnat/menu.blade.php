@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        @foreach ($menus as $menu)

        <div class="col-4">
            <div class="card">
                <div class="card-header">
                    {{ $menu['nama']}}
                </div>
                <div class="card-body">
                    <img class="img-fluid " src="https://d1vbn70lmn1nqe.cloudfront.net/prod/wp-content/uploads/2023/07/28042323/Resep-Olahan-Ayam-yang-Lebih-Padat-Nutrisi-dan-Bergizi-.jpg.webp" alt="">
                    <h1 class="mt-2">{{ $menu['nama']}}</h1>
                    <h3>Rp. {{ $menu['harga']}}</h3>
                    <p>{{ $menu['deskripsi']}}</p>
                    <button class="btn btn-primary">Ubah</button>
                    <button class="btn btn-danger">Hapus</button>
                </div>
            </div>
        </div>
        @endforeach
    </div>

</div>
@endsection