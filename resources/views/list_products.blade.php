@extends('layouts.index')
@section('title','Liste des produits')
@section('content')

<div class="container mt-5">
    <div class="row">
        <div class="col-md-12">
            <h1>Gestion des produits - MEAC-LARAVEL APP</h1>
            <hr>
        </div>
        <div class="col-md-12">
            <div class="row">
                @foreach($products as $product)
                <div class="col-md-4 mb-3">
                    <div class="card">
                        <div class="card-header">
                            {{ $product->libelle }}
                        </div>
                        <div class="card-body">
                            <p style="text-align: center;"><img src="{{ $product->image }}" alt="" height="250px" style="max-width:100%"></p>
                            <p>{{ $product->description }} </p>
                        </div>
                        <div class="card-footer">
                            <strong>Prix: {{ $product->price }} F</strong>&nbsp;&nbsp; | &nbsp;&nbsp;
                            <a href="{{ route('show_products', $product->id) }}" class="btn btn-primary">Acheter</a>
                        </div>
                    </div>
                </div>
                @endforeach



            </div>
        </div>
    </div>
</div>
@endsection