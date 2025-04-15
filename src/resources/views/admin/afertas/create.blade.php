@extends('layouts.admin')
@section('title', getTranslation('aferta'))
@section('content')
    <!-- Content area -->
    <div class="content">
        <div class="d-inline-flex gap-2">
            <a href="{{ route('aferta.index', [], false) }}" class="btn btn-outline-secondary">
                {{ getTranslation('back') }}
            </a>
        </div>
        <div class="card mt-2">
            <div class="card-body">
                <form action="{{ route('aferta.store', [], false) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <fieldset class="mb-3">
                        <legend class="text-uppercase font-size-sm font-weight-bold">{{ getTranslation('aferta') }}
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

                                            <!-- Text maydoni -->
                                            <label class="col-form-label col-lg-2">{{ getTranslation('text') }}</label>
                                            <textarea class="form-control summernote" name="text[{{ $model->slug }}]" data-dashlane-classification="other"
                                                placeholder="{{ $model->name }}">{{ old('text.' . $model->slug) }}</textarea>
                                            @error('text.' . $model->slug)
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
