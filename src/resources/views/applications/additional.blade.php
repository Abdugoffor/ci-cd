@extends('layouts.auth')
@section('title', 'Register')
@section('content')
    <div class="content">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">Participant Registration</h5>
            </div>
            <div class="card-body">
                <form action="{{ route('application.store.additional', $application->id) }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    <fieldset class="mb-3">
                        <legend class="text-uppercase font-size-sm font-weight-bold">Регистрация участника</legend>

                        <div class="form-group row">
                            <label class="col-form-label col-lg-2">FIDE ID</label>
                            <div class="col-lg-10">
                                <input type="text" class="form-control" name="fide_id" value="{{ old('fide_id') }}">
                                @error('fide_id')
                                    <p style="color: red;">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-form-label col-lg-2">Тип участника</label>
                            <div class="col-lg-10">
                                <select name="accreditation_category_id" class="form-control">
                                    @foreach ($accreditationCategories as $category)
                                        <option value="{{ $category->id }}"
                                            {{ old('accreditation_category_id') == $category->id ? 'selected' : '' }}>
                                            {{ $category->name['ru'] }}</option>
                                    @endforeach
                                </select>
                                @error('accreditation_category_id')
                                    <p style="color: red;">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-form-label col-lg-2">Страна</label>
                            <div class="col-lg-10">
                                <select name="country_id" class="form-control">
                                    @foreach ($countries as $country)
                                        <option value="{{ $country->id }}">{{ $country->label_ru }}</option>
                                    @endforeach
                                </select>
                                @error('country_id')
                                    <p style="color: red;">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-form-label col-lg-2">Номер паспорта</label>
                            <div class="col-lg-10">
                                <input type="text" class="form-control" name="passport_number"
                                    value="{{ old('passport_number') }}">
                                @error('passport_number')
                                    <p style="color: red;">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-form-label col-lg-2">Дата выдачи паспорта</label>
                            <div class="col-lg-10">
                                <input type="date" class="form-control" name="passport_issue_date"
                                    value="{{ old('passport_issue_date') }}">
                                @error('passport_issue_date')
                                    <p style="color: red;">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-form-label col-lg-2">Дата окончания паспорта</label>
                            <div class="col-lg-10">
                                <input type="date" class="form-control" name="passport_expiry_date"
                                    value="{{ old('passport_expiry_date') }}">
                                @error('passport_expiry_date')
                                    <p style="color: red;">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-form-label col-lg-2">Орган выдачи паспорта</label>
                            <div class="col-lg-10">
                                <input type="text" class="form-control" name="passport_issuing_authority"
                                    value="{{ old('passport_issuing_authority') }}">
                                @error('passport_issuing_authority')
                                    <p style="color: red;">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-form-label col-lg-2">Копия паспорта</label>
                            <div class="col-lg-10">
                                <input type="file" class="form-control" name="passport_copy">
                                @error('passport_copy')
                                    <p style="color: red;">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-form-label col-lg-2">Телефон</label>
                            <div class="col-lg-10">
                                <input type="text" class="form-control" name="phone" value="{{ old('phone') }}">
                                @error('phone')
                                    <p style="color: red;">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-form-label col-lg-2">Фото</label>
                            <div class="col-lg-10">
                                <input type="file" class="form-control" name="photo">
                                @error('photo')
                                    <p style="color: red;">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-form-label col-lg-2">Требуется виза?</label>
                            <div class="col-lg-10">
                                <select name="requires_visa" class="form-control">
                                    <option value="1" {{ old('requires_visa') == '1' ? 'selected' : '' }}>Да</option>
                                    <option value="0" {{ old('requires_visa') == '0' ? 'selected' : '' }}>Нет</option>
                                </select>
                                @error('requires_visa')
                                    <p style="color: red;">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <div class="text-right">
                            <button type="submit" class="btn btn-primary">Отправить <i
                                    class="icon-paperplane ml-2"></i></button>
                        </div>
                    </fieldset>
                </form>

            </div>
        </div>
    </div>

@endsection
