@include('layouts/head')
@include('layouts/header')
@include('layouts/sidebar')
<section class="content">
    @yield('content')
</section>

@yield('custom-scripts')
@include('layouts/footer')
