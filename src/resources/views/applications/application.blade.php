@extends('layouts.auth')
@section('title', 'Application-create')
@section('content')
    <div class="content">
        <div class="card">
            <div class="card-header">
            </div>

            <div class="card-body">

                <form action="{{ route('application.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <fieldset class="mb-3">
                        <legend class="text-uppercase font-size-sm font-weight-bold">Регистрация участника</legend>
                        <input type="hidden" name="tournament_id" value="{{ $application->id }}" id="">
                        <div class="form-group row">
                            <label class="col-form-label col-lg-2">Имя</label>
                            <div class="col-lg-10">
                                <input type="text" class="form-control" name="first_name"
                                    value="{{ old('first_name') }}">
                                @error('first_name')
                                    <p style="color: red;">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-form-label col-lg-2">Фамилия</label>
                            <div class="col-lg-10">
                                <input type="text" class="form-control" name="last_name" value="{{ old('last_name') }}">
                                @error('last_name')
                                    <p style="color: red;">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-form-label col-lg-2">Дата рождения</label>
                            <div class="col-lg-10">
                                <input type="date" class="form-control" name="date_of_birth"
                                    value="{{ old('date_of_birth') }}">
                                @error('date_of_birth')
                                    <p style="color: red;">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-form-label col-lg-2">Пол</label>
                            <div class="col-lg-10">
                                <select name="gender" class="form-control">
                                    <option value="M" {{ old('gender') == 'M' ? 'selected' : '' }}>Мужчина</option>
                                    <option value="F" {{ old('gender') == 'F' ? 'selected' : '' }}>Женщина</option>
                                </select>
                                @error('gender')
                                    <p style="color: red;">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-form-label col-lg-2">Электронная почта</label>
                            <div class="col-lg-10">
                                <input type="email" class="form-control" name="email" value="{{ old('email') }}">
                                @error('email')
                                    <p style="color: red;">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <div class="text-right">
                            <button type="submit" class="btn btn-primary">Отправить заявку</button>
                        </div>
                    </fieldset>
                </form>

            </div>
        </div>

    </div>
@endsection
