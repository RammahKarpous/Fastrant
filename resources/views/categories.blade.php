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
{{--                        <image-selector/>--}}
                    </div>

                    <input type="submit" value="Add category" class="button button--primary">
                </div>
            </div>
        </form>

        <article class="categories">
            <h2>Categories</h2>

            <div class="grid g-col-2 gap-20">

                <div class="category">
{{--                    <div style="background: url([ DISPLAY CATEGORY IMAGE HERE ]);"></div>--}}

                    <div class="options">
                        <p>Bananas</p>

                        <div>
                            <a href="#"><img src="{{ asset('images/icons/edit.svg') }}" alt="Delete [CATEGORY NAME]"/></a>
                            <a href="#"><img src="{{ asset('images/icons/bin.svg') }}" alt="Delete [CATEGORY NAME]"/></a>
                        </div>
                    </div>
                </div>
            </div>
        </article>
    </div>
@endsection
