@extends('layouts.admin')
@section('title', getTranslation('translations'))
@section('content')
    <!-- Content area -->
    <div class="content">
        <div class="d-inline-flex gap-2">
            <a href="{{ route('translations.index', [], false) }}" class="btn btn-sm btn-outline-secondary">
                {{ getTranslation('back') }}
            </a>
        </div>
        <div class="card mt-2">

            <div class="card-body">

                <form action="{{ route('translations.update', $model->id, false) }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <fieldset class="mb-3">
                        <legend class="text-uppercase font-size-sm font-weight-bold">{{ getTranslation('translations') }}
                        </legend>

                        <div class="form-group row">
                            <div class="col-lg-12">
                                <label class="col-form-label col-lg-2">{{ getTranslation('standard') }}</label>
                                <input type="text" class="form-control" name="default"
                                    value="{{ $model->name['default'] }}" placeholder="{{ getTranslation('standard') }}">
                                @error('default')
                                    <p style="color: red;">{{ $message }}</p>
                                @enderror
                                <ul class="nav nav-tabs mt-2">
                                    @foreach (getLanguage() as $language)
                                        <li class="nav-item">
                                            <a href="#basic-tab1{{ $language->id }}"
                                                class="nav-link {{ $loop->first ? 'active' : '' }}"
                                                data-toggle="tab">{{ $language->name }}
                                            </a>
                                        </li>
                                    @endforeach
                                </ul>
                                <div class="tab-content">
                                    @foreach (getLanguage() as $language)
                                        <div class="tab-pane fade {{ $loop->first ? 'show active' : '' }}"
                                            id="basic-tab1{{ $language->id }}">
                                            <input type="text" class="form-control" name="name[{{ $language->slug }}]"
                                                value="{{ $model->name[$language->slug] ?? '' }}"
                                                placeholder="{{ $language->name }}">
                                            @error('name.' . $language->slug)
                                                <p style="color: red;">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    @endforeach
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
