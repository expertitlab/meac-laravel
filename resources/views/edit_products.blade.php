@extends('layouts.index')
@section('title','Modification du produit')
@section('content')

<div class="container mt-5">
    <div class="row">
        <div class="col-md-12">
            <h1>Modification du produit - MEAC-LARAVEL APP</h1>
            <hr>
        </div>
        <div class="col-md-8 offset-md-2">
            <form action="{{ route('edit_products', $product->id) }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    @if(session()->has('success'))
                    <div class="alert alert-success">{{session('success')}}</div>
                    @endif
                    <div class="col-md-6">
                        <div class="mb-3">
                            <input type="text" placeholder="Libelle du produit" value="{{ old('libelle') ? old('libelle') : $product->libelle }}" name="libelle" class="form-control">
                        </div>
                        @error('libelle')
                        <span style="color:red">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <input type="number" min="0" placeholder="Prix du produit" value="{{ old('price') ? old('price') : $product->price }}" name="price" class="form-control">
                        </div>
                        @error('price')
                        <span style="color:red">{{$message}}</span>
                        @enderror
                    </div>

                    <div class="col-md-12">
                        <div class="mb-3">
                            <input type="file" accept="image/*" name="image" class="form-control">
                        </div>
                        @error('image')
                        <span style="color:red">{{$message}}</span>
                        @enderror
                        <p style="text-align: center;"><img src="{{ $product->image }}" alt="" height="250px" style="max-width:100%"></p>

                    </div>
                    <div class="col-md-12">
                        <div class="mb-3">
                            <textarea name="description" id="description" rows="4" class="form-control" placeholder="Description du produit">{{ old('description') ? old('description') : $product->description }}</textarea>
                        </div>
                        @error('description')
                        <span style="color:red">{{$message}}</span>
                        @enderror

                    </div>
                    <div class="col-md-12">
                        <input type="submit" class="btn btn-outline-success" value="Mettre à jour le produit">
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection