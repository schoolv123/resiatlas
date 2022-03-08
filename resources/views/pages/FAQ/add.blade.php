@extends('templates.index')


@php($page = isset($faqData) ? 'Update FAQ' : 'Add FAQ')
{{-- title section --}}
@section('title')
    {{ 'ResiAtlas | ' . $page }}
@endsection

{{-- page name --}}
@section('pagename')
    {{ $page }}
@endsection

{{-- content part --}}
@section('content')
    <div class="container-fluid">
        <div class="row card">
            <form action="" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                    <div class="form-group">
                        <label for="#title">Title</label>
                        <input type="text" class="form-control" id="title" name="title"
                            value="{{ $faqData->title ?? '' }}" />
                    </div>
                    <div class="form-group">
                        <label for="#description">Description</label>
                        <textarea class="form-control" id="description"
                            name="description">{{ $faqData->content ?? '' }}</textarea>
                    </div>
                    @if (isset($faqData))
                        <input type="hidden" name="action" value="update" />
                        <input type="hidden" name="faqId" value="{{ $faqData->id }}" />
                </div>
                {{-- /.card-body --}}
                <div class="card-footer text-center">
                    <button type="submit" class="btn btn-success">Update</button>
                </div>
            @else
                <input type="hidden" name="action" value="add" />
        </div>
        {{-- /.card-body --}}
        <div class="card-footer text-center">
            <button type="submit" class="btn btn-primary">Save</button>
        </div>
        @endif
        </form>
    </div>
    </div>
@endsection

@section('custom-scripts')
    {{-- <script src="{{ asset('plugins/ckeditor-cdn/ckeditor.js') }}"></script> --}}
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
