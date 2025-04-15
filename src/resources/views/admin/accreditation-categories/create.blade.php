@extends('layouts.admin')
@section('title', getTranslation('accreditation-categories'))
@section('content')
    <!-- Content area -->
    <div class="content">
        <div class="d-inline-flex gap-2">
            <a href="{{ route('accreditation-categories.index', [], false) }}" class="btn btn-outline-secondary">
                {{ getTranslation('back') }}
            </a>
        </div>
        <div class="card mt-2">

            <div class="card-body">

                <form action="{{ route('accreditation-categories.store', [], false) }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    <fieldset class="mb-3">
                        <legend class="text-uppercase font-size-sm font-weight-bold">
                            {{ getTranslation('accreditation-categories') }}
                        </legend>
                        <div class="form-group row">
                            <div class="card-body">
                                <!-- Tablar qismi -->
                                <ul class="nav nav-tabs">
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
                                                value="{{ old('name.' . $model->slug) }}"
                                                placeholder="{{ $model->name }}">
                                            @error('name.' . $model->slug)
                                                <!-- Bu yerda 'description' emas, 'name' bo‘lishi kerak -->
                                                <p style="color: red;">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    @endforeach
                                </div>

                                <!-- Is_active holat kaliti -->
                                <div class="header-elements mt-3">
                                    <label class="custom-control custom-switch custom-control-right">
                                        <input type="hidden" name="is_active" value="0">
                                        <input type="checkbox" name="is_active" class="custom-control-input" value="1"
                                            checked>
                                        <span class="custom-control-label">{{ getTranslation('status') }}</span>
                                    </label>
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
