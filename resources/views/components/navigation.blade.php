<nav id="nav">
    <div class="logo-wrapper text-align-center">
        <img src="{{ asset('images/logo.svg') }}" alt="Fastrant logo">
    </div>

    <ul>
        <li><a class="{{ Route::is('/') ? 'current-page' : '' }}"
               href="{{ route('welcome') }}">Home</a></li>

        <li><a class="{{ Request::is('/products') ? 'current-page' : '' }}"
               href="{{ route('products') }}">Products</a></li>

        <li><a class="{{ Request::is('/categories') ? 'current-page' : '' }}"
               href="{{ route('categories') }}">Categories</a></li>
    </ul>
</nav>
