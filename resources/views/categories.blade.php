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
                        {{--                    <img v-if="url" :src="url">--}}
                        {{--                    <label for="file">Upload file</label>--}}
                        {{--                    <input type="file" accept="image/*" ref="file" @change="selectAndDisplayFile">--}}

                        <p class="message--error">Error</p>
                    </div>

                    <button>Add category</button>
                </div>
            </div>
        </form>

        <article class="mt-50 categories">
            <h2>Categories</h2>

            <div class="grid g-col-2 gap-20">
                <div class="category">
                    <button type="submit" class="delete-category">
                        <img src="../assets/icons/bin.svg" alt=""/>
                    </button>
                </div>
            </div>
        </article>
    </div>
@endsection
