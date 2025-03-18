@extends('layouts.admin')
@section('title', getTranslation('media'))
@section('content')
    <!-- Content area -->
    <div class="content">
        <div class="d-inline-flex gap-2">
            <a href="{{ route('media.index', [], false) }}" class="btn btn-sm btn-outline-success">
                {{ getTranslation('back') }}
            </a>
        </div>
        <div class="card mt-2">
            <div class="card-body">
                <form action="{{ route('media.update', $media->id, false) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <fieldset class="mb-3">
                        <legend class="text-uppercase font-size-sm font-weight-bold">{{ getTranslation('media') }}
                        </legend>
                        <div class="form-group row">
                            <label class="col-form-label col-lg-2">{{ getTranslation('name') }}</label>
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
                                                value="{{ $media->name[$model->slug] ?? $media->name['default'] }}"
                                                placeholder="{{ $model->name }}">
                                            @error($model->slug)
                                                <p style="color: red;">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <label class="col-form-label col-lg-2">{{ getTranslation('title') }}</label>
                            <div class="card-body">
                                <ul class="nav nav-tabs">
                                    @foreach (getLanguage() as $model)
                                        <li class="nav-item">
                                            <a href="#basic-tab12{{ $model->id }}"
                                                class="nav-link {{ $loop->first ? 'active' : '' }}"
                                                data-toggle="tab">{{ $model->name }}
                                            </a>
                                        </li>
                                    @endforeach
                                </ul>
                                <div class="tab-content">
                                    @foreach (getLanguage() as $model)
                                        <div class="tab-pane fade {{ $loop->first ? 'show active' : '' }}"
                                            id="basic-tab12{{ $model->id }}">
                                            <input type="text" class="form-control" name="title[{{ $model->slug }}]"
                                                value="{{ $media->title[$model->slug] ?? $media->title['default'] }}"
                                                placeholder="{{ $model->name }}">
                                            @error($model->slug)
                                                <p style="color: red;">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <label class="col-form-label col-lg-2">{{ getTranslation('description') }}</label>
                            <div class="card-body">
                                <ul class="nav nav-tabs">
                                    @foreach (getLanguage() as $model)
                                        <li class="nav-item">
                                            <a href="#basic-tab123{{ $model->id }}"
                                                class="nav-link {{ $loop->first ? 'active' : '' }}"
                                                data-toggle="tab">{{ $model->name }}
                                            </a>
                                        </li>
                                    @endforeach
                                </ul>
                                <div class="tab-content">
                                    @foreach (getLanguage() as $model)
                                        <div class="tab-pane fade {{ $loop->first ? 'show active' : '' }}"
                                            id="basic-tab123{{ $model->id }}">
                                            <input type="text" class="form-control" name="description[{{ $model->slug }}]"
                                                value="{{ $media->description[$model->slug] ?? $media->description['default'] }}"
                                                placeholder="{{ $model->name }}">
                                            @error($model->slug)
                                                <p style="color: red;">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <label class="col-form-label col-lg-2">{{ getTranslation('text') }}</label>
                            <div class="card-body">
                                <ul class="nav nav-tabs">
                                    @foreach (getLanguage() as $model)
                                        <li class="nav-item">
                                            <a href="#basic-tab1234{{ $model->id }}"
                                                class="nav-link {{ $loop->first ? 'active' : '' }}"
                                                data-toggle="tab">{{ $model->name }}
                                            </a>
                                        </li>
                                    @endforeach
                                </ul>
                                <div class="tab-content">
                                    @foreach (getLanguage() as $model)
                                        <div class="tab-pane fade {{ $loop->first ? 'show active' : '' }}"
                                            id="basic-tab1234{{ $model->id }}">
                                            <input type="text" class="form-control" name="text[{{ $model->slug }}]"
                                                value="{{ $media->text[$model->slug] ?? $media->text['default'] }}"
                                                placeholder="{{ $model->name }}">
                                            @error($model->slug)
                                                <p style="color: red;">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-form-label col-lg-2">{{ getTranslation('photo') }} 1</label>
                            <div class="col-lg-10">
                                <input type="file" class="form-control" name="photo_1" value="{{ old('photo') }}"
                                    placeholder="{{ getTranslation('photo') }}">
                                @error('photo_1')
                                    <p style="color: red;">{{ $message }}</p>
                                @enderror
                                <img src="{{ asset($media->photo_1) }}" width="100px" class="mt-1" alt="">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-form-label col-lg-2">{{ getTranslation('photo') }} 2</label>
                            <div class="col-lg-10">
                                <input type="file" class="form-control" name="photo_2" value="{{ old('photo') }}"
                                    placeholder="{{ getTranslation('photo') }}">
                                @error('photo_2')
                                    <p style="color: red;">{{ $message }}</p>
                                @enderror
                                <img src="{{ asset($media->photo_2) }}" width="100px" class="mt-1" alt="">
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
