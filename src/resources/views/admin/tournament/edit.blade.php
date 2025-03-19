@extends('layouts.admin')
@section('title', getTranslation('competitions'))
@section('content')
    <!-- Content area -->
    <div class="content">
        <div class="d-inline-flex gap-2">
            <a href="{{ route('tournaments.index', [], false) }}" class="btn btn-sm btn-outline-success">
                {{ getTranslation('back') }}
            </a>
        </div>
        <div class="card mt-2">
            <div class="card-body">

                <form action="{{ route('tournaments.update', $tournament->id, false) }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <fieldset class="mb-3">
                        <legend class="text-uppercase font-size-sm font-weight-bold">{{ getTranslation('competitions') }}
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
                                                value="{{ $tournament->name[$model->slug] ?? $tournament->name['default'] }}"
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
                                            <a href="#basic-tab156{{ $model->id }}"
                                                class="nav-link {{ $loop->first ? 'active' : '' }}"
                                                data-toggle="tab">{{ $model->name }}
                                            </a>
                                        </li>
                                    @endforeach
                                </ul>
                                <div class="tab-content">
                                    @foreach (getLanguage() as $model)
                                        <div class="tab-pane fade {{ $loop->first ? 'show active' : '' }}"
                                            id="basic-tab156{{ $model->id }}">
                                            <input type="text" class="form-control" name="title[{{ $model->slug }}]"
                                                value="{{ $tournament->title[$model->slug] ?? $tournament->title['default'] }}"
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
                            <label class="col-form-label col-lg-2">{{ getTranslation('category') }}</label>
                            <div class="col-lg-10">
                                <select name="category_id" id="" class="form-control">
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}"
                                            {{ $tournament->category_id == $category->id ? 'selected' : '' }}>
                                            {{ getLocale($category->name) }}</option>
                                    @endforeach
                                </select>
                                @error('category_id')
                                    <p style="color: red;">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-form-label col-lg-2">{{ getTranslation('country') }}</label>
                            <div class="col-lg-10">
                                <select name="country_id" id="" class="form-control">
                                    @foreach ($countries as $country)
                                        <option value="{{ $country->id }}"
                                            {{ $tournament->country_id == $country->id ? 'selected' : '' }}>
                                            {{ $country->label_en }}</option>
                                    @endforeach
                                </select>
                                @error('country_id')
                                    <p style="color: red;">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-form-label col-lg-2">{{ getTranslation('start-of-registration') }}</label>
                            <div class="col-lg-10">
                                <input class="form-control" type="date" name="registration_start"
                                    value="{{ $tournament->registration_start->format('Y-m-d') }}">
                                @error('registration_start')
                                    <p style="color: red;">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-form-label col-lg-2">{{ getTranslation('registration-completed') }}</label>
                            <div class="col-lg-10">
                                <input class="form-control" type="date"
                                    value="{{ $tournament->registration_end->format('Y-m-d') }}" name="registration_end">
                                @error('registration_end')
                                    <p style="color: red;">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-form-label col-lg-2">{{ getTranslation('start') }}</label>
                            <div class="col-lg-10">
                                <input class="form-control" type="date"
                                    value="{{ $tournament->start_date->format('Y-m-d') }}" name="start_date">
                                @error('start_date')
                                    <p style="color: red;">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-form-label col-lg-2">{{ getTranslation('finished') }}</label>
                            <div class="col-lg-10">
                                <input class="form-control" type="date"
                                    value="{{ $tournament->end_date->format('Y-m-d') }}" name="end_date">
                                @error('end_date')
                                    <p style="color: red;">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-form-label col-lg-2">{{ getTranslation('description') }}</label>

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
                                            <textarea class="form-control summernote" name="description[{{ $model->slug }}]"
                                                data-dashlane-classification="other" placeholder="{{ $model->name }}">{{ $tournament->description[$model->slug] ?? $tournament->description['default'] }}</textarea>
                                            @error('description.' . $model->slug)
                                                <p style="color:red;">
                                                    {{ $message }}
                                                </p>
                                            @enderror
                                        </div>
                                    @endforeach
                                </div>

                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-form-label col-lg-2">{{ getTranslation('logo') }}</label>
                            <div class="col-lg-10">
                                <input class="form-control" type="file" value="{{ $tournament->logo }}"
                                    name="logo" onchange="previewImage(event, 'imagePreview')">
                                <div class="mt-2">
                                    <img id="imagePreview" src="" alt="imagePreview"
                                        class="img-thumbnail d-none" width="200">
                                </div>
                                <img src="{{ asset($tournament->logo) }}" width="100px" class="m-1" alt="">
                                @error('logo')
                                    <p style="color: red;">{{ $message }}</p>
                                @enderror
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
