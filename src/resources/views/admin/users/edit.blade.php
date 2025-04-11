@extends('layouts.admin')
@section('title', getTranslation('users'))
@section('content')
    <!-- Content area -->
    <div class="content">
        <div class="d-inline-flex gap-2">
            <a href="{{ route('users.index', [], false) }}" class="btn btn-sm btn-outline-secondary">
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
                                    value="{{ old('name', $model->name ?? '') }}"
                                    placeholder="{{ getTranslation('name') }}">
                                @error('name')
                                    <p style="color: red;">{{ $message }}</p>
                                @enderror

                                <!-- Role maydoni -->
                                <label class="col-form-label col-lg-2">{{ getTranslation('role') }}</label>
                                <select name="role" id="" class="form-control">
                                    <option value="">{{ getTranslation('select_role') }}</option>
                                    <option value="admin"
                                        {{ old('role', $model->role) == 'Administrator' ? 'selected' : '' }}>
                                        Administrator
                                    </option>
                                    <option value="Manager" {{ old('role', $model->role) == 'Manager' ? 'selected' : '' }}>
                                        Manager
                                    </option>
                                    <option value="Regional applicant"
                                        {{ old('role', $model->role) == 'Regional applicant' ? 'selected' : '' }}>
                                        Regional applicant
                                    </option>
                                    <option value="Security"
                                        {{ old('role', $model->role) == 'Security' ? 'selected' : '' }}>
                                        Security
                                    </option>
                                    <option value="Guest" {{ old('role', $model->role) == 'Guest' ? 'selected' : '' }}>
                                        Guest
                                    </option>
                                </select>
                                @error('role')
                                    <p style="color: red;">{{ $message }}</p>
                                @enderror

                                <!-- Country maydoni -->
                                <label class="col-form-label col-lg-2">{{ getTranslation('country') }}</label>
                                <select name="country_id" id="" class="form-control">
                                    <option value="">{{ getTranslation('select_role') }}</option>
                                    @foreach ($countrys as $country)
                                        <option value="{{ $country->id }}"
                                            {{ old('country_id', $model->country_id) == $country->id ? 'selected' : '' }}>
                                            {{ $country->label_en }}</option>
                                    @endforeach
                                </select>
                                @error('country_id')
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

                                <!-- Password generator maydoni -->
                                <label for="generatedPassword"
                                    class="col-form-label col-lg-2">{{ getTranslation('password_generate') }}</label>
                                <div class="input-group">
                                    <input type="text" id="generatedPassword" class="form-control" readonly>
                                    <button class="btn btn-outline-secondary" type="button"
                                        onclick="generatePassword()">Generate</button>
                                    <button class="btn btn-outline-success" type="button"
                                        onclick="copyPassword()">Copy</button>
                                </div>

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
<script>
    function generatePassword(length = 25) {
        const chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
        let password = "";

        for (let i = 0; i < length; i++) {
            password += chars.charAt(Math.floor(Math.random() * chars.length));
        }

        document.getElementById("generatedPassword").value = password;
    }

    function copyPassword() {
        const passwordField = document.getElementById("generatedPassword");
        passwordField.select();
        passwordField.setSelectionRange(0, 99999);
        navigator.clipboard.writeText(passwordField.value).then(() => {

        });
    }
</script>
