@extends('layouts.admin')
@section('title', getTranslation('language'))
@section('content')
    <!-- Content area -->
    <div class="content">
        <div class="d-inline-flex gap-2">
            <a href="{{ route('categories.index', [], false) }}" class="btn btn-sm btn-outline-success">
                {{ getTranslation('back') }}
            </a>
        </div>
        <div class="card mt-2">

            <div class="card-body">

                <form action="{{ route('categories.update', $category->id, false) }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <fieldset class="mb-3">
                        <legend class="text-uppercase font-size-sm font-weight-bold">{{ getTranslation('category') }}
                        </legend>
                        <div class="form-group row">
                            <div class="card-body">
                                <ul class="nav nav-tabs">
                                    @foreach (getLanguage() as $model)
                                        <li class="nav-item">
                                            <a href="#tab-{{ $model->id }}"
                                                class="nav-link {{ $loop->first ? 'active' : '' }}"
                                                data-toggle="tab">{{ $model->name }}
                                            </a>
                                        </li>
                                    @endforeach
                                </ul>

                                <!-- Faqat bitta tab-content bo‘lishi kerak -->
                                <div class="tab-content">
                                    @foreach (getLanguage() as $model)
                                        <div class="tab-pane fade {{ $loop->first ? 'show active' : '' }}"
                                            id="tab-{{ $model->id }}">
                                            <!-- Name maydoni -->
                                            <label class="col-form-label col-lg-2">{{ getTranslation('name') }}</label>
                                            <input type="text" class="form-control" name="name[{{ $model->slug }}]"
                                                value="{{ $category->name[$model->slug] ?? ($category->name['default'] ?? '') }}"
                                                placeholder="{{ $model->name }}">
                                            @error('name.' . $model->slug)
                                                <p style="color: red;">{{ $message }}</p>
                                            @enderror

                                            <!-- Description maydoni -->
                                            <label
                                                class="col-form-label col-lg-2">{{ getTranslation('description') }}</label>
                                            <textarea class="form-control" name="description[{{ $model->slug }}]" placeholder="{{ $model->name }}">{{ $category->description[$model->slug] ?? ($category->description['default'] ?? '') }}</textarea>
                                            @error('description.' . $model->slug)
                                                <p style="color:red;">{{ $message }}</p>
                                            @enderror

                                        </div>
                                    @endforeach
                                </div>

                                <div class="header-elements mt-3">
                                    <label class="custom-control custom-switch custom-control-right">
                                        <input type="hidden" name="is_active" value="0"
                                            {{ $category->is_active == 0 ? 'checked' : '' }}>
                                        <input type="checkbox" name="is_active" class="custom-control-input" value="1"
                                            {{ $category->is_active == 1 ? 'checked' : '' }}>
                                        <span class="custom-control-label">{{ getTranslation('status') }}</span>
                                    </label>
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
