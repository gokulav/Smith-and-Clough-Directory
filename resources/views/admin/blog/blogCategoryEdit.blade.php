@extends('admin.layouts.app')

@section('title')
    @lang('Edit Blog Category')
@endsection

@section('content')
    <div class="card card-primary m-0 m-md-4 my-4 m-md-0 shadow">
        <div class="card-body">
            <div class="media mb-4 justify-content-end">
                <a href="{{route('admin.blogCategory')}}" class="btn btn-sm  btn-primary mr-2">
                    <span><i class="fas fa-arrow-left"></i> @lang('Back')</span>
                </a>
            </div>

            <ul class="nav nav-tabs" id="myTab" role="tablist">
                @foreach($languages as $key => $language)
                    <li class="nav-item">
                        <a class="nav-link {{ $loop->first ? 'active' : '' }}" data-toggle="tab" href="#lang-tab-{{ $key }}" role="tab" aria-controls="lang-tab-{{ $key }}"
                           aria-selected="{{ $loop->first ? 'true' : 'false' }}">@lang($language->name)</a>
                    </li>
                @endforeach
            </ul>

            <div class="tab-content mt-2" id="myTabContent">
                @foreach($languages as $key => $language)

                    <div class="tab-pane fade {{ $loop->first ? 'show active' : '' }}" id="lang-tab-{{ $key }}" role="tabpanel">
                        <form method="post" action="{{ route('admin.blogCategoryUpdate',[$id, $language->id]) }}" class="mt-4" enctype="multipart/form-data">
                            @csrf
                            @method('put')
                            <div class="row">
                                <div class="col-sm-12 col-md-6 col-lg-6 mb-3">
                                    <label for="name"> @lang('Category Name') </label>
                                    <input type="text" name="name[{{ $language->id }}]"
                                            class="form-control  @error('name'.'.'.$language->id) is-invalid @enderror"
                                            value="<?php echo old('name'.$language->id, isset($blogCategoryDetails[$language->id]) ? $blogCategoryDetails[$language->id][0]->name : '') ?>">
                                    <div class="invalid-feedback">
                                        @error('name'.'.'.$language->id) @lang($message) @enderror
                                    </div>
                                    <div class="valid-feedback"></div>
                                </div>

                                @if($loop->index == 0)
                                    <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                                        <div class="form-group ">
                                            <label>@lang('Status')</label>
                                            <div class="custom-switch-btn">
                                                <input type='hidden' value='1' name='status'>
                                                <input type="checkbox" name="status" class="custom-switch-checkbox" id="status"
                                                       value="0" <?php if( $blogCategoryDetails[$language->id][0]->category->status == 0):echo 'checked'; endif ?>>
                                                <label class="custom-switch-checkbox-label" for="status">
                                                    <span class="custom-switch-checkbox-inner"></span>
                                                    <span class="custom-switch-checkbox-switch"></span>
                                                </label>
                                            </div>

                                        </div>
                                    </div>
                                @endif

                            </div>

                            <button type="submit" class="btn waves-effect waves-light btn-rounded btn-primary btn-block mt-3">@lang('Save')</button>
                        </form>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection

@push('style-lib')
    <link rel="stylesheet" href="{{ asset('assets/admin/css/summernote.min.css')}}">
@endpush
@push('js-lib')
    <script src="{{ asset('assets/admin/js/summernote.min.js')}}"></script>
@endpush
