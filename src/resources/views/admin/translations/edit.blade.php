@extends('layouts.admin')
@section('title', 'Переводы')
@section('content')
    <!-- Content area -->
    <div class="content">
        <div class="card">

            <div class="card-body">

                <form action="{{ route('translations.update', $model->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <fieldset class="mb-3">
                        <legend class="text-uppercase font-size-sm font-weight-bold">Basic inputs</legend>

                        <div class="form-group row">
                            <label class="col-form-label col-lg-2">Стандартный</label>
                            <div class="col-lg-10">
                                <input type="text" class="form-control" name="default" value="{{ $model->default }}"
                                    placeholder="Стандартный">
                                @error('default')
                                    <p style="color: red;">{{ $message }}</p>
                                @enderror
                                <div class="card-body">
                                    <ul class="nav nav-tabs">
                                        @foreach (getLanguage() as $language)
                                            <li class="nav-item">
                                                <a href="#basic-tab1{{ $language->id }}"
                                                    class="nav-link {{ $loop->first ? 'active' : '' }}"
                                                    data-toggle="tab">{{ $language->name }}
                                                </a>
                                            </li>
                                        @endforeach
                                    </ul>
                                    <div class="tab-content">
                                        @foreach (getLanguage() as $language)
                                            <div class="tab-pane fade {{ $loop->first ? 'show active' : '' }}"
                                                id="basic-tab1{{ $language->id }}">
                                                <input type="text" class="form-control" name="{{ $language->slug }}"
                                                    value="{{ $model->name[$language->slug] ?? '' }}"
                                                    placeholder="{{ $language->name }}">
                                                @error($language->slug)
                                                    <p style="color: red;">{{ $message }}</p>
                                                @enderror
                                            </div>
                                        @endforeach
                                    </div>

                                </div>

                            </div>
                        </div>

                    </fieldset>
                    <div class="text-right">
                        <button type="submit" class="btn btn-primary">Изменить</button>
                    </div>
                </form>
            </div>
        </div>

    </div>
    <!-- /content area -->
@endsection
