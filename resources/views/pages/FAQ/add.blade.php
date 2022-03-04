@extends('templates.index')

{{-- title section --}}
@section('title')
    {{ 'ResiAtlas | AddFAQ' }}
@endsection

{{-- page name --}}
@section('pagename')
    {{ 'AddFAQ' }}
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
                    @if (!empty($faqData))
                        <input type="hidden" name="action" value="update" />
                        <input type="hidden" name="faqId" value="{{ $faqData->id }}" />
                    @else
                        <input type="hidden" name="action" value="add" />
                    @endif
                </div>
                {{-- /.card-body --}}
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </form>
        </div>
    </div>
@endsection

@section('custom-scripts')
    <script src="{{ asset('plugins/ckeditor-cdn/ckeditor.js') }}"></script>
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
            '|', 'undo', 'redo',
            'sourceEditing'
        ];
        if (editorBlocks) {
            console.log(editorBlocks)
            for (let i = 0; i < editorBlocks.length; i++) {
                let element = editorBlocks[i]
                ClassicEditor.create(element, {
                        extraPlugins: ['sourceEditing'],
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
