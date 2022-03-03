@include('layouts/head')

{{-- Conntent section --}}
<section class="content">
    @yield('content')
</section>
{{-- Custom script section --}}
@yield('custom-scripts')

@include('layouts/footer')
