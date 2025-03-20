@extends('layouts.admin')
@section('title', getTranslation('language'))
@section('content')
    <!-- Content area -->
    <div class="content">
        <div class="d-inline-flex gap-2">
            <a href="{{ route('languages.index', [], false) }}" class="btn btn-sm btn-outline-success">
                {{ getTranslation('back') }}
            </a>
        </div>
        <div class="card mt-2">

            <div class="card-body">

                <form action="{{ route('languages.update', $model->id, false) }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <fieldset class="mb-3">
                        <legend class="text-uppercase font-size-sm font-weight-bold">{{ getTranslation('language') }}
                        </legend>

                        <div class="col-lg-12">
                            <label class="col-form-label col-lg-2">{{ getTranslation('name') }}</label>
                            <input type="text" class="form-control" name="name" value="{{ $model->name }}"
                                placeholder="{{ getTranslation('name') }}">
                            @error('name')
                                <p style="color: red;">{{ $message }}</p>
                            @enderror
                            <div class="header-elements mt-3">
                                <label class="custom-control custom-switch custom-control-right">
                                    <input type="hidden" name="is_active" value="0">
                                    <input type="checkbox" name="is_active" class="custom-control-input" value="1"
                                        {{ $model->is_active ? 'checked' : '' }}>
                                    <span class="custom-control-label">{{ getTranslation('status') }}</span>
                                </label>
                            </div>
                        </div>
                    </fieldset>
                    <div class="text-right">
                        <button type="submit" class="btn btn-primary">{{ getTranslation('change') }}</button>
                    </div>
                </form>
            </div>
        </div>

    </div>
    <!-- /content area -->
@endsection
