@include('layouts/head')
@include('layouts/header')
@include('layouts/sidebar')

{{-- Conntent section --}}
<section class="content">
    @yield('content')
</section>
{{-- Custom script section --}}
@yield('custom-scripts')

@include('layouts/footer')
