@extends('layouts.admin')
@section('title', 'Соревнования')
@section('content')
    <!-- Content area -->
    <div class="content">
        <div class="card">

            <div class="card-body">

                <form action="{{ route('tournaments.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <fieldset class="mb-3">
                        <legend class="text-uppercase font-size-sm font-weight-bold">Basic inputs</legend>

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
                                                value="{{ old($model->slug) }}" placeholder="{{ $model->name }}">
                                            @error($model->slug)
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
                                        <option value="{{ $category->id }}">{{ $category->name['uz'] }}</option>
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
                                        <option value="{{ $country->id }}">{{ $country->label_en }}</option>
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
                                    value="{{ old('registration_start') }}">
                                @error('registration_start')
                                    <p style="color: red;">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-form-label col-lg-2">{{ getTranslation('registration-completed') }}</label>
                            <div class="col-lg-10">
                                <input class="form-control" type="date" value="{{ old('registration_end') }}"
                                    name="registration_end">
                                @error('registration_end')
                                    <p style="color: red;">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-form-label col-lg-2">{{ getTranslation('start') }}</label>
                            <div class="col-lg-10">
                                <input class="form-control" type="date" value="{{ old('start_date') }}"
                                    name="start_date">
                                @error('start_date')
                                    <p style="color: red;">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-form-label col-lg-2">{{ getTranslation('finished') }}</label>
                            <div class="col-lg-10">
                                <input class="form-control" type="date" value="{{ old('end_date') }}" name="end_date">
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
                                            <textarea class="form-control" name="description[{{ $model->slug }}]" data-dashlane-classification="other"
                                                placeholder="{{ $model->name }}"></textarea>
                                            @error('description')
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
                                <input class="form-control" type="file" name="logo">
                                @error('logo')
                                    <p style="color: red;">{{ $message }}</p>
                                @enderror
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
