@extends('layouts.admin')
@section('title', getTranslation('users'))
@section('content')
    <!-- Content area -->
    <div class="content">
        <div class="d-inline-flex gap-2">
            <a href="{{ route('users.index', [], false) }}" class="btn btn-sm btn-outline-success">
                {{ getTranslation('back') }}
            </a>
        </div>
        <div class="card mt-2">

            <div class="card-body">

                <form action="{{ route('users.update', $model->id, false) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <fieldset class="mb-3">
                        <legend class="text-uppercase font-size-sm font-weight-bold">{{ getTranslation('users') }}</legend>

                        <div class="form-group row">
                            <div class="card-body">
                                <!-- Name maydoni -->
                                <label class="col-form-label col-lg-2">{{ getTranslation('name') }}</label>
                                <input type="text" class="form-control" name="name"
                                    value="{{ old('name', $model->name ?? '') }}" placeholder="{{ getTranslation('name') }}">
                                @error('name')
                                    <p style="color: red;">{{ $message }}</p>
                                @enderror

                                <!-- Role maydoni -->
                                <label class="col-form-label col-lg-2">{{ getTranslation('role') }}</label>
                                <select name="role" id="" class="form-control">
                                    <option value="">{{ getTranslation('select_role') }}</option>
                                    <option value="admin" {{ old('role', $model->role) == 'admin' ? 'selected' : '' }}>
                                        admin</option>
                                    <option value="moderator"
                                        {{ old('role', $model->role) == 'moderator' ? 'selected' : '' }}>moderator</option>
                                    <option value="user" {{ old('role', $model->role) == 'user' ? 'selected' : '' }}>user
                                    </option>
                                </select>
                                @error('role')
                                    <p style="color: red;">{{ $message }}</p>
                                @enderror

                                <!-- Email maydoni -->
                                <label class="col-form-label col-lg-2">{{ getTranslation('email') }}</label>
                                <input type="email" class="form-control" name="email"
                                    value="{{ old('email', $model->email ?? '') }}"
                                    placeholder="{{ getTranslation('email') }}">
                                @error('email')
                                    <p style="color: red;">{{ $message }}</p>
                                @enderror

                                <!-- Password maydoni -->
                                <label class="col-form-label col-lg-2">{{ getTranslation('password') }}</label>
                                <input type="password" class="form-control" name="password"
                                    placeholder="{{ getTranslation('password') }}">
                                @error('password')
                                    <p style="color: red;">{{ $message }}</p>
                                @enderror

                                <!-- Password Confirmation maydoni -->
                                <label class="col-form-label col-lg-2">{{ getTranslation('password_conf') }}</label>
                                <input type="password" class="form-control" name="password_confirmation"
                                    placeholder="{{ getTranslation('password_conf') }}">
                                @error('password_confirmation')
                                    <p style="color: red;">{{ $message }}</p>
                                @enderror

                                <!-- Is_active holat kaliti -->
                                <div class="header-elements mt-3">
                                    <label class="custom-control custom-switch custom-control-right">
                                        <input type="hidden" name="status" value="0">
                                        <input type="checkbox" name="status" class="custom-control-input" value="1"
                                            {{ $model->status == 1 ? 'checked' : '' }}>
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
