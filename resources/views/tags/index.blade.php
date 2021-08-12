@extends('layouts.dashboard')

@section('title')
    {{ trans('tags.title.index') }}
@endsection

@section('breadcrumbs')
    {{ Breadcrumbs::render('tags') }}
@endsection

@section('content')
    <!-- section:content -->
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-6">
                            {{-- Search --}}
                            <form action="{{ route('tags.index') }}" method="GET" autocomplete="off">
                                <div class="input-group">
                                    <input name="keyword" value="{{ request()->get('keyword') }}" type="search" class="form-control" placeholder="{{ trans('tags.form_control.input.search.placeholder') }}">
                                    <div class="input-group-append">
                                        <button class="btn btn-primary" type="submit">
                                        <i class="fas fa-search"></i>
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="col-md-6">
                            <a href="{{ route('tags.create') }}" class="btn btn-primary float-right" role="button">
                                {{ trans('tags.button.create.value') }}
                                <i class="fas fa-plus-square"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <ul class="list-group list-group-flush">
                        <!-- list tag -->
                        @if (count($tags))
                            @foreach ($tags as $item)
                                <!-- tag list -->
                                <li class="list-group-item list-group-item-action d-flex justify-content-between align-items-center pr-0">
                                    <label class="mt-auto mb-auto">
                                    <!-- todo: show tag title -->
                                    {{ $item->title }}
                                    </label>
                                    <div>
                                        <!-- edit -->
                                        <a class="btn btn-sm btn-info" role="button" href="{{ route('tags.edit', ['tag' => $item]) }}">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <!-- delete -->
                                        <form class="d-inline" action="{{ route('tags.destroy', ['tag' => $item]) }}" alert-text="{{ trans('tags.alert.delete.message.confirm', ['title' => $item->title]) }}" method="POST" role="alert">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger">
                                            <i class="fas fa-trash"></i>
                                            </button>
                                        </form>
                                    </div>
                                </li>
                                <!-- end  tag list -->
                            @endforeach
                        @else
                            <strong class="text-center text-danger">
                                @if (request()->get('keyword'))
                                    {{ trans('tags.label.no_data.search', ['keyword' => request()->get('keyword')]) }}
                                @else
                                    {{ trans('tags.label.no_data.fetch') }}
                                @endif
                            </strong>
                        @endif
                    </ul>
                </div>
                @if ($tags->hasPages())
                    <div class="card-footer">
                        {{ $tags->links('vendor.pagination.bootstrap-4') }}
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection

@push('js')
    <script>
        $(document).ready(function(){
            // Evnet:delete
            $("form[role='alert']").submit(function(event){
                event.preventDefault();
                Swal.fire({
                    title: "{{ trans('tags.alert.delete.title') }}",
                    text: $(this).attr('alert-text'),
                    icon: 'warning',
                    allowOutsideClick: false,
                    showCancelButton: true,
                    cancelButtonText: "{{ trans('tags.button.cancel.value') }}",
                    reverseButtons: true,
                    confirmButtonText: "{{ trans('tags.button.delete.value') }}",
                    }).then((result) => {
                    if (result.isConfirmed) {
                        // todo: process of deleting categories
                        event.target.submit();
                    }
                });
            });
        });
    </script>
@endpush