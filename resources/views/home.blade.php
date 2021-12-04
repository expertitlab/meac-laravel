@extends('layouts.index')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>
                @if(session()->has('success'))
                <div class="alert alert-success">{{session('success')}}</div>
                @endif
                @if(auth()->user()->rule == 'ADMIN')
                <div class="card-body">
                    <table class="table table-striped table-bordered">
                        @foreach(App\Models\Product::where('user_id', auth()->user()->id)->get() as $product)
                        <tr>
                            <td>#-{{ $product->id}}</td>
                            <td>{{ $product->libelle}}</td>
                            <td>{{ $product->description}}</td>
                            <td>
                                <a href="{{ route('edit_products', $product->id)}}" class="btn btn-outline-info">Edit</a> &nbsp;
                                <a href="{{ route('destroy_products', $product->id) }}" class="btn btn-outline-danger">Sup</a>
                            </td>
                        </tr>
                        @endforeach
                    </table>
                </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
@section('script')
<script>
    const listes = document.getElementsByClassName('btn-outline-danger');

    for ($i = 0; $i < listes.length; $i++) {
        listes[$i].addEventListener('click', function(e) {
            e.preventDefault()
            let isconfirmed = confirm('Voulez-vous vraiment supprimé le produit ?');
            console.log(isconfirmed);
            if (isconfirmed) {
                location.href = this.href;
            }
        })
    }
</script>
@endsection