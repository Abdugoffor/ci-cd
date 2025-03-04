@extends('layouts.admin')
@section('title', getTranslation('translations'))
@section('content')
    <!-- Content area -->
    <div class="content">
        <div class="card">

            <div class="card-body">

                <form action="{{ route('translations.store', [], false) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <fieldset class="mb-3">
                        <legend class="text-uppercase font-size-sm font-weight-bold">{{ getTranslation('translations') }}</legend>

                        <div class="form-group row">
                            <label class="col-form-label col-lg-2">{{ getTranslation('standard') }}</label>
                            <div class="col-lg-10">
                                <input type="text" class="form-control" name="default" value="{{ old('default') }}"
                                    placeholder="{{ getTranslation('standard') }}">
                                @error('default')
                                    <p style="color: red;">{{ $message }}</p>
                                @enderror
                                <div class="card-body">
                                    <ul class="nav nav-tabs">
                                        @foreach (getLanguage() as $model)
                                            <li class="nav-item">
                                                <a href="#basic-tab1{{ $model->id }}"
                                                    class="nav-link {{ $loop->first ? 'active' : '' }}"
                                                    data-toggle="tab">{{ $model->name }}
                                                </a>
                                            </li>
                                        @endforeach
                                    </ul>
                                    <div class="tab-content">
                                        @foreach (getLanguage() as $model)
                                            <div class="tab-pane fade {{ $loop->first ? 'show active' : '' }}"
                                                id="basic-tab1{{ $model->id }}">
                                                <input type="text" class="form-control" name="name[{{ $model->slug }}]"
                                                    value="{{ old($model->slug) }}" placeholder="{{ $model->name }}">
                                                @error('name.'.$model->slug)
                                                    <p style="color: red;">{{ $message }}</p>
                                                @enderror
                                            </div>
                                        @endforeach
                                    </div>

                                </div>

                            </div>
                        </div>

                    </fieldset>
                    <div class="text-right">
                        <button type="submit" class="btn btn-primary">{{ getTranslation('add') }}</button>
                    </div>
                </form>
            </div>
        </div>

    </div>
    <!-- /content area -->
@endsection
