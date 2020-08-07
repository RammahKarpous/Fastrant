@extends('layouts.app')

@section('title', 'Add Categories')

@section('content')
    <div id="categories" class="wrapper">
        <h2>Update {{ $category->name }}</h2>

        <form action="{{ route('update-category', $category->slug) }}" method="POST" enctype="multipart/form-data">
            <div class="form-wrapper grid gap-30">
                <div>
                    <div class="input-group">
                        <label for="category_name">Category name</label>
                        <input type="text" id="category_name" name="category_name" value="{{ $category->name }}"/>
                        @error('category_name') <p class="error">{{ $message }}</p>@enderror
                    </div>

                    <div class="input-group">
                        <label class="image-selector" for="category_image">
                            <span id="displayImage" style="background: url('{{ asset('storage/images/categories/' . $category->image) }}')"></span>
                            <input type="hidden" name="selected_image" value="{{ $category->image }}">
                        </label>

                        <input type="file" accept="image/*" hidden id="category_image" name="category_image">
                        @error('category_image')<p class="error">{{ $message }}</p>@enderror
                    </div>

                    <input type="submit" value="Update category" class="button button--primary mt-20">

                    @csrf
                </div>
            </div>

            @method('PUT')
        </form>
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
