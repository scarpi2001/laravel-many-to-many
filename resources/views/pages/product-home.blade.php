@extends('layouts.main-layout')

@section('content')

    <h1>Products</h1>
    <a href="{{ route('product.create') }}">CREATE NEW PRODUCT</a>
    <ul>
        @foreach ($products as $product)
            <li>
                <h3>Prodotto: [{{ $product -> code }}] - {{ $product -> name }}</h3>
                
                <ul>
                    <li>
                        TIPOLOGIA: {{ $product -> typology -> name }}
                    </li>
                    <li>
                        DIGITAL: {{ $product -> typology -> digital ? "YES" : "NO" }}
                    </li>
                </ul>
            </li>
        @endforeach
    </ul>
