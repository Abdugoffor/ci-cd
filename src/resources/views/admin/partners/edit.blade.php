@extends('layouts.admin')
@section('title', getTranslation('partners'))
@section('content')
    <!-- Content area -->
    <div class="content">
        <div class="card">

            <div class="card-body">

                <form action="{{ route('partners.update', $partner->id, false) }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <fieldset class="mb-3">
                        <legend class="text-uppercase font-size-sm font-weight-bold">{{ getTranslation('partners') }}
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
                                                value="{{ $partner->name[$model->slug] ?? $partner->name['default'] }}"
                                                placeholder="{{ $model->name }}">
                                            @error('name.' . $model->slug)
                                                <p style="color: red;">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    @endforeach
                                </div>

                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-form-label col-lg-2">{{ getTranslation('path') }}</label>
                            <div class="col-lg-10">
                                <input type="text" class="form-control" name="path" value="{{ $partner->path }}"
                                    placeholder="{{ getTranslation('path') }}">
                                @error('path')
                                    <p style="color: red;">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-form-label col-lg-2">{{ getTranslation('photo') }}</label>
                            <div class="col-lg-10">
                                <input type="file" class="form-control" name="photo" value="{{ $partner->photo }}"
                                    placeholder="{{ getTranslation('photo') }}">
                                @error('photo')
                                    <p style="color: red;">{{ $message }}</p>
                                @enderror
                                <img src="{{ asset($partner->photo) }}" width="100px" class="mt-1" alt="">
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
