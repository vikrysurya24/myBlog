@extends('layouts.dashboard')

@section('title')
    {{ trans('categories.title.create') }}
@endsection

@section('breadcrumbs')
    {{ Breadcrumbs::render('add-category') }}
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <form action="" method="POST">
                    <div class="row">
                        <div class="col-md-6">
                            <!-- title -->
                            <div class="form-group">
                                <label for="input_category_title" class="font-weight-bold">
                                    {{ trans('categories.form_control.input.title.label') }}
                                </label>
                                <input id="input_category_title" value="" name="title" type="text" class="form-control" placeholder="{{ trans('categories.form_control.input.title.placeholder') }}"/>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <!-- slug -->
                            <div class="form-group">
                                <label for="input_category_slug" class="font-weight-bold">
                                    {{ trans('categories.form_control.input.slug.label') }}
                                </label>
                                <input id="input_category_slug" value="" name="slug" type="text" class="form-control" placeholder="{{ trans('categories.form_control.input.slug.placeholder') }}" readonly />
                            </div>
                        </div>
                        <div class="col-md-6">
                            <!-- parent_category -->
                            <div class="form-group">
                                <label for="select_category_parent" class="font-weight-bold">{{ trans('categories.form_control.select.parent_category.label') }}</label>
                                <select id="select_category_parent" name="parent_category" data-placeholder="{{ trans('categories.form_control.select.parent_category.placeholder') }}" class="custom-select">
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <!-- thumbnail -->
                            <div class="form-group">
                                <label for="input_category_thumbnail" class="font-weight-bold">
                                    {{ trans('categories.form_control.input.thumbnail.label') }}
                                </label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <button id="button_category_thumbnail" data-input="input_category_thumbnail" class="btn btn-primary" type="button">
                                            {{ trans('categories.button.browse.value') }}
                                        </button>
                                    </div>
                                    <input id="input_category_thumbnail" name="thumbnail" value="" type="text" class="form-control" placeholder="{{ trans('categories.form_control.input.thumbnail.placeholder') }}"
                                        readonly />
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <!-- description -->
                            <div class="form-group">
                                <label for="input_category_description" class="font-weight-bold">
                                    {{ trans('categories.form_control.textarea.description.label') }}
                                </label>
                                <textarea id="input_category_description" name="description" class="form-control" rows="7" placeholder="{{ trans('categories.form_control.textarea.description.placeholder') }}"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="float-right">
                        <a class="btn btn-secondary px-4" href="{{ route('categories.index') }}">{{ trans('categories.button.back.value') }}</a>
                        <button type="submit" class="btn btn-primary px-4">{{ trans('categories.button.save.value') }}</button>
                    </div>                
                </form>
            </div>
        </div>
        </div>
    </div>
@endsection