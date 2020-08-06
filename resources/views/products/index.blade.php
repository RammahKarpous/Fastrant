@extends('layouts.app')

@section('content')
    <div id="products" class="wrapper">
        <div class="flex space-between align-items-center">
            <h1 class="page-heading">Products</h1>

            <a href="{{ route('add-products') }}" class="button button--primary">Add a new product</a>
        </div>

        <form method="POST" enctype="multipart/form-data">
            <div class="form-wrapper grid gap-30">
                <div class="grid g-col-2 gap-20 align-flex-end">
                    <div class="input-group">
                        <label for="categories">Category</label>
                        <select name="categories" id="categories">
                            {{-- [ LOOP THROUGH CATEGORIES FROM DATABASE ] --}}
                        </select>
                    </div>

                    <input type="submit" value="Filter" class="button button--primary justify-self-start">
                </div>
            </div>
            @csrf
        </form>

        <div class="cards-wrapper">
            <div class="grid g-col-4 gap-20">
                @if(count($products) > 0)
                    @foreach($products as $product)
                        <div class="card">
                            <a href="#">
                                <div class="card-image-wrapper"
                                     style="background: url('{{ asset('storage/images/products/' . $product->image) }}');"></div>

                                <div class="flex space-between p-10">
                                    <p>{{ $product->name }}</p>

                                    <div class="options">
                                        <a href="#"><img src="{{ asset('images/icons/edit.svg') }}"
                                                         alt="Delete [ PRODUCT NAME ]"/></a>

                                        <form action="{{ route('delete-product', $product->id) }}" method="POST">
                                            <button type="submit" class="icon icon--style">
                                                <img src="{{ asset('images/icons/bin.svg') }}"
                                                     alt="Delete {{ $product->name }}"/>
                                            </button>
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
