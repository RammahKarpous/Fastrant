@extends('layouts.app')

@section('content')
    <main class="wrapper">
        <article class="product mb-100">
            <header class="product__hero-image"
                    style="background: url('{{ asset('storage/images/products/' . $product->image) }}')"></header>

            <section class="product__content-wrapper content">
                <a href="{{ route('products') }}" class="back-button flex flex-start">
                    <img src="{{ asset('images/icons/arrow-left.png') }}" alt="Back to products">
                    Back
                </a>

                <h1 class="product__heading page-heading">{{ $product->name }}</h1>

                <div class="product__content-group">
                    <h2>Price</h2>
                    <p>£ {{ $product->price }}</p>
                </div>

                <div class="product__content-group">
                    <h2>Category</h2>
                    <p>{{ $product->category->name }}</p>
                </div>

                <div class="product__content-group">
                    <h2>Description</h2>
                    <p>{{ $product->description }}</p>
                </div>

                <div class="product__content-group">
                    <h2>Description</h2>
                    <div class="flex">
                        @foreach($product->allergies as $allergy)
                            <p>{{ $allergy }}, </p>
                        @endforeach
                    </div>
                </div>


            </section>
        </article>
    </main>
@endsection
