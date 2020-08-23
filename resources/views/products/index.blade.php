@extends('layouts.app')

@section('content')
    <div id="products" class="wrapper">
        <div class="flex space-between align-items-center">
            <h1 class="page-heading">Products</h1>

            <a href="{{ route('add-products') }}" class="button button--primary">Add a new product</a>
        </div>

        <x-filter>
            <input type="hidden" name="filter-type" value="products">
        </x-filter>

        <div class="cards-wrapper">
            <div class="grid g-col-4 gap-20">
                @if(count($products) > 0)
                    @foreach($products as $product)
                        <div class="card">
                            <a href="{{ route('product', $product->slug) }}">
                                <div class="card-image-wrapper"
                                     style="background: url('{{ asset('storage/images/products/' . $product->image) }}');"></div>

                                <div class="flex space-between p-10">
                                    <p>{{ $product->name }}</p>

                                    @foreach($product->allergies as $allergy)
                                        @if($allergy == 'No allergies')
                                            <p>No A</p>
                                        @endif
                                    @endforeach

                                    <div class="options">
                                        <a href="{{ route('update-product-form', $product->slug) }}"><img src="{{ asset('images/icons/edit.svg') }}"
                                                         alt="Delete {{ $product->name }}"/></a>

                                        <form action="{{ route('delete-product', $product->id) }}" method="POST">
                                            <button type="submit" class="icon icon--style">
                                                <img src="{{ asset('images/icons/bin.svg') }}"
                                                     alt="Delete {{ $product->name }}"/>
                                            </button>
                                            <input type="hidden" name="delete-image" value="{{ $product->image }}">
                                            @csrf
                                            @method('DELETE')
                                        </form>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endforeach

                @else

                    <p>There are no products</p>
                @endif
            </div>
        </div>
    </div>

@endsection
