@extends('layouts.admin')
@section('title', getTranslation('contacts'))
@section('content')
    <!-- Content area -->
    <div class="content">
        <div class="d-inline-flex gap-2">
            <a href="{{ route('contacts.index', [], false) }}" class="btn btn-sm btn-outline-success">
                {{ getTranslation('back') }}
            </a>
        </div>
        <div class="card mt-2">
            <div class="card-body">
                <form action="{{ route('contacts.store', [], false) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <fieldset class="mb-3">
                        <legend class="text-uppercase font-size-sm font-weight-bold">{{ getTranslation('contacts') }}
                        </legend>

                        <div class="form-group row">
                            <label class="col-form-label col-lg-2">{{ getTranslation('path') }}</label>
                            <div class="col-lg-10">
                                <input type="text" class="form-control" name="path" value="{{ old('path') }}"
                                    placeholder="{{ getTranslation('path') }}">
                                @error('path')
                                    <p style="color: red;">{{ $message }}</p>
                                @enderror

                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-form-label col-lg-2">{{ getTranslation('title') }}</label>
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
                                            <input type="text" class="form-control" name="title[{{ $model->slug }}]"
                                                value="{{ old('title.' . $model->slug) }}"
                                                placeholder="{{ $model->name }}">
                                            @error('title.' . $model->slug)
                                                <p style="color: red;">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    @endforeach
                                </div>

                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-form-label col-lg-2">{{ getTranslation('photo') }}</label>
                            <div class="col-lg-10">
                                <input type="file" class="form-control" name="photo" value="{{ old('photo') }}"
                                    placeholder="{{ getTranslation('photo') }}" id="photo"
                                    onchange="previewImage(event,'imagePreview')">
                                @error('photo')
                                    <p style="color: red;">{{ $message }}</p>
                                @enderror
                                <div class="mt-2">
                                    <img id="imagePreview" src="" alt="imagePreview" class="img-thumbnail d-none"
                                        width="200">
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
