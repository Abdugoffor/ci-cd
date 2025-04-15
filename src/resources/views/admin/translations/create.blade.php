@extends('layouts.admin')
@section('title', getTranslation('translations'))
@section('content')
    <!-- Content area -->
    <div class="content">
        <div class="d-inline-flex gap-2">
            <a href="{{ route('translations.index', [], false) }}" class="btn btn-outline-secondary">
                {{ getTranslation('back') }}
            </a>
        </div>
        <div class="card mt-2">

            <div class="card-body">

                <form action="{{ route('translations.store', [], false) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <fieldset class="mb-3">
                        <legend class="text-uppercase font-size-sm font-weight-bold">{{ getTranslation('translations') }}
                        </legend>
                        <div class="form-group row">
                            <div class="col-12">
                                <!-- Standart maydon (ko‘p tilli emas) -->
                                <label class="col-form-label col-lg-2">{{ getTranslation('standard') }}</label>
                                <input type="text" class="form-control" name="default" value="{{ old('default') }}"
                                    placeholder="{{ getTranslation('standard') }}">

                                @error('default')
                                    <p style="color: red;">{{ $message }}</p>
                                @enderror
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
                                                value="{{ old('name.' . $model->slug) }}"
                                                placeholder="{{ $model->name }}">
                                            @error('name.' . $model->slug)
                                                <p style="color: red;">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    @endforeach
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
