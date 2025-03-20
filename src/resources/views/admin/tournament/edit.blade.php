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
                            <div class="card-body">
                                <!-- Tablar qismi -->
                                <ul class="nav nav-tabs mt-2">
                                    @foreach (getLanguage() as $model)
                                        <li class="nav-item">
                                            <a href="#tab-{{ $model->id }}"
                                                class="nav-link {{ $loop->first ? 'active' : '' }}"
                                                data-toggle="tab">{{ $model->name }}</a>
                                        </li>
                                    @endforeach
                                </ul>

                                <!-- Tab ichidagi kontent -->
                                <div class="tab-content">
                                    @foreach (getLanguage() as $model)
                                        <div class="tab-pane fade {{ $loop->first ? 'show active' : '' }}"
                                            id="tab-{{ $model->id }}">
                                            <!-- Name maydoni -->
                                            <label class="col-form-label col-lg-2">{{ getTranslation('name') }}</label>
                                            <input type="text" class="form-control" name="name[{{ $model->slug }}]"
                                                value="{{ old('name.' . $model->slug, $tournament->name[$model->slug] ?? '') }}"
                                                placeholder="{{ $model->name }}">
                                            @error('name.' . $model->slug)
                                                <p style="color: red;">{{ $message }}</p>
                                            @enderror

                                            <!-- Title maydoni -->
                                            <label class="col-form-label col-lg-2">{{ getTranslation('title') }}</label>
                                            <input type="text" class="form-control" name="title[{{ $model->slug }}]"
                                                value="{{ old('title.' . $model->slug, $tournament->title[$model->slug] ?? '') }}"
                                                placeholder="{{ $model->name }}">
                                            @error('title.' . $model->slug)
                                                <p style="color: red;">{{ $message }}</p>
                                            @enderror

                                            <!-- Description maydoni -->
                                            <label
                                                class="col-form-label col-lg-2">{{ getTranslation('description') }}</label>
                                            <textarea class="form-control summernote" name="description[{{ $model->slug }}]" data-dashlane-classification="other"
                                                placeholder="{{ $model->name }}">{{ old('description.' . $model->slug, $tournament->description[$model->slug] ?? '') }}</textarea>
                                            @error('description.' . $model->slug)
                                                <p style="color: red;">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    @endforeach
                                </div>

                                <!-- Category maydoni (ko‘p tilli emas) -->
                                <label class="col-form-label col-lg-2">{{ getTranslation('category') }}</label>
                                <select name="category_id" id="" class="form-control">
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}"
                                            {{ old('category_id', $tournament->category_id) == $category->id ? 'selected' : '' }}>
                                            {{ getLocale($category->name) }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('category_id')
                                    <p style="color: red;">{{ $message }}</p>
                                @enderror

                                <!-- Country maydoni (ko‘p tilli emas) -->
                                <label class="col-form-label col-lg-2">{{ getTranslation('country') }}</label>
                                <select name="country_id" id="" class="form-control">
                                    @foreach ($countries as $country)
                                        <option value="{{ $country->id }}"
                                            {{ old('country_id', $tournament->country_id) == $country->id ? 'selected' : '' }}>
                                            {{ $country->label_en }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('country_id')
                                    <p style="color: red;">{{ $message }}</p>
                                @enderror

                                <!-- Registration Start maydoni (ko‘p tilli emas) -->
                                <label
                                    class="col-form-label col-lg-2">{{ getTranslation('start-of-registration') }}</label>
                                <input class="form-control" type="date" name="registration_start"
                                    value="{{ $tournament->registration_start->format('Y-m-d') }}">
                                @error('registration_start')
                                    <p style="color: red;">{{ $message }}</p>
                                @enderror

                                <!-- Registration End maydoni (ko‘p tilli emas) -->
                                <label
                                    class="col-form-label col-lg-2">{{ getTranslation('registration-completed') }}</label>
                                <input class="form-control" type="date" name="registration_end"
                                    value="{{ $tournament->registration_end->format('Y-m-d') }}">
                                @error('registration_end')
                                    <p style="color: red;">{{ $message }}</p>
                                @enderror

                                <!-- Start Date maydoni (ko‘p tilli emas) -->
                                <label class="col-form-label col-lg-2">{{ getTranslation('start') }}</label>
                                <input class="form-control" type="date" name="start_date"
                                    value="{{ $tournament->start_date->format('Y-m-d') }}">
                                @error('start_date')
                                    <p style="color: red;">{{ $message }}</p>
                                @enderror

                                <!-- End Date maydoni (ko‘p tilli emas) -->
                                <label class="col-form-label col-lg-2">{{ getTranslation('finished') }}</label>
                                <input class="form-control" type="date" name="end_date"
                                    value="{{ $tournament->end_date->format('Y-m-d') }}">
                                @error('end_date')
                                    <p style="color: red;">{{ $message }}</p>
                                @enderror

                                <!-- Logo maydoni (ko‘p tilli emas) -->
                                <label class="col-form-label col-lg-2">{{ getTranslation('logo') }}</label>
                                <input class="form-control" type="file" name="logo"
                                    onchange="previewImage(event, 'imagePreview')">
                                @error('logo')
                                    <p style="color: red;">{{ $message }}</p>
                                @enderror
                                <div class="mt-2">
                                    @if ($tournament->logo)
                                        <img id="imagePreview" src="{{ asset($tournament->logo) }}" alt="imagePreview"
                                            class="img-thumbnail" width="200">
                                    @else
                                        <img id="imagePreview" src="" alt="imagePreview"
                                            class="img-thumbnail d-none" width="200">
                                    @endif
                                </div>
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
