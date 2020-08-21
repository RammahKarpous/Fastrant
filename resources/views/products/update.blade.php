@extends('layouts.app')

@section('content')
    <div id="addProducts" class="wrapper">
        <h1 class="page-heading">Update products</h1>

        <form action="{{ route('updated-product', $product->slug)}}" method="POST" enctype="multipart/form-data">
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

                        <div class="input-group">
                            <label for="spice">Spice rating</label>
                            <select name="spice" id="spice">
                                <option value="select" disabled selected>Please select a spice level</option>

                                @foreach($spiceRatings as $rating)
                                    <option value="{{ $rating->id }}" {{ $rating->id == $product->spice_id ? 'selected' : '' }}>{{ $rating->spice }}</option>
                                @endforeach
                            </select>
                        </div>

                        {{-- Loop through categories --}}
                        <div class="input-group">
                            <label for="category">Category</label>
                            <select name="category" id="category">
                                @if(count($categories) > 0)
                                    <option value="select" disabled>Please select a category</option>

                                    @foreach($categories as $category)
                                        <option
                                            value="{{ $category->id }}" {{ $category->id == $product->category_id ? 'selected' : '' }}>{{ $category->name }}</option>
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
                                @foreach($product->allergies as $db_allergy)
                                    <input type="checkbox" class="checkbox__input"
                                           {{ $allergy->allergy == $db_allergy ? 'checked' : '' }} name="allergies[]"
                                           value="{{ $allergy->allergy }}"
                                           id="{{ $allergy->slug }}" hidden>
                                @endforeach

                                <label for="{{ $allergy->slug }}" class="checkbox__checkbox-element">
                                    <span class="checkbox__box"></span>
                                    {{ $allergy->allergy }}
                                </label>
                            </div>
                        @endforeach
                    </div>

                    <div class="flex space-between buttons">
                        <a href="{{ url()->previous() }}" class="button button--error">Cancel</a>

                        <div>
                            <button type="button" id="clearForm" class="button button--danger">Clear</button>
                            <button type="submit" class="button button--primary ml-20">Update product</button>
                        </div>
                    </div>
                </div>

                <div>
                    <div class="input-group">
                        <label class="image-selector" for="image">
                            <span id="displayImage"
                                  style="background: url('{{ asset('storage/images/products/' . $product->image) }}')"></span>
                            <input type="hidden" name="selected_image" value="{{ $product->image }}">
                        </label>

                        <input type="file" accept="image/*" hidden id="image" name="product_image">
                        @error('product_image')<p class="error">{{ $message }}</p>@enderror
                    </div>
                </div>
            </div>
            <input type="hidden" name="delete-image" value="{{ $product->image }}">
            @method('PUT')
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
