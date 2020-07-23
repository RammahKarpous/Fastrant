@extends('layouts.app')

@section('content')
    <div id="products" class="wrapper">
        <div class="flex space-between align-center">
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
                <div class="card">
                    <a href="#">
                        <div class="card-image-wrapper"
                             style="background: url('{{ asset('storage/images/products/burger.png') }}');"></div>

                        <div class="flex space-between p-10">
                            <p>First ever burger</p>

                            <div class="options">
                                <a href="#"><img src="{{ asset('images/icons/edit.svg') }}"
                                                 alt="Delete [ PRODUCT NAME ]"/></a>

                                <a class="ml-10" href="#"><img src="{{ asset('images/icons/bin.svg') }}"
                                                 alt="Delete [ PRODUCT NAME ]"/></a>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>

@endsection
