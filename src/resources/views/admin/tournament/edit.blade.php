@extends('layouts.admin')
@section('title', 'Соревнования')
@section('content')
    <!-- Content area -->
    <div class="content">
        <div class="card">

            <div class="card-body">

                <form action="{{ route('tournament.update', $tournament->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <fieldset class="mb-3">
                        <legend class="text-uppercase font-size-sm font-weight-bold">Basic inputs</legend>

                        <div class="form-group row">
                            <label class="col-form-label col-lg-2">Name</label>
                            <div class="col-lg-3">
                                <input type="text" class="form-control" name="uz"
                                    value="{{ $tournament->name['uz'] }}" placeholder="UZ">
                                @error('uz')
                                    <p style="color: red;">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="col-lg-3">
                                <input type="text" class="form-control" name="ru"
                                    value="{{ $tournament->name['ru'] }}" placeholder="RU">
                                @error('ru')
                                    <p style="color: red;">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="col-lg-3">
                                <input type="text" class="form-control" name="en"
                                    value="{{ $tournament->name['en'] }}" placeholder="EN">
                                @error('en')
                                    <p style="color: red;">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-form-label col-lg-2">Category</label>
                            <div class="col-lg-10">
                                <select name="category_id" id="" class="form-control">
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}"
                                            {{ $tournament->category_id == $category->id ? 'selected' : '' }}>
                                            {{ $category->name['uz'] }}</option>
                                    @endforeach
                                </select>
                                @error('category_id')
                                    <p style="color: red;">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-form-label col-lg-2">Country</label>
                            <div class="col-lg-10">
                                <select name="country_id" id="" class="form-control">
                                    @foreach ($countries as $country)
                                        <option value="{{ $country->id }}"
                                            {{ $tournament->country_id == $country->id ? 'selected' : '' }}>
                                            {{ $country->label_en }}</option>
                                    @endforeach
                                </select>
                                @error('country_id')
                                    <p style="color: red;">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-form-label col-lg-2">Registration start</label>
                            <div class="col-lg-10">
                                <input class="form-control" type="date" name="registration_start"
                                    value="{{ $tournament->registration_start->format('Y-m-d') }}">
                                @error('registration_start')
                                    <p style="color: red;">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-form-label col-lg-2">Registration end</label>
                            <div class="col-lg-10">
                                <input class="form-control" type="date" value="{{ $tournament->registration_end->format('Y-m-d') }}"
                                    name="registration_end">
                                @error('registration_end')
                                    <p style="color: red;">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-form-label col-lg-2">Tournament Start Date</label>
                            <div class="col-lg-10">
                                <input class="form-control" type="date" value="{{ $tournament->start_date->format('Y-m-d') }}"
                                    name="start_date">
                                @error('start_date')
                                    <p style="color: red;">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-form-label col-lg-2">Tournament End Date</label>
                            <div class="col-lg-10">
                                <input class="form-control" type="date" value="{{ $tournament->end_date->format('Y-m-d') }}"
                                    name="end_date">
                                @error('end_date')
                                    <p style="color: red;">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-form-label col-lg-2">Logo</label>
                            <div class="col-lg-10">
                                <input class="form-control" type="file" value="{{ $tournament->logo }}" name="logo">
                                <img src="{{ asset($tournament->logo) }}" width="100px" class="m-1" alt="">
                                @error('logo')
                                    <p style="color: red;">{{ $message }}</p>
                                @enderror
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
