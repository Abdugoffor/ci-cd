@extends('layouts.admin')
@section('title', getTranslation('users'))
@section('content')
    <!-- Content area -->
    <div class="content">
        <div class="card">

            <div class="card-body">

                <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <fieldset class="mb-3">
                        <legend class="text-uppercase font-size-sm font-weight-bold">{{ getTranslation('users') }}</legend>

                        <div class="form-group row">
                            <label class="col-form-label col-lg-2">{{ getTranslation('name') }}</label>
                            <div class="col-lg-10">
                                <input type="text" class="form-control" name="name" value="{{ $user->name }}"
                                    placeholder="{{ getTranslation('name') }}">
                                @error('name')
                                    <p style="color: red;">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-form-label col-lg-2">{{ getTranslation('email') }}</label>
                            <div class="col-lg-10">
                                <input type="email" class="form-control" name="email" value="{{ $user->email }}"
                                    placeholder="{{ getTranslation('email') }}">
                                @error('email')
                                    <p style="color: red;">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-form-label col-lg-2">{{ getTranslation('password') }}</label>
                            <div class="col-lg-10">
                                <input type="password" class="form-control" name="password" placeholder="{{ getTranslation('password') }}">
                                @error('password')
                                    <p style="color: red;">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-form-label col-lg-2">{{ getTranslation('password_conf') }}</label>
                            <div class="col-lg-10">
                                <input type="password" class="form-control" name="password_confirmation"
                                    placeholder="{{ getTranslation('password_conf') }}">
                                @error('password_confirmation')
                                    <p style="color: red;">{{ $message }}</p>
                                @enderror
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
