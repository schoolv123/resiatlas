@extends('templates.index')

{{-- title section --}}
@section('title')
    {{ 'ResiAtlas | FAQ' }}
@endsection

{{-- page name --}}
@section('pagename')
    {{ 'FAQ' }}
@endsection

{{-- content part --}}
@section('content')
    <div class="container-fluid">
        <div class="row">
            @foreach ($faqData as $item)
                <div class="row card mx-5 bg-secondary">
                    <div class="card-header">
                        {{ $item->title }}
                    </div>
                    <div class="card-body">
                        {{ $item->content }}
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
