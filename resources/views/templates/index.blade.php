@include('layouts/head')
@include('layouts/header')
@include('layouts/sidebar')

{{-- Conntent section --}}
<div class="content-wrapper" style="min-height: 1345.6px;">
    {{-- Content Header (Page header) --}}
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1> @yield('pagename')</h1>
                </div>
            </div>
        </div>{{-- /.container-fluid --}}
    </section>

    {{-- Main content --}}
    <section class="content">
        @yield('content')
    </section>
    {{-- /.content --}}
</div>
{{-- Custom script section --}}
@yield('custom-scripts')

@include('layouts/footer')
