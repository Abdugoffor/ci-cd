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

                <form action="{{ route('news.update', $news->id, false) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <fieldset class="mb-3">
                        <legend class="text-uppercase font-size-sm font-weight-bold">{{ getTranslation('news') }}
                        </legend>

                        <div class="form-group row">
                            <label class="col-form-label col-lg-2">{{ getTranslation('title') }}</label>
                            <div class="card-body">
                                <ul class="nav nav-tabs">
                                    @foreach (getLanguage() as $model)
                                        <li class="nav-item">
                                            <a href="#basic-tab1{{ $model->id }}"
                                                class="nav-link {{ $loop->first ? 'active' : '' }}"
                                                data-toggle="tab">{{ $model->name }}
                                            </a>
                                        </li>
                                    @endforeach
                                </ul>
                                <div class="tab-content">
                                    @foreach (getLanguage() as $model)
                                        <div class="tab-pane fade {{ $loop->first ? 'show active' : '' }}"
                                            id="basic-tab1{{ $model->id }}">
                                            <input type="text" class="form-control" name="title[{{ $model->slug }}]"
                                                value="{{ $news->title[$model->slug] ?? $news->title['default'] }}"
                                                placeholder="{{ $model->name }}">
                                            @error('title.' . $model->slug)
                                                <p style="color: red;">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    @endforeach
                                </div>

                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-form-label col-lg-2">{{ getTranslation('description') }}</label>
                            <div class="card-body">
                                <ul class="nav nav-tabs">
                                    @foreach (getLanguage() as $model)
                                        <li class="nav-item">
                                            <a href="#basic-tab12{{ $model->id }}"
                                                class="nav-link {{ $loop->first ? 'active' : '' }}"
                                                data-toggle="tab">{{ $model->name }}
                                            </a>
                                        </li>
                                    @endforeach
                                </ul>
                                <div class="tab-content">
                                    @foreach (getLanguage() as $model)
                                        <div class="tab-pane fade {{ $loop->first ? 'show active' : '' }}"
                                            id="basic-tab12{{ $model->id }}">
                                            <textarea class="form-control" name="description[{{ $model->slug }}]" data-dashlane-classification="other"
                                                placeholder="{{ $model->name }}">{{ $news->description[$model->slug] ?? $news->description['default'] }}</textarea>
                                            @error('description.' . $model->slug)
                                                <p style="color:red;">
                                                    {{ $message }}
                                                </p>
                                            @enderror
                                        </div>
                                    @endforeach
                                </div>

                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-form-label col-lg-2">{{ getTranslation('text') }}</label>
                            <div class="card-body">
                                <ul class="nav nav-tabs">
                                    @foreach (getLanguage() as $model)
                                        <li class="nav-item">
                                            <a href="#basic-tab123{{ $model->id }}"
                                                class="nav-link {{ $loop->first ? 'active' : '' }}"
                                                data-toggle="tab">{{ $model->name }}
                                            </a>
                                        </li>
                                    @endforeach
                                </ul>
                                <div class="tab-content">
                                    @foreach (getLanguage() as $model)
                                        <div class="tab-pane fade {{ $loop->first ? 'show active' : '' }}"
                                            id="basic-tab123{{ $model->id }}">
                                            <textarea class="form-control summernote" name="text[{{ $model->slug }}]" data-dashlane-classification="other"
                                                placeholder="{{ $model->name }}">{{ $news->text[$model->slug] ?? $news->text['default'] }}</textarea>
                                            @error('text.' . $model->slug)
                                                <p style="color:red;">
                                                    {{ $message }}
                                                </p>
                                            @enderror
                                        </div>
                                    @endforeach
                                </div>

                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-form-label col-lg-2">{{ getTranslation('menus') }}</label>
                            <div class="col-lg-10">
                                <select name="menyu_id" id="" class="form-control">
                                    @foreach ($menus as $menu)
                                        <option value="{{ $menu->id }}">{{ getLocale($menu->name) }}</option>
                                    @endforeach
                                </select>
                                @error('menyu_id')
                                    <p style="color: red;">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-form-label col-lg-2">{{ getTranslation('photo') }}</label>
                            <div class="col-lg-10">
                                <input type="file" class="form-control" name="photo" value="{{ $news->photo }}"
                                    placeholder="{{ getTranslation('photo') }}">
                                @error('photo')
                                    <p style="color: red;">{{ $message }}</p>
                                @enderror
                                <img src="{{ asset($news->photo) }}" width="100px" class="mt-1" alt="">

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
