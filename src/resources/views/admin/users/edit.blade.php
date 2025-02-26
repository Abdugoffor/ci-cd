@extends('layouts.admin')
@section('title', 'Пользователи')
@section('content')
    <!-- Content area -->
    <div class="content">
        <div class="card">

            <div class="card-body">

                <form action="{{ route('users.update', $model->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <fieldset class="mb-3">
                        <legend class="text-uppercase font-size-sm font-weight-bold">Basic inputs</legend>

                        <div class="form-group row">
                            <label class="col-form-label col-lg-2">Имя</label>
                            <div class="col-lg-10">
                                <input type="text" class="form-control" name="name" value="{{ $model->name }}"
                                    placeholder="Имя">
                                @error('name')
                                    <p style="color: red;">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-form-label col-lg-2">Роль</label>
                            <div class="col-lg-10">
                                <select name="role" class="form-control">
                                    <option></option>
                                    <option {{ $model->role == 'admin' ? 'selected' : '' }}>admin</option>
                                    <option {{ $model->role == 'moderator' ? 'selected' : '' }}>moderator</option>
                                    <option {{ $model->role == 'user' ? 'selected' : '' }}>user</option>
                                </select>
                                @error('role')
                                    <p style="color: red;">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-form-label col-lg-2">Почта</label>
                            <div class="col-lg-10">
                                <input type="email" class="form-control" name="email" value="{{ $model->email }}"
                                    placeholder="Почта">
                                @error('email')
                                    <p style="color: red;">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-form-label col-lg-2">Пароль</label>
                            <div class="col-lg-10">
                                <input type="password" class="form-control" name="password" placeholder="Пароль">
                                @error('password')
                                    <p style="color: red;">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-form-label col-lg-2">Пароль подтвержденный</label>
                            <div class="col-lg-10">
                                <input type="password" class="form-control" name="password_confirmation"
                                    placeholder="Пароль подтвержденный">
                                @error('password_confirmation')
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
