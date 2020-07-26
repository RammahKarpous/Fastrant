@extends('layouts.app')

@section('content')
    <div id="addProducts" class="wrapper">
        <h1 class="page-heading">Add products</h1>

        <form>
            <div class="form-wrapper grid gap-30">
                <div>
                    <div class="input-group">
                        <label for="product-name">Product name</label>
                        <input type="text" name="product-name" id="product-name"/>
                    </div>

                    <div class="grid g-col-2 gap-20">
                        <div class="input-group">
                            <label for="product-price">Product price</label>
                            <input type="text" name="product-price" id="product-price">
                            <p class="currency">£</p>
                        </div>

                        {{-- Loop through categories --}}
                        <div class="input-group">
                            <label for="category">Category</label>
                            <select name="category" id="category">
                                @if(count($categories) > 0)
                                    <option value="select" disabled selected>Please select a category</option>

                                    @foreach($categories as $category)
                                        <option value="{{ $category->name }}">{{ $category->name }}</option>
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
                        @error('category_image')<p class="error">{{ $message }}</p>@enderror
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

        $("#category_image").change(function () {
            readURL(this);
        });

        let clear = document.querySelector('#clearForm');

        clear.addEventListener('click', function () {
            console.log('cleared!');
        });
    </script>
@endsection
