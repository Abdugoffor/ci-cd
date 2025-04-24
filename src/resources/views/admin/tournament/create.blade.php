@extends('layouts.admin')
@section('title', getTranslation('competitions'))
@section('content')
    <!-- Content area -->
    <div class="content">
        <div class="d-inline-flex gap-2">
            <a href="{{ route('tournaments.index', [], false) }}" class="btn btn-outline-secondary">
                {{ getTranslation('back') }}
            </a>
        </div>
        <div class="card mt-2">

            <div class="card-body">

                <form action="{{ route('tournaments.store', [], false) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <fieldset class="mb-3">
                        <legend class="text-uppercase font-size-sm font-weight-bold">{{ getTranslation('competitions') }}
                        </legend>

                        <div class="form-group row">
                            <div class="card-body">
                                <!-- Tablar qismi -->
                                <ul class="nav nav-tabs mt-2">
                                    @foreach (getLanguage() as $model)
                                        <li class="nav-item">
                                            <a href="#tab-{{ $model->id }}"
                                                class="nav-link {{ $loop->first ? 'active' : '' }}"
                                                data-toggle="tab">{{ $model->name }}</a>
                                        </li>
                                    @endforeach
                                </ul>

                                <!-- Tab ichidagi kontent -->
                                <div class="tab-content">
                                    @foreach (getLanguage() as $model)
                                        <div class="tab-pane fade {{ $loop->first ? 'show active' : '' }}"
                                            id="tab-{{ $model->id }}">
                                            <!-- Name maydoni -->
                                            <label class="col-form-label col-lg-2">{{ getTranslation('name') }}</label>
                                            <input type="text" class="form-control" name="name[{{ $model->slug }}]"
                                                value="{{ old('name.' . $model->slug) }}"
                                                placeholder="{{ $model->name }}">
                                            @error('name.' . $model->slug)
                                                <p style="color: red;">{{ $message }}</p>
                                            @enderror

                                            <!-- Title maydoni -->
                                            <label class="col-form-label col-lg-2">{{ getTranslation('title') }}</label>
                                            <input type="text" class="form-control" name="title[{{ $model->slug }}]"
                                                value="{{ old('title.' . $model->slug) }}"
                                                placeholder="{{ $model->name }}">
                                            @error('title.' . $model->slug)
                                                <p style="color: red;">{{ $message }}</p>
                                            @enderror

                                            <!-- Description maydoni -->
                                            <label
                                                class="col-form-label col-lg-2">{{ getTranslation('description') }}</label>
                                            <textarea class="form-control summernote" name="description[{{ $model->slug }}]" data-dashlane-classification="other"
                                                placeholder="{{ $model->name }}">{{ old('description.' . $model->slug) }}</textarea>
                                            @error('description.' . $model->slug)
                                                <p style="color: red;">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    @endforeach
                                </div>

                                <!-- Category maydoni (ko‘p tilli emas) -->
                                <label class="col-form-label col-lg-2">{{ getTranslation('category') }}</label>
                                <select name="category_id" id="" class="form-control">
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}">{{ getLocale($category->name) }}</option>
                                    @endforeach
                                </select>
                                @error('category_id')
                                    <p style="color: red;">{{ $message }}</p>
                                @enderror

                                <!-- Country maydoni (ko‘p tilli emas) -->
                                <label class="col-form-label col-lg-2">{{ getTranslation('country') }}</label>
                                <select name="country_id" id="" class="form-control">
                                    @foreach ($countries as $country)
                                        <option value="{{ $country->id }}">{{ $country->label_en }}</option>
                                    @endforeach
                                </select>
                                @error('country_id')
                                    <p style="color: red;">{{ $message }}</p>
                                @enderror

                                <!-- Registration Start maydoni (ko‘p tilli emas) -->
                                <label
                                    class="col-form-label col-lg-2">{{ getTranslation('start-of-registration') }}</label>
                                <input class="form-control" type="date" name="registration_start"
                                    value="{{ old('registration_start') }}">
                                @error('registration_start')
                                    <p style="color: red;">{{ $message }}</p>
                                @enderror

                                <!-- Registration End maydoni (ko‘p tilli emas) -->
                                <label
                                    class="col-form-label col-lg-2">{{ getTranslation('registration-completed') }}</label>
                                <input class="form-control" type="date" name="registration_end"
                                    value="{{ old('registration_end') }}">
                                @error('registration_end')
                                    <p style="color: red;">{{ $message }}</p>
                                @enderror

                                <!-- Start Date maydoni (ko‘p tilli emas) -->
                                <label class="col-form-label col-lg-2">{{ getTranslation('start') }}</label>
                                <input class="form-control" type="date" name="start_date"
                                    value="{{ old('start_date') }}">
                                @error('start_date')
                                    <p style="color: red;">{{ $message }}</p>
                                @enderror

                                <!-- End Date maydoni (ko‘p tilli emas) -->
                                <label class="col-form-label col-lg-2">{{ getTranslation('finished') }}</label>
                                <input class="form-control" type="date" name="end_date" value="{{ old('end_date') }}">
                                @error('end_date')
                                    <p style="color: red;">{{ $message }}</p>
                                @enderror

                                <!-- Logo maydoni (ko‘p tilli emas) -->
                                <label class="col-form-label col-lg-2">{{ getTranslation('logo') }}</label>
                                <input class="form-control" type="file" name="logo"
                                    onchange="previewImage(event, 'imagePreview')">
                                @error('logo')
                                    <p style="color: red;">{{ $message }}</p>
                                @enderror
                                <div class="mt-2">
                                    <img id="imagePreview" src="" alt="imagePreview" class="img-thumbnail d-none"
                                        width="200">
                                </div>
                                <!-- Is_active holat kaliti -->
                                <div class="header-elements mt-3">
                                    <label class="custom-control custom-switch custom-control-right">
                                        <input type="hidden" name="is_active" value="0" checked>
                                        <input type="checkbox" name="is_active" class="custom-control-input" value="1">
                                        <span class="custom-control-label">{{ getTranslation('view') }}</span>
                                    </label>
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
<script nonce="{{ request()->attributes->get('csp_nonce') }}">
    $(document).ready(function() {
        $('.summernote').summernote({
            height: 300,
            callbacks: {
                onImageUpload: function(files) {
                    let maxSize = 1 * 1024 * 1024; // 1 MB chegarasi
                    for (let i = 0; i < files.length; i++) {
                        if (files[i].size > maxSize) {
                            alert("Fayl hajmi 1 MB dan oshmasligi kerak!");
                            return false; // Yuklashni to‘xtatish
                        }
                    }

                    // Agar hajmi mos kelsa, faylni yuklash
                    for (let i = 0; i < files.length; i++) {
                        let file = files[i];
                        let reader = new FileReader();
                        reader.onloadend = function() {
                            $('.summernote').summernote('insertImage', reader.result);
                        };
                        reader.readAsDataURL(file);
                    }
                },
                onChange: function(contents, $editable) {
                    // Har safar o‘zgarish bo‘lganda umumiy hajmni tekshirish
                    let totalSize = new Blob([contents]).size;
                    let maxTotalSize = 5 * 1024 * 1024; // Masalan, 5 MB umumiy chegara
                    if (totalSize > maxTotalSize) {
                        alert("Umumiy ma'lumot hajmi 5 MB dan oshmasligi kerak!");
                        $('.summernote').summernote('undo'); // Oxirgi o‘zgarishni bekor qilish
                    }
                }
            }
        });
    });
</script>
