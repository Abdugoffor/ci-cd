@extends('layouts.admin')
@section('title', getTranslation('news'))
@section('content')
    <!-- Content area -->
    <div class="content">
        <div class="d-inline-flex gap-2">
            <a href="{{ route('news.index', [], false) }}" class="btn btn-sm btn-outline-success">
                {{ getTranslation('back') }}
            </a>
        </div>
        <div class="card mt-2">
            <div class="card-body">
                <form action="{{ route('news.store', [], false) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <fieldset class="mb-3">
                        <legend class="text-uppercase font-size-sm font-weight-bold">{{ getTranslation('news') }}
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
                                            <!-- Title maydoni -->
                                            <label class="col-form-label col-lg-2">{{ getTranslation('title') }}</label>
                                            <input type="text" class="form-control" name="title[{{ $model->slug }}]"
                                                value="{{ old('title.' . $model->slug) }}"
                                                placeholder="{{ $model->name }}">
                                            @error('title.' . $model->slug)
                                                <p style="color: red;">{{ $message }}</p>
                                            @enderror

                                            <!-- Description maydoni -->
                                            <label
                                                class="col-form-label col-lg-2">{{ getTranslation('description') }}</label>
                                            <textarea class="form-control" name="description[{{ $model->slug }}]" data-dashlane-classification="other"
                                                placeholder="{{ $model->name }}">{{ old('description.' . $model->slug) }}</textarea>
                                            @error('description.' . $model->slug)
                                                <p style="color: red;">{{ $message }}</p>
                                            @enderror

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

                                <!-- Menus maydoni (ko‘p tilli emas) -->
                                <label class="col-form-label col-lg-2">{{ getTranslation('menus') }}</label>
                                <select name="menyu_id" id="" class="form-control">
                                    @foreach ($menus as $menu)
                                        <option value="{{ $menu->id }}">{{ getLocale($menu->name) }}</option>
                                    @endforeach
                                </select>
                                @error('menyu_id')
                                    <p style="color: red;">{{ $message }}</p>
                                @enderror

                                <!-- Photo maydoni (ko‘p tilli emas) -->
                                <label class="col-form-label col-lg-2">{{ getTranslation('photo') }}</label>
                                <input type="file" class="form-control" name="photo" value="{{ old('photo') }}"
                                    placeholder="{{ getTranslation('photo') }}"
                                    onchange="previewImage(event, 'imagePreview')">
                                @error('photo')
                                    <p style="color: red;">{{ $message }}</p>
                                @enderror
                                <div class="mt-2">
                                    <img id="imagePreview" src="" alt="imagePreview" class="img-thumbnail d-none"
                                        width="200">
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
