@extends('layouts.admin')
@section('title', 'Login')
@section('content')
    <!-- Content area -->
    <div class="content">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">Tournament create</h5>
            </div>

            <div class="card-body">

                <form action="{{ route('tournament.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <fieldset class="mb-3">
                        <legend class="text-uppercase font-size-sm font-weight-bold">Basic inputs</legend>

                        <div class="form-group row">
                            <label class="col-form-label col-lg-2">Name</label>
                            <div class="col-lg-3">
                                <input type="text" class="form-control" name="uz" value="{{ old('uz') }}" placeholder="UZ">
                                @error('uz')
                                    <p style="color: red;">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="col-lg-3">
                                <input type="text" class="form-control" name="ru" value="{{ old('ru') }}" placeholder="RU">
                                @error('ru')
                                    <p style="color: red;">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="col-lg-3">
                                <input type="text" class="form-control" name="en" value="{{ old('en') }}" placeholder="EN">
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
                                        <option value="{{ $category->id }}">{{ $category->name['uz'] }}</option>
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
                                        <option value="{{ $country->id }}">{{ $country->label_en }}</option>
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
                                <input class="form-control" type="date" name="registration_start" value="{{ old('registration_start') }}">
                                @error('registration_start')
                                    <p style="color: red;">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-form-label col-lg-2">Registration end</label>
                            <div class="col-lg-10">
                                <input class="form-control" type="date" value="{{ old('registration_end') }}" name="registration_end">
                                @error('registration_end')
                                    <p style="color: red;">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-form-label col-lg-2">Tournament Start Date</label>
                            <div class="col-lg-10">
                                <input class="form-control" type="date" value="{{ old('start_date') }}" name="start_date">
                                @error('start_date')
                                    <p style="color: red;">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-form-label col-lg-2">Tournament End Date</label>
                            <div class="col-lg-10">
                                <input class="form-control" type="date" value="{{ old('end_date') }}" name="end_date">
                                @error('end_date')
                                    <p style="color: red;">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-form-label col-lg-2">Logo</label>
                            <div class="col-lg-10">
                                <input class="form-control" type="file" name="logo">
                                @error('logo')
                                    <p style="color: red;">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                    </fieldset>
                    <div class="text-right">
                        <button type="submit" class="btn btn-primary">Submit <i class="icon-paperplane ml-2"></i></button>
                    </div>
                </form>
            </div>
        </div>

    </div>
    <!-- /content area -->
@endsection
