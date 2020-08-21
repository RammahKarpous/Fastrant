@extends('layouts.app')

@section('content')
    <div id="addProducts" class="wrapper">
        <h1 class="page-heading">Add products</h1>

        <form action="{{ route('upload-products') }}" method="POST" enctype="multipart/form-data">
            <div class="form-wrapper grid gap-30">
                <div>
                    <div class="input-group">
                        <label for="name">Product name</label>
                        <input type="text" name="name" id="name"/>
                    </div>

                    <div class="grid g-col-3 gap-20">
                        <div class="input-group">
                            <label for="price">Product price</label>
                            <input type="text" name="price" class="pl-20" id="price">
                            <p class="currency">£</p>
                        </div>

                        <div class="input-group">
                            <label for="spice">Spice rating</label>
                            <select name="spice" id="spice">
                                <option value="select" disabled selected>Please select a spice level</option>

                                @foreach($spiceRatings as $rating)
                                    <option value="{{ $rating->id }}">{{ $rating->spice }}</option>
                                @endforeach
                            </select>
                        </div>

                        {{-- Loop through categories --}}
                        <div class="input-group">
                            <label for="category">Category</label>
                            <select name="category" id="category">
                                @if(count($categories) > 0)
                                    <option value="select" disabled selected>Please select a category</option>

                                    @foreach($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                @endif
                            </select>
                        </div>

                    </div>

                    <div class="input-group">
                        <label for="description">Description</label>
                        <textarea name="description" id="description"></textarea>
                    </div>

                    <div class="input-group mt-20">
                        <label>Allergies</label>
                    </div>

                    <x-allergies/>

                    <div class="flex space-between buttons">
                        <a href="{{ url()->previous() }}" class="button button--error">Cancel</a>

                        <div>
                            <button type="button" id="clearForm" class="button button--danger">Clear</button>
                            <button type="submit" class="button button--primary ml-20">Add product</button>
                        </div>
                    </div>
                </div>

                <div>
                    <div class="input-group">
                        <label class="image-selector" for="image">
                            <span class="large-text">Add image</span>
                            <span class="normal-text">Click here to upload an image</span>
                            <span class="border"></span>

                            <span id="displayImage"></span>
                        </label>
                        <input type="file" accept="image/*" hidden id="image" name="image">
                        @error('image')<p class="error">{{ $message }}</p>@enderror
                    </div>
                </div>
            </div>

            @csrf
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

        $("#image").change(function () {
            readURL(this);
        });

        let clear = document.querySelector('#clearForm');

        clear.addEventListener('click', function () {
            console.log('cleared!');
        });
    </script>
@endsection
