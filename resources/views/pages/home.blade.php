@extends('layouts.main-layout')

@section('content')

    <a href="{{ route('product.create') }}">CREATE NEW PRODUCT</a>
    @foreach ($categories as $category)
        <h2>Categoria: {{ $category -> name }}</h2>

        <ul>
            @foreach ($category -> products as $product)

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

        <hr>
    @endforeach

@endsection