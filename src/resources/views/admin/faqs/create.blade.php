@extends('layouts.admin')
@section('title', getTranslation('faqs'))
@section('content')
    <!-- Content area -->
    <div class="content">
        <div class="d-inline-flex gap-2">
            <a href="{{ route('faqs.index', [], false) }}" class="btn btn-outline-secondary">
                {{ getTranslation('back') }}
            </a>
        </div>
        <div class="card mt-2">

            <div class="card-body">

                <form action="{{ route('faqs.store', [], false) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <fieldset class="mb-3">
                        <legend class="text-uppercase font-size-sm font-weight-bold">{{ getTranslation('faqs') }}
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
                                            <!-- question maydoni -->
                                            <label class="col-form-label col-lg-2">{{ getTranslation('question') }}</label>
                                            <input type="text" class="form-control" name="question[{{ $model->slug }}]"
                                                value="{{ old('question.' . $model->slug) }}"
                                                placeholder="{{ $model->name }}">
                                            @error('question.' . $model->slug)
                                                <p style="color: red;">{{ $message }}</p>
                                            @enderror

                                            <!-- answer maydoni -->
                                            <label
                                                class="col-form-label col-lg-2">{{ getTranslation('answer') }}</label>
                                            <textarea class="form-control" name="answer[{{ $model->slug }}]" data-dashlane-classification="other"
                                                placeholder="{{ $model->name }}">{{ old('answer.' . $model->slug) }}</textarea>
                                            @error('answer.' . $model->slug)
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
