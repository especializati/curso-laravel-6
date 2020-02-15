@extends('admin.layouts.app')

@section('title', "Editar Produto {$product->name}")

@section('content')
    <h1>Editar Produto {{ $product->name }}</h1>

    <form action="{{ route('products.update', $product->id) }}" method="post">
        @method('PUT')
        @include('admin.pages.products._partials.form')
    </form>
@endsection
