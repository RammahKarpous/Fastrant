@extends('layouts.app')

@section('content')
    <div id="addProducts" class="wrapper">
        <h1 class="page-heading">Update products</h1>

        <form action="{{ route('store-updated-product') }}" method="POST" enctype="multipart/form-data">
            <div class="form-wrapper grid gap-30">
                <div>
                    <div class="input-group">
                        <label for="name">Product name</label>
                        <input type="text" name="name" id="name" value="{{ $product->name }}"/>
                    </div>

                    <div class="grid g-col-3 gap-20">
                        <div class="input-group">
                            <label for="price">Product price</label>
                            <input type="text" name="price" class="pl-20" id="price" value="{{ $product->price }}">
                            <p class="currency">£</p>
                        </div>

                        <x-spice-rating>

                        </x-spice-rating>

                        {{ '0' == $product->rating ? 'No spicy' : '' }}
                        {{ '1' == $product->rating ? 'Mild' : '' }}
                        {{ '2' == $product->rating ? 'Hot' : '' }}
                        {{ '3' == $product->rating ? 'Extreme' : '' }}

                        {{-- Loop through categories --}}
                        <div class="input-group">
                            <label for="category">Category</label>
                            <select name="category" id="category">
                                @if(count($categories) > 0)
                                    <option value="select" disabled>Please select a category</option>

                                    @foreach($categories as $category)
                                        <option value="{{ $category->id }}" {{ $category->id == $product->category_id ? 'selected' : '' }}>{{ $category->name }}</option>
                                    @endforeach
                                @endif
                            </select>
                        </div>

                    </div>

                    <div class="input-group">
                        <label for="description">Description</label>
                        <textarea name="description" id="description">{{ $product->description }}</textarea>
                    </div>

                    <div class="input-group mt-20">
                        <label>Allergies</label>
                    </div>

{{--                    <x-allergies>--}}
{{--                        @foreach($product->allergies as $allergy)--}}
{{--                            {{ $allergy }}--}}
{{--                        @endforeach--}}
{{--                    </x-allergies>--}}

                    <div class="checkbox">
                        @foreach($allergies as $allergy)
                            <div class="checkbox__wrapper">
                                <input type="checkbox" class="checkbox__input" {{ $allergy['allergy'] ? 'checked' : '' }} name="allergies[]" value="{{ $allergy['allergy'] }}"
                                       id="{{ $allergy['name'] }}" hidden>

                                <label for="{{ $allergy['name'] }}" class="checkbox__checkbox-element">
                                    <span class="checkbox__box"></span>
                                    {{ $allergy['allergy'] }}
                                </label>
                            </div>
                        @endforeach
                    </div>

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
                        <label class="image-selector" for="category_image">
                            <span id="displayImage" style="background: url('{{ asset('storage/images/products/' . $product->image) }}')"></span>
                            <input type="hidden" name="selected_image" value="{{ $category->image }}">
                        </label>

                        <input type="file" accept="image/*" hidden id="category_image" name="category_image">
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

        $("#image").change(function () {
            readURL(this);
        });

        let clear = document.querySelector('#clearForm');

        clear.addEventListener('click', function () {
            console.log('cleared!');
        });
    </script>
@endsection
