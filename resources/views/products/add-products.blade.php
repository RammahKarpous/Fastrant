@extends('layouts.app')

@section('content')
    <div id="addProducts" class="wrapper">
        <h2>Add products</h2>

        <form>
            <div class="form-wrapper grid gap-30">
                <div>
                    <div class="input-group">
                        <label for="product-name">Product name</label>
                        <input type="text" name="product-name" id="product-name" />
                    </div>

                    <div class="grid g-col-2 gap-20">
                        <div class="input-group">
                            <label for="product-price">Product price</label>
                            <input type="text" name="product-price" id="product-price" value="(Math.round(price * 100) / 100).toFixed(2)">
                            <p class="currency">£</p>
                        </div>

                    {{-- Loop through categories --}}
                    </div>

                    <div class="input-group">
                        <label for="description">Description</label>
                        <textarea name="description" id="description"></textarea>
                    </div>

                    <div class="input-group mt-20">
                        <label>Allergies</label>

                    {{-- Loop through all allergies --}}

                    </div>

                    <div class="flex space-between buttons">
                        <button type="button" class="button button--error">Cancel</button>

                        <div>
                            <button type="button" class="button button--danger">Clear</button>
                            <button type="button" class="button button--primary ml-20">Add product</button>
                        </div>
                    </div>
                </div>

                <div>
                    <div class="view-product-image"></div>

                {{-- Import the image selector code from Nurul after pulling from githum --}}
                </div>
            </div>
        </form>
    </div>
@endsection
