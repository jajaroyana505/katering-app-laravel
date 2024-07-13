@extends('layouts.app')

@section('content')
<div class="container">

    <div class="row">

        @foreach ($menus as $menu)


        <div class="col-md-4 mb-4">
            <div class="card">
                <div class="card-header">
                    {{$menu->merchants->nama_merchant}}
                </div>
                <div class="card-body">
                    <img class="img-fluid " src="https://d1vbn70lmn1nqe.cloudfront.net/prod/wp-content/uploads/2023/07/28042323/Resep-Olahan-Ayam-yang-Lebih-Padat-Nutrisi-dan-Bergizi-.jpg.webp" alt="">
                    <h1 class="mt-2">{{ $menu['nama']}}</h1>
                    <h3>Rp. {{ $menu['harga']}}</h3>
                    <p>{{ $menu['deskripsi']}}</p>


                    <div class="d-flex">
                        <a href="" class="btn btn-primary">Order</a>


                    </div>

                </div>
            </div>
        </div>
        @endforeach
    </div>

</div>
@endsection