@extends('layouts.admin')
@section('title', getTranslation('support_applications'))
@section('content')
    <!-- Content area -->
    <div class="content">
        <div class="d-inline-flex gap-2">
            <a href="{{ route('support-applications.index', [], false) }}" class="btn btn-outline-secondary">
                {{ getTranslation('back') }}
            </a>
        </div>
        <div class="card mt-2">

            <div class="card-body">

                <form action="{{ route('support-applications.store', [], false) }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    <fieldset class="mb-3">
                        <legend class="text-uppercase font-size-sm font-weight-bold">
                            {{ getTranslation('support_applications') }}</legend>

                        <div class="form-group row">
                            <div class="card-body">

                                <label class="col-form-label col-lg-2">{{ getTranslation('fide-id') }}</label>
                                <input type="text" class="form-control" name="fide_id" value="{{ old('fide_id') }}"
                                    placeholder="{{ getTranslation('fide-id') }}">
                                @error('fide_id')
                                    <p style="color: red;">{{ $message }}</p>
                                @enderror

                                <!-- Name maydoni -->
                                <label class="col-form-label col-lg-2 mt-2">{{ getTranslation('name') }}</label>
                                <input type="text" class="form-control" name="first_name" value="{{ old('first_name') }}"
                                    placeholder="{{ getTranslation('name') }}">
                                @error('first_name')
                                    <p style="color: red;">{{ $message }}</p>
                                @enderror

                                <label class="col-form-label col-lg-2 mt-2">{{ getTranslation('last-name') }}</label>
                                <input type="text" class="form-control" name="last_name" value="{{ old('last_name') }}"
                                    placeholder="{{ getTranslation('name') }}">
                                @error('last_name')
                                    <p style="color: red;">{{ $message }}</p>
                                @enderror

                                <label class="col-form-label col-lg-2 mt-2">{{ getTranslation('email') }}</label>
                                <input type="email" class="form-control" name="email" value="{{ old('email') }}"
                                    placeholder="{{ getTranslation('email') }}">
                                @error('email')
                                    <p style="color: red;">{{ $message }}</p>
                                @enderror

                                <label class="col-form-label col-lg-2 mt-2">{{ getTranslation('birth-date') }}</label>
                                <input type="date" class="form-control" name="date_of_birth"
                                    value="{{ old('date_of_birth') }}"
                                    placeholder="{{ getTranslation('date_of_birth') }}">
                                @error('date_of_birth')
                                    <p style="color: red;">{{ $message }}</p>
                                @enderror


                                <label class="col-form-label col-lg-2 mt-2">{{ getTranslation('competitions') }}</label>
                                <select name="tournament_id" id="" class="form-control">
                                    <option value="" disabled selected>
                                    </option>
                                    @if ($tournaments->count() > 0)
                                        @foreach ($tournaments as $tournament)
                                            <option value="{{ $tournament->id }}"
                                                {{ old('tournament_id') == $tournament->id ? 'selected' : '' }}>
                                                {{ getLocale($tournament->name) }}</option>
                                        @endforeach
                                    @else
                                        <option value="">{{ getTranslation('no_tournament') }}</option>
                                    @endif

                                </select>
                                @error('tournament_id')
                                    <p style="color: red;">{{ $message }}</p>
                                @enderror

                                <label
                                    class="col-form-label col-lg-2 mt-2">{{ getTranslation('accreditation-category') }}</label>
                                <select name="accreditation_category_id" id="" class="form-control">
                                    <option value="" disabled selected>
                                    </option>
                                    @foreach ($accreditationCategories as $category)
                                        <option value="{{ $category->id }}"
                                            {{ session('player.id_number') && $category->slug == 'player' ? 'selected' : '' }}
                                            {{ old('accreditation_category_id') == $category->id ? 'selected' : '' }}>
                                            {{ getLocale($category->name) }}</option>
                                    @endforeach
                                </select>
                                @error('accreditation_category_id')
                                    <p style="color: red;">{{ $message }}</p>
                                @enderror

                                <div class="form-group mt-2">
                                    <label class="col-form-label col-lg-2 mt-2">{{ getTranslation('gender') }}</label>
                                    <div class="border p-3 rounded">
                                        <div class="form-check">
                                            <input type="radio" class="form-check-input" name="gender" value="M"
                                                id="dr_ls_c"
                                                {{ old('gender', optional(session('player'))['sex'] ?? '') == 'M' ? 'checked' : '' }}>
                                            <label class="form-check-label"
                                                for="dr_ls_c">{{ getTranslation('m') }}</label>
                                        </div>

                                        <div class="form-check mb-2">
                                            <input type="radio" class="form-check-input" name="gender" value="F"
                                                id="dr_ls_u"
                                                {{ old('gender', optional(session('player'))['sex'] ?? '') == 'L' ? 'checked' : '' }}>
                                            <label class="form-check-label"
                                                for="dr_ls_u">{{ getTranslation('f') }}</label>
                                        </div>
                                    </div>
                                    @error('gender')
                                        <p style="color: red;">{{ $message }}</p>
                                    @enderror
                                </div>

                                <label class="col-form-label col-lg-2 mt-2">{{ getTranslation('passport-number') }}</label>
                                <input type="text" class="form-control" name="passport_number"
                                    value="{{ old('passport_number') }}"
                                    placeholder="{{ getTranslation('passport-number') }}">
                                @error('passport_number')
                                    <p style="color: red;">{{ $message }}</p>
                                @enderror

                                <label
                                    class="col-form-label col-lg-2 mt-2">{{ getTranslation('passport-issue-date') }}</label>
                                <input type="date" class="form-control" name="passport_issue_date"
                                    value="{{ old('passport_issue_date') }}"
                                    placeholder="{{ getTranslation('passport-issue-date') }}">
                                @error('passport_issue_date')
                                    <p style="color: red;">{{ $message }}</p>
                                @enderror

                                <label
                                    class="col-form-label col-lg-2 mt-2">{{ getTranslation('passport-validity-period') }}</label>
                                <input type="date" class="form-control" name="passport_expiry_date"
                                    value="{{ old('passport_expiry_date') }}"
                                    placeholder="{{ getTranslation('passport-validity-period') }}">
                                @error('passport_expiry_date')
                                    <p style="color: red;">{{ $message }}</p>
                                @enderror

                                <label class="col-form-label col-lg-2 mt-2">{{ getTranslation('arrival-date') }}</label>
                                <input type="date" class="form-control" name="arrival_details"
                                    value="{{ old('arrival_details') }}"
                                    placeholder="{{ getTranslation('arrival-date') }}">
                                @error('arrival_details')
                                    <p style="color: red;">{{ $message }}</p>
                                @enderror

                                <label class="col-form-label col-lg-2 mt-2">{{ getTranslation('departure-date') }}</label>
                                <input type="date" class="form-control" name="departure_details"
                                    value="{{ old('departure_details') }}"
                                    placeholder="{{ getTranslation('departure-date') }}">
                                @error('departure_details')
                                    <p style="color: red;">{{ $message }}</p>
                                @enderror

                                <label
                                    class="col-form-label col-lg-2 mt-2">{{ getTranslation('passport-issuing-authority') }}</label>
                                <input type="text" class="form-control" name="passport_issuing_authority"
                                    value="{{ old('passport_issuing_authority') }}"
                                    placeholder="{{ getTranslation('passport-issuing-authority') }}">
                                @error('passport_issuing_authority')
                                    <p style="color: red;">{{ $message }}</p>
                                @enderror

                                <label
                                    class="col-form-label col-lg-2 mt-2">{{ getTranslation('pcr-test-details') }}</label>
                                <select name="pcr_test_details" id="" class="form-control">
                                    <option value="" disabled selected>
                                    </option>
                                    <option value="yes">{{ getTranslation('yes') }}</option>
                                    <option value="no">{{ getTranslation('no') }}</option>
                                </select>
                                @error('pcr_test_details')
                                    <p style="color: red;">{{ $message }}</p>
                                @enderror

                                <label class="col-form-label col-lg-2">{{ getTranslation('phone') }}</label>
                                <input type="text" class="form-control" name="phone" value="{{ old('phone') }}"
                                    placeholder="{{ getTranslation('phone') }}">
                                @error('phone')
                                    <p style="color: red;">{{ $message }}</p>
                                @enderror

                                <!-- Country maydoni -->
                                <label class="col-form-label col-lg-2 mt-2">{{ getTranslation('country') }}</label>
                                <select name="country_id" id="" class="form-control">
                                    <option value="">{{ getTranslation('select_role') }}</option>
                                    @foreach ($countrys as $country)
                                        <option value="{{ $country->id }}"
                                            {{ old('country_id') == $country->id ? 'selected' : '' }}>
                                            {{ $country->label_en }}</option>
                                    @endforeach
                                </select>
                                @error('country_id')
                                    <p style="color: red;">{{ $message }}</p>
                                @enderror

                                <label
                                    class="col-form-label col-lg-2 mt-2">{{ getTranslation('accommodation-details') }}</label>
                                <select name="accommodation_details" id="" class="form-control">
                                    <option value="" disabled selected>
                                        {{ getTranslation('accommodation-details') }}
                                    </option>
                                    @foreach ($hotels as $hotel)
                                        <option value="{{ $hotel->id }}"
                                            {{ old('accommodation_details') == $hotel->id ? 'selected' : '' }}>
                                            {{ getLocale($hotel->title) }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('accommodation_details')
                                    <p style="color: red;">{{ $message }}</p>
                                @enderror


                                <div class="form-group mt-2">
                                    <label
                                        class="col-form-label col-lg-2 mt-2">{{ getTranslation('visa-required') }}</label>
                                    <div class="border p-3 rounded">
                                        <div class="form-check">
                                            <input type="radio" class="form-check-input" name="requires_visa"
                                                {{ old('requires_visa') == 1 ? 'checked' : '' }} value="1"
                                                id="requires_visa_yes">
                                            <label class="form-check-label"
                                                for="requires_visa_yes">{{ getTranslation('yes') }}</label>
                                        </div>

                                        <div class="form-check mb-2">
                                            <input type="radio" class="form-check-input" name="requires_visa"
                                                {{ old('requires_visa') == 0 ? 'checked' : '' }} value="0"
                                                id="requires_visa_no">
                                            <label class="form-check-label"
                                                for="requires_visa_no">{{ getTranslation('no') }}</label>
                                        </div>
                                    </div>
                                </div>

                                <label class="col-form-label col-lg-2">{{ getTranslation('copy-of-passport') }}</label>
                                <input type="file" class="form-control" name="passport_copy"
                                    value="{{ old('passport_copy') }}" onchange="previewImage(event, 'imagePreview')">
                                @error('passport_copy')
                                    <p style="color: red;">{{ $message }}</p>
                                @enderror
                                <div class="mt-2">
                                    <img id="imagePreview" src="" alt="imagePreview"
                                        class="img-thumbnail d-none" width="200">
                                </div>

                                <label
                                    class="col-form-label col-lg-2">{{ getTranslation('photo_for_accreditation') }}</label>
                                <input type="file" class="form-control" name="photo" value="{{ old('photo') }}"
                                    onchange="previewImage(event, 'photo')">
                                @error('photo')
                                    <p style="color: red;">{{ $message }}</p>
                                @enderror
                                <div class="mt-2">
                                    <img id="photo" src="" alt="photo" class="img-thumbnail d-none"
                                        width="200">
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
