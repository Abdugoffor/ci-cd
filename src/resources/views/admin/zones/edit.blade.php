@extends('layouts.admin')
@section('title', getTranslation('zones'))
@section('content')
    <!-- Content area -->
    <div class="content">
        <div class="d-inline-flex gap-2">
            @if (isset($zone) && $zone->parent_id != null)
                <a href="{{ route('sub-zones.view', $zone->parent_id, false) }}"
                    class="btn btn-sm btn-outline-secondary mb-3">
                    {{ getTranslation('back') }}
                </a>
            @else
                <a href="{{ route('zones.index', [], false) }}" class="btn btn-sm btn-outline-secondary mb-3">
                    {{ getTranslation('back') }}
                </a>
            @endif
        </div>
        <div class="card mt-2">

            <div class="card-body">

                <form action="{{ route('zones.update', $zone->id, false) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <fieldset class="mb-3">
                        <legend class="text-uppercase font-size-sm font-weight-bold">{{ getTranslation('zones') }}
                        </legend>
                        <div class="form-group row">
                            <div class="card-body">

                                <!-- title maydoni (ko‘p tilli emas) -->
                                <label class="col-form-label col-lg-2">{{ getTranslation('title') }}</label>
                                <input type="text" class="form-control" name="title" value="{{ $zone->title }}"
                                    placeholder="{{ getTranslation('title') }}">
                                @error('title')
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
                                            <!-- description maydoni -->
                                            <label
                                                class="col-form-label col-lg-2">{{ getTranslation('description') }}</label>
                                            <input type="text" class="form-control"
                                                name="description[{{ $model->slug }}]"
                                                value="{{ old('description.' . $model->slug, $zone->description[$model->slug] ?? '') }}"
                                                placeholder="{{ $model->name }}">
                                            @error('description.' . $model->slug)
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
                                            {{ $zone->is_active == 1 ? 'checked' : '' }}>
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
