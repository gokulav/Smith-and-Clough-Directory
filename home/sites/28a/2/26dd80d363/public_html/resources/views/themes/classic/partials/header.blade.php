<!-- navbar -->
<nav class="navbar navbar-expand-lg fixed-top">
    <div class="container">
        <a class="navbar-brand" href="{{ route('home') }}">
            <img src="{{ getFile(config('basic.default_file_driver'),config('basic.logo_image')) }}" alt="{{config('basic.site_title')}}">
        </a>
        <button class="navbar-toggler p-0" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <i class="far fa-bars"></i>
        </button>
        @php
            $uriSegments = explode("/", parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH));
            $lastUriSegment = array_pop($uriSegments);
        @endphp
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav mx-auto">
                <li class="nav-item">
                    <a class="nav-link @if($lastUriSegment == '') active @endif" href="{{ route('home') }}">@lang('Home')</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link @if($lastUriSegment == 'about') active @endif" href="{{ route('about') }}">@lang('About')</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link @if($lastUriSegment == 'pricing') active @endif" href="{{ route('pricing') }}">@lang('Pricing')</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link @if($lastUriSegment == 'listing') active @endif" href="{{ route('listing') }}">@lang('Listing')</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link @if($lastUriSegment == 'category') active @endif" href="{{ route('category') }}">@lang('Category')</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link @if($lastUriSegment == 'contact') active @endif" href="{{ route('contact') }}">@lang('Contact')</a>
                </li>
            </ul>
        </div>

        <div class="navbar-text">
            @guest
                <a href="{{ route('login') }}" class="btn-custom">@lang('Sign in')</a>
            @endguest

            @auth
                <a href="{{ route('user.home') }}" class="btn-custom">@lang('Dashboard')</a>
            @endauth
        </div>
    </div>
</nav>
