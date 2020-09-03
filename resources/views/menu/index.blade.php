@extends('layouts.app')

@section('title', 'Menus')

@section('content')
    <div class="wrapper">
        <h2 class="page-heading">Menus</h2>

        <form action="{{ route('add-categories') }}" method="POST" enctype="multipart/form-data">
            <div class="form-wrapper grid gap-30">
                <div>
                    <div class="input-group">
                        <label class="image-selector" for="image">
                            <span class="large-text">Add image</span>
                            <span class="normal-text">Click here to upload an image</span>
                            <span class="border"></span>

                            <span id="displayImage"></span>
                        </label>
                        <input type="file" accept="image/*" hidden id="image" name="menu_image">
                        @error('menu_image')<p class="error">{{ $message }}</p>@enderror
                    </div>

                    <div class="input-group mt-20">
                        <label for="menu_name">Menu name</label>
                        <input type="text" id="menu_name" name="menu_name"/>
                        @error('menu_name') <p class="error">{{ $message }}</p>@enderror
                    </div>

                    <input type="submit" value="Add menu" class="button button--primary mt-20">

                    @csrf
                </div>
            </div>
        </form>

        <article class="cards-wrapper">
            <h2>Categories</h2>

            <div class="grid g-col-4 gap-20">
                @if(count($menus) > 0)
                    @foreach($menus as $menu)
                        <div class="card">
                            <div class="card-image-wrapper"
                                 style="background: url('{{ asset('storage/images/categories/' . $menu->image) }}');"></div>

                            <div class="options p-10">
                                <p>{{ $menu->name }}</p>

                                <div class="flex space-between align-items-center">
                                    <a href="{{ route('show-update-categories', $menu->slug) }}" class="icon icon--style mr-10">
                                        <img src="{{ asset('images/icons/edit.svg') }}"
                                             alt="Delete {{ $menu->name }}"/></a>

                                    <form action="{{ route('delete-category', $menu->id) }}" method="POST">
                                        <button type="submit" class="icon">
                                            <img src="{{ asset('images/icons/bin.svg') }}"
                                                 alt="Delete {{ $menu->name }}"/>
                                        </button>
                                        <input type="hidden" name="delete-image" value="{{ $menu->image }}">
                                        @csrf
                                        @method('DELETE')
                                    </form>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @else
                    <p>There are no menus</p>
                @endif
            </div>
        </article>
    </div>
@endsection
@section('scripts')
<script src="{{asset('js/imageSelector.js')}}"></script>
@endsection
