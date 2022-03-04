@extends('templates.index')

{{-- title section --}}
@section('title')
    {{ 'ResiAtlas | StaticPages' }}
@endsection

{{-- page name --}}
@section('pagename')
    {{ 'Static Pages' }}
@endsection

{{-- content part --}}
@section('content')
    <div class="container-fluid">
        <div class="row card">
            <form action="" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                    @foreach ($blocks as $item)
                        @if ($item->type == 'heading')
                            <div class="form-group">
                                <label for="{{ $item->name }}">{{ $item->title }}</label>
                                <input type="text" class="form-control" id="{{ $item->name }}" name="{{ $item->name }}"
                                    value="{{ $item->content }}">
                            </div>
                        @elseif($item->type == 'image')
                            <div class="form-group">
                                <label for="{{ $item->name }}">{{ $item->title }}</label>
                                <input type="file" class="form-control" id="{{ $item->name }}"
                                    name="{{ $item->name }}" value="">
                            </div>
                        @elseif($item->type == 'para')
                            <label for="{{ $item->name }}">{{ $item->title }}</label>
                            <textarea name="{{ $item->name }}" id="{{ $item->name }}"
                                class="form-control">{{ $item->content }}</textarea>
                        @endif
                    @endforeach
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </form>
        </div>
    </div>
@endsection
