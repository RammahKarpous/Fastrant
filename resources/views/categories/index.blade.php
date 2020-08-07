@extends('layouts.app')

@section('title', 'Add Categories')

@section('content')
    <div id="categories" class="wrapper">
        <h2>Add categories</h2>

        <form action="{{ route('add-categories') }}" method="POST" enctype="multipart/form-data">
            <div class="form-wrapper grid gap-30">
                <div>
                    <div class="input-group">
                        <label for="category_name">Category name</label>
                        <input type="text" id="category_name" name="category_name"/>
                        @error('category_name') <p class="error">{{ $message }}</p>@enderror
                    </div>

                    <div class="input-group">
                        <label class="image-selector" for="category_image">
                            <span class="large-text">Add image</span>
                            <span class="normal-text">Click here to upload an image</span>
                            <span class="border"></span>

                            <span id="displayImage"></span>
                        </label>
                        <input type="file" accept="image/*" hidden id="category_image" name="category_image">
                        @error('category_image')<p class="error">{{ $message }}</p>@enderror
                    </div>

                    <input type="submit" value="Add category" class="button button--primary mt-20">

                    @csrf
                </div>
            </div>
        </form>

        <article class="cards-wrapper">
            <h2>Categories</h2>

            <div class="grid g-col-4 gap-20">
                @if(count($categories) > 0)
                    @foreach($categories as $category)
                        <div class="card">
                            <div class="card-image-wrapper"
                                 style="background: url('{{ asset('storage/images/categories/' . $category->image) }}');"></div>

                            <div class="options p-10">
                                <p>{{ $category->name }}</p>

                                <div class="flex space-between align-items-center">
                                    <a href="{{ route('show-update-categories', $category->slug) }}" class="icon icon--style mr-10">
                                        <img src="{{ asset('images/icons/edit.svg') }}"
                                             alt="Delete {{ $category->name }}"/></a>

                                    <form action="{{ route('delete-category', $category->id) }}" method="POST">
                                        <button type="submit" class="icon">
                                            <img src="{{ asset('images/icons/bin.svg') }}"
                                                 alt="Delete {{ $category->name }}"/>
                                        </button>
                                        @csrf
                                        @method('DELETE')
                                    </form>
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

@section('scripts')
    <script>

        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#displayImage').css('background', 'url(' + e.target.result + ')');
                }

                reader.readAsDataURL(input.files[0]); // convert to base64 string
            }
        }

        $("#category_image").change(function () {
            readURL(this);
        });

    </script>
@endsection
