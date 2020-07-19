@extends('layouts.app')

@section('content')
    <div id="categories" class="wrapper">
        <h2>Add categories</h2>

        <form enctype="multipart/form-data">
            <div class="form-wrapper grid gap-30">
                <div>
                    <div class="input-group">
                        <label for="category_name">Category name</label>
                        <input type="text" id="category_name" name="category_name"/>

                        <label class="image-selector" for="category_image">
                            <span class="large-text">Add image</span>
                            <span class="normal-text">Click here to upload an image</span>
                            <span class="border"></span>
                        </label>
                        <input type="file" accept="image/*" hidden id="category_image" name="category_image">
                        <image-selector/>
                    </div>

                    <input type="submit" value="Add category" class="button button--primary">
                </div>
            </div>
        </form>

        <article class="categories">
            <h2>Categories</h2>

            <div class="grid g-col-2 gap-20">
                @if(count($categories) > 0)
                    @foreach($categories as $category)
                        <div class="category">
                            <div class="category-image-wrapper"
                                style="background: url('{{ asset('storage/images/categories/' . $category->image) }}');"></div>

                            <div class="options">
                                <p>{{ $category->name }}</p>

                                <div>
                                    <a href="#">
                                        <img src="{{ asset('images/icons/edit.svg') }}"
                                             alt="Delete {{ $category->name }}"/>
                                    </a>

                                    <a href="#">
                                        <img src="{{ asset('images/icons/bin.svg') }}"
                                             alt="Delete {{ $category->name }}"/>
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @else
                    <p>There are no categories</p>
                @endif
            </div>
        </article>
    </div>
@endsection
