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
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <a role="button" href="{{ url('faq/add') }}" class="btn btn-primary"> <i class="fas fa-plus"></i>
                            New </a>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body table-responsive p-0">
                        <table class="table table-bordered table-hover text-nowrap">
                            <thead>
                                <tr>
                                    <th>SL</th>
                                    <th>Title</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($faqData as $key => $item)
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td><strong> {{ $item->title }} </strong></td>
                                        <td class="text-center">
                                            <div class="d-flex">
                                                <a href="{{ url('faq/' . $item->name) }}" class="btn btn-success mx-2">
                                                    <i class="fas fa-pen"></i>
                                                </a>
                                                <button class="btn btn-danger mx-2 delete-faq" data-id="{{ $item->id }}"
                                                    data-action-url="{{ url('/faq/delete/' . $item->id) }}">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
        </div>
    </div>
@endsection
