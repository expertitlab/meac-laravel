@extends('layouts.index')
@section('title','Liste des produits')
@section('content')

<div class="container mt-5">
    <div class="row">
        <div class="col-md-12">
            <h1> {{ $product->libelle }} - MEAC-LARAVEL APP</h1>
            <hr>
        </div>
        <div class="col-md-6">
            <img src="{{$product->image}}" height="350" alt="">
        </div>
        <div class="col-md-6">
            <h1>{{ $product->libelle }}</h1>
            <hr>
            <h3> PRIX: {{ number_format( $product->price, 2) }}</h3>
            <hr>
             {{ $product->description }}

             <br><br>
             <button class="btn btn-lg btn-primary">Acheter</button>
        </div>
    </div>
</div>
@endsection