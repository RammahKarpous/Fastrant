@extends('layouts.app')

@section('content')
<div class="wrapper">
    <h2 class="page-heading">Menus</h2>
    
    <form action="{{ route('add-categories') }}" method="POST" enctype="multipart/form-data">
            <div class="form-wrapper grid gap-30">
                <div>
                    <div class="input-group">
                        <label for="menu_name">Menu name</label>
                        <input type="text" id="menu_name" name="menu_name"/>
                        @error('menu_name') <p class="error">{{ $message }}</p>@enderror
                    </div>

                    <div class="input-group">
                        <label class="image-selector" for="menu_image">
                            <span class="large-text">Add image</span>
                            <span class="normal-text">Click here to upload an image</span>
                            <span class="border"></span>

                            <span id="displayImage"></span>
                        </label>
                        <input type="file" accept="image/*" hidden id="menu_image" name="menu_image">
                        @error('menu_image')<p class="error">{{ $message }}</p>@enderror
                    </div>

                    <input type="submit" value="Add menu" class="button button--primary mt-20">

                    @csrf
                </div>
            </div>
        </form>
</div>
@endsection