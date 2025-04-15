@extends('layouts.admin')
@section('title', getTranslation('contacts'))
@section('content')
    <!-- Content area -->
    <div class="content">
        <div class="d-inline-flex gap-2">
            <a href="{{ route('contacts.index', [], false) }}" class="btn btn-outline-secondary">
                {{ getTranslation('back') }}
            </a>
        </div>
        <div class="card mt-2">

            <div class="card-body">

                <form action="{{ route('contacts.update', $contact->id, false) }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <fieldset class="mb-3">
                        <legend class="text-uppercase font-size-sm font-weight-bold">{{ getTranslation('contacts') }}
                        </legend>
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
                                        <!-- Title maydoni -->
                                        <label class="col-form-label col-lg-2">{{ getTranslation('title') }}</label>
                                        <input type="text" class="form-control" name="title[{{ $model->slug }}]"
                                            value="{{ old('title.' . $model->slug, $contact->title[$model->slug] ?? '') }}"
                                            placeholder="{{ $model->name }}">
                                        @error('title.' . $model->slug)
                                            <p style="color: red;">{{ $message }}</p>
                                        @enderror
                                    </div>
                                @endforeach
                            </div>

                            <!-- Path maydoni (ko‘p tilli emas) -->
                            <label class="col-form-label col-lg-2">{{ getTranslation('path') }}</label>
                            <input type="text" class="form-control" name="path"
                                value="{{ old('path', $contact->path ?? '') }}"
                                placeholder="{{ getTranslation('path') }}">
                            @error('path')
                                <p style="color: red;">{{ $message }}</p>
                            @enderror

                            <!-- Photo maydoni (ko‘p tilli emas) -->
                            <label class="col-form-label col-lg-2">{{ getTranslation('photo') }}</label>
                            <input type="file" class="form-control" name="photo"
                                placeholder="{{ getTranslation('photo') }}" id="photo"
                                onchange="previewImage(event,'imagePreview')">
                            @error('photo')
                                <p style="color: red;">{{ $message }}</p>
                            @enderror
                            <div class="mt-2">
                                @if ($contact->photo)
                                    <img id="imagePreview" src="{{ asset($contact->photo) }}" alt="imagePreview"
                                        class="img-thumbnail" width="200">
                                @else
                                    <img id="imagePreview" src="" alt="imagePreview" class="img-thumbnail d-none"
                                        width="200">
                                @endif
                            </div>

                            <!-- Is_active holat kaliti -->
                            <div class="header-elements mt-3">
                                <label class="custom-control custom-switch custom-control-right">
                                    <input type="hidden" name="is_active" value="0">
                                    <input type="checkbox" name="is_active" class="custom-control-input" value="1"
                                        {{ $contact->is_active == 1 ? 'checked' : '' }}>
                                    <span class="custom-control-label">{{ getTranslation('status') }}</span>
                                </label>
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
