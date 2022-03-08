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
                                <label for="#{{ $item->name }}">{{ $item->title }}</label>
                                <input type="text" class="form-control" id="{{ $item->name }}" name="{{ $item->name }}"
                                    value="{{ $item->content }}">
                            </div>
                        @elseif($item->type == 'image')
                            <div class="form-group">
                                <label for="#{{ $item->name }}">{{ $item->title }}</label>
                                @if (!empty($item->content))
                                    @php
                                        $imagePath = explode('/', $item->content);
                                        $image = end($imagePath) ?? '';
                                    @endphp
                                    <br />
                                    <span>Current Image:</span>
                                    <a class="text-primary mx-2" target="_blank" href="{{ url($item->content) }}">
                                        <img src="{{ url($item->content) }}" class="img-thumbnail"
                                            style="max-width: 200px; max-height:200px; width:100%; height:auto;" />
                                    </a>
                                @endif
                                <button type="button" class="btn btn-primary rounded mx-1"> <i
                                        class="fas fa-plus"></i></button>
                                <button type="button" class="btn btn-danger rounded mx-1 delete-image"
                                    data-id="{{ $item->id }}"
                                    data-action-url="{{ url('staticpage/' . $item->pagename . '/remove-image/' . $item->id) }}">
                                    <i class="fas fa-trash"></i>
                                </button>
                                <input type="file" class="form-control d-none" id="{{ $item->name }}"
                                    name="{{ $item->name }}" value="">
                            </div>
                        @elseif($item->type == 'para')
                            <label for="#{{ $item->name }}">{{ $item->title }}</label>
                            <textarea name="{{ $item->name }}" id="{{ $item->name }}"
                                class="form-control">{{ $item->content }}</textarea>
                        @endif
                    @endforeach
                </div>
                <!-- /.card-body -->

                <div class="card-footer text-center">
                    @if (isset($blocks) && sizeof($blocks) > 0)
                        <button type="submit" class="btn btn-success">Update</button>
                    @endif
                </div>
            </form>
        </div>
    </div>
@endsection

@section('custom-scripts')
    <script src="{{ asset('plugins/ckClassic/build/ckeditor.js') }}"></script>
    <script>
        let editorBlocks = document.getElementsByTagName('textarea');
        let customToolBar = [
            'heading',
            '|',
            'bold',
            'italic',
            'link',
            'bulletedList',
            'numberedList',
            '|',
            'indent',
            'outdent',
            'blockQuote',
            'insertTable',
            'mediaEmbed',
            '|',
            'undo',
            'redo',
            '|',
            'sourceEditing'
        ];
        if (editorBlocks) {
            console.log(editorBlocks)
            for (let i = 0; i < editorBlocks.length; i++) {
                let element = editorBlocks[i]
                ClassicEditor.create(element, {
                        toolbar: customToolBar
                    })
                    .then(editor => {
                        // console.log(editor);
                    })
                    .catch(error => {
                        console.error(error);
                    });
            }
        }
    </script>
@endsection
