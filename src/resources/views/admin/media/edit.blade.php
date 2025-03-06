@extends('layouts.admin')
@section('title', getTranslation('media'))
@section('content')
    <!-- Content area -->
    <div class="content">
        <div class="card">
            <div class="card-body">
                <form action="{{ route('media.update', $media->id, false) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <fieldset class="mb-3">
                        <legend class="text-uppercase font-size-sm font-weight-bold">{{ getTranslation('media') }}
                        </legend>

                        <div class="form-group row">
                            <label class="col-form-label col-lg-2">{{ getTranslation('photo') }} 1</label>
                            <div class="col-lg-10">
                                <input type="file" class="form-control" name="photo_1" value="{{ old('photo') }}"
                                    placeholder="{{ getTranslation('photo') }}">
                                @error('photo_1')
                                    <p style="color: red;">{{ $message }}</p>
                                @enderror
                                <img src="{{ asset($media->photo_1) }}" width="100px" class="mt-1" alt="">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-form-label col-lg-2">{{ getTranslation('photo') }} 2</label>
                            <div class="col-lg-10">
                                <input type="file" class="form-control" name="photo_2" value="{{ old('photo') }}"
                                    placeholder="{{ getTranslation('photo') }}">
                                @error('photo_2')
                                    <p style="color: red;">{{ $message }}</p>
                                @enderror
                                <img src="{{ asset($media->photo_2) }}" width="100px" class="mt-1" alt="">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-form-label col-lg-2">{{ getTranslation('photo') }} 3</label>
                            <div class="col-lg-10">
                                <input type="file" class="form-control" name="photo_3" value="{{ old('photo') }}"
                                    placeholder="{{ getTranslation('photo') }}">
                                @error('photo_3')
                                    <p style="color: red;">{{ $message }}</p>
                                @enderror
                                <img src="{{ asset($media->photo_3) }}" width="100px" class="mt-1" alt="">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-form-label col-lg-2">{{ getTranslation('photo') }} 4</label>
                            <div class="col-lg-10">
                                <input type="file" class="form-control" name="photo_4" value="{{ old('photo') }}"
                                    placeholder="{{ getTranslation('photo') }}">
                                @error('photo_4')
                                    <p style="color: red;">{{ $message }}</p>
                                @enderror
                                <img src="{{ asset($media->photo_4) }}" width="100px" class="mt-1" alt="">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-form-label col-lg-2">{{ getTranslation('photo') }} 5</label>
                            <div class="col-lg-10">
                                <input type="file" class="form-control" name="photo_5" value="{{ old('photo') }}"
                                    placeholder="{{ getTranslation('photo') }}">
                                @error('photo_5')
                                    <p style="color: red;">{{ $message }}</p>
                                @enderror
                                <img src="{{ asset($media->photo_5) }}" width="100px" class="mt-1" alt="">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-form-label col-lg-2">{{ getTranslation('photo') }} 6</label>
                            <div class="col-lg-10">
                                <input type="file" class="form-control" name="photo_6" value="{{ old('photo') }}"
                                    placeholder="{{ getTranslation('photo') }}">
                                @error('photo_6')
                                    <p style="color: red;">{{ $message }}</p>
                                @enderror
                                <img src="{{ asset($media->photo_6) }}" width="100px" class="mt-1" alt="">
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
