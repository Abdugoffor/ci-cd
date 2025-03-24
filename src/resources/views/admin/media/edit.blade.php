@extends('layouts.admin')
@section('title', getTranslation('media'))
@section('content')
    <!-- Content area -->
    <div class="content">
        <div class="d-inline-flex gap-2">
            <a href="{{ route('media.index', [], false) }}" class="btn btn-sm btn-outline-secondary">
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
                                                value="{{ old('name.' . $model->slug, $media->name[$model->slug] ?? '') }}"
                                                placeholder="{{ $model->name }}">
                                            @error('name.' . $model->slug)
                                                <p style="color: red;">{{ $message }}</p>
                                            @enderror

                                            <!-- Title maydoni -->
                                            <label class="col-form-label col-lg-2">{{ getTranslation('title') }}</label>
                                            <input type="text" class="form-control" name="title[{{ $model->slug }}]"
                                                value="{{ old('title.' . $model->slug, $media->title[$model->slug] ?? '') }}"
                                                placeholder="{{ $model->name }}">
                                            @error('title.' . $model->slug)
                                                <p style="color: red;">{{ $message }}</p>
                                            @enderror

                                            <!-- Description maydoni -->
                                            <label
                                                class="col-form-label col-lg-2">{{ getTranslation('description') }}</label>
                                            <input type="text" class="form-control"
                                                name="description[{{ $model->slug }}]"
                                                value="{{ old('description.' . $model->slug, $media->description[$model->slug] ?? '') }}"
                                                placeholder="{{ $model->name }}">
                                            @error('description.' . $model->slug)
                                                <p style="color: red;">{{ $message }}</p>
                                            @enderror

                                            <!-- Text maydoni -->
                                            <label class="col-form-label col-lg-2">{{ getTranslation('text') }}</label>
                                            <input type="text" class="form-control" name="text[{{ $model->slug }}]"
                                                value="{{ old('text.' . $model->slug, $media->text[$model->slug] ?? '') }}"
                                                placeholder="{{ $model->name }}">
                                            @error('text.' . $model->slug)
                                                <p style="color: red;">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    @endforeach
                                </div>

                                <!-- Photo 1 maydoni (ko‘p tilli emas) -->
                                <label class="col-form-label col-lg-2">{{ getTranslation('photo') }} 1</label>
                                <input type="file" class="form-control" name="photo_1"
                                    placeholder="{{ getTranslation('photo') }}"
                                    onchange="previewImage(event, 'imagePreview')">
                                @error('photo_1')
                                    <p style="color: red;">{{ $message }}</p>
                                @enderror
                                <div class="mt-2">
                                    @if ($media->photo_1)
                                        <img id="imagePreview" src="{{ asset($media->photo_1) }}" alt="imagePreview"
                                            class="img-thumbnail" width="200">
                                    @else
                                        <img id="imagePreview" src="" alt="imagePreview"
                                            class="img-thumbnail d-none" width="200">
                                    @endif
                                </div>

                                <!-- Photo 2 maydoni (ko‘p tilli emas) -->
                                <label class="col-form-label col-lg-2">{{ getTranslation('photo') }} 2</label>
                                <input type="file" class="form-control" name="photo_2"
                                    placeholder="{{ getTranslation('photo') }}"
                                    onchange="previewImage(event, 'imagePreview2')">
                                @error('photo_2')
                                    <p style="color: red;">{{ $message }}</p>
                                @enderror
                                <div class="mt-2">
                                    @if ($media->photo_2)
                                        <img id="imagePreview2" src="{{ asset($media->photo_2) }}" alt="imagePreview"
                                            class="img-thumbnail" width="200">
                                    @else
                                        <img id="imagePreview2" src="" alt="imagePreview"
                                            class="img-thumbnail d-none" width="200">
                                    @endif
                                </div>

                                <!-- Is_active holat kaliti -->
                                <div class="header-elements mt-3">
                                    <label class="custom-control custom-switch custom-control-right">
                                        <input type="hidden" name="is_active" value="0">
                                        <input type="checkbox" name="is_active" class="custom-control-input" value="1"
                                            {{ $media->is_active == 1 ? 'checked' : '' }}>
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
