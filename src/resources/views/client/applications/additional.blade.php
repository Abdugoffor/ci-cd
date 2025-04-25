@extends('layouts.client')
@section('title', getTranslation('register_for_accreditation'))
@section('banner')
@endsection
@section('content')
{{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.13/cropper.min.css" /> --}}
<link rel="stylesheet" href="/frontend/cdn/css/cropper.min.css" />
<style>
    .cropper-modal {
        display: none;
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        z-index: 1000;
        background: rgba(0, 0, 0, 0.5);
    }

    .modal-content {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        border-radius: 12px;
        max-width: 700px;
        width: 90%;
        height: 50vh;
        display: flex;
        flex-direction: column;
        background: white;
        z-index: 1;
    }

    .cropper-modal .img-container {
        flex: 1;
        display: flex;
        align-items: center;
        justify-content: center;
        position: relative;
        z-index: 2000;
    }

    .cropper-modal img {
        max-width: 100%;
        max-height: 100%;
        object-fit: contain;
        z-index: 2000;
    }

    .modal-footer {
        padding: 16px 24px;
        border-top: 1px solid #eee;
        text-align: center;
        z-index: 2001;
        position: relative;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .img-container {
        max-width: 600px;
        margin: 20px auto;
        overflow: hidden;
    }

    #preview {
        max-width: 100%;
        height: auto;
        display: none;
    }

    .btn {
        width: 200px;
        background-color: #176670;
        color: white;
        padding: 12px 32px;
        border: none;
        border-radius: 8px;
        cursor: pointer;
        font-size: 15px;
        font-weight: 500;
        transition: all 0.2s ease;
    }

    .close-btn {
        position: absolute;
        right: 20px;
        top: 20px;
        background: none;
        border: none;
        font-size: 24px;
        color: #666;
        cursor: pointer;
        width: 32px;
        height: 32px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        transition: all 0.2s ease;
    }

    .close-btn:hover {
        background: rgba(0, 0, 0, 0.05);
        color: #333;
    }

    .btn:hover {
        background-color: #0f4d54;
        transform: translateY(-1px);
        box-shadow: 0 4px 12px rgba(23, 102, 112, 0.15);
    }

    #previewContainer {
        text-align: center;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    #croppedPreview {
        max-width: 220px;
        max-height: 200px;
        object-fit: contain;
        border-radius: 8px;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
        border: 1px solid #eee;
    }

    #fileNameCrop {
        display: none;
    }

    .cropper-modal {
        opacity: 1;
    }

    .input-wrapper-crop {
        display: flex;
        position: relative;
    }

    .previewabsolute {
        position: absolute;
        right: 0;
        top: 0;
        margin-right: auto;
    }

    @media (max-width:548px) {
        .previewabsolute {
            position: relative;
            margin-left: 20px;
        }
    }
</style>
<main class="container montserrat">
    <section class="register-personal">
        <div class="register-personal-top" style="margin-bottom: 30px">
            <h1>{{ getTranslation('register_for_accreditation') }}</h1>
            <div>
                <img src="{{ asset('frontend/assets/register-page/chess-logo.svg') }}" alt="chess-logo" />
            </div>
        </div>
        @if (isset($notification) && !$errors->any())
            <div class="alert_static" id="alertBox">
                <span>{{ $notification }}</span>
                <button class="close" onclick="closeAlert()">×</button>
            </div>
            <script nonce="{{ request()->attributes->get('csp_nonce') }}">
                function closeAlert() {
                    document.getElementById("alertBox").style.display = "none";
                }
            </script>
        @endif
        <form action="{{ route('application.store.additional', $model->id, false) }}" method="POST"
            enctype="multipart/form-data">
            @csrf

            <div class="personal-info">{{ getTranslation('personal_info') }}</div>
            <div class="group-additional">
                <div class="input-group">

                    <div class="input-wrapper">
                        <label for="first-name" class="input-label">{{ getTranslation('passport-number') }}</label>
                        <input type="text" id="first-name" name="passport_number"
                            placeholder="{{ getTranslation('passport-number') }}" value="{{ old('passport_number') }}"
                            class="input-text" />
                        @error('passport_number')
                            <p style="color: red; font-size:12px;font-weight: 500">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="input-wrapper">
                        <label for="last-name" class="input-label">{{ getTranslation('passport-issue-date') }}</label>
                        <div class="date-container" onclick="openDatePicker('passport_issue_date')">
                            <input type="date" id="passport_issue_date" value="{{ old('passport_issue_date') }}"
                                name="passport_issue_date" class="date-input"
                                onchange="updateDate('passport_issue_date')"
                                oninput="updateDate('passport_issue_date')" />
                            <span id="passport_issue_datePlaceholder" class="placeholder">DD/MM/YYYY</span>
                            <img src="{{ asset('frontend/assets/register-page/calendar-icon.svg') }}"
                                class="calendar-icon" />
                        </div>
                        @error('passport_issue_date')
                            <p style="color: red; font-size:12px;font-weight: 500">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="input-wrapper">
                        <label for="date-of-birth"
                            class="input-label">{{ getTranslation('passport-validity-period') }}</label>
                        <div class="date-container" onclick="openDatePicker('passport_expiry_date')">
                            <input type="date" id="passport_expiry_date" value="{{ old('passport_expiry_date') }}"
                                name="passport_expiry_date" class="date-input"
                                onchange="updateDate('passport_expiry_date')"
                                oninput="updateDate('passport_expiry_date')" />
                            <span id="passport_expiry_datePlaceholder" class="placeholder">DD/MM/YYYY</span>
                            <img src="/{{ 'frontend/assets/register-page/calendar-icon.svg' }}"
                                class="calendar-icon" />
                        </div>
                        @error('passport_expiry_date')
                            <p style="color: red; font-size:12px;font-weight: 500">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="group-additional">
                <div class="input-group">

                    <div class="input-wrapper">
                        <label for="date-of-issue" class="input-label">{{ getTranslation('arrival-date') }}</label>
                        <div class="date-container" onclick="openDatePicker('arrival_details')">
                            <input type="date" id="arrival_details" value="{{ old('arrival_details') }}"
                                name="arrival_details" class="date-input" onchange="updateDate('arrival_details')"
                                oninput="updateDate('arrival_details')" />
                            <span id="arrival_detailsPlaceholder" class="placeholder">DD/MM/YYYY</span>
                            <img src="/{{ 'frontend/assets/register-page/calendar-icon.svg' }}"
                                class="calendar-icon" />
                        </div>
                        @error('arrival_details')
                            <p style="color: red; font-size:12px;font-weight: 500">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="input-wrapper">
                        <label for="date-of-expiry" class="input-label">{{ getTranslation('departure-date') }}</label>
                        <div class="date-container" onclick="openDatePicker('departure_details')">
                            <input type="date" id="departure_details" value="{{ old('departure_details') }}"
                                name="departure_details" class="date-input" onchange="updateDate('departure_details')"
                                oninput="updateDate('departure_details')" />
                            <span id="departure_detailsPlaceholder" class="placeholder">DD/MM/YYYY</span>
                            <img src="/{{ 'frontend/assets/register-page/calendar-icon.svg' }}"
                                class="calendar-icon" />
                        </div>
                        @error('departure_details')
                            <p style="color: red; font-size:12px;font-weight: 500">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="input-wrapper">
                        <div class="input-wrapper">
                            <label for="first-name"
                                class="input-label">{{ getTranslation('passport-issuing-authority') }}</label>
                            <input type="text" id="first-name" name="passport_issuing_authority"
                                placeholder="{{ getTranslation('passport-issuing-authority') }}"
                                value="{{ old('passport_issuing_authority') }}" class="input-text" />
                            @error('passport_issuing_authority')
                                <p style="color: red; font-size:12px;font-weight: 500">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>
            <div class="group-additional">
                <div class="input-group">

                    <div class="input-wrapper">
                        <label for="national-federation"
                            class="input-label">{{ getTranslation('pcr-test-details') }}</label>

                        <select name="pcr_test_details" class="input-select">
                            <option value="" disabled selected>

                            </option>
                            <option value="yes">{{ getTranslation('yes') }}</option>
                            <option value="no">{{ getTranslation('no') }}</option>
                        </select>
                        @error('pcr_test_details')
                            <p style="color: red; font-size:12px;font-weight: 500">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="input-wrapper">
                        <label for="national-federation"
                            class="input-label">{{ getTranslation('accreditation-category') }}</label>

                        <select name="accreditation_category_id" class="input-select">
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
                            <p style="color: red; font-size:12px;font-weight: 500">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="input-wrapper">
                        <label for="first-name" class="input-label">{{ getTranslation('phone') }}</label>
                        <input type="text" id="first-name" value="{{ old('phone') }}" name="phone"
                            placeholder="{{ getTranslation('phone') }}" class="input-text" />
                        @error('phone')
                            <p style="color: red; font-size:12px;font-weight: 500">{{ $message }}</p>
                        @enderror

                    </div>

                </div>
            </div>
            <div class="group-additional">
                <div class="input-group">

                    <div class="input-wrapper">
                        <label for="national-federation"
                            class="input-label">{{ getTranslation('citizenship') }}</label>

                        <select name="country_id" class="input-select">
                            <option value="" disabled selected>
                                {{ getTranslation('citizenship') }}
                            </option>
                            @foreach ($countries as $country)
                                <option value="{{ $country->id }}"
                                    {{ session('player.country') == $country->code3 || old('country_id') == $country->id ? 'selected' : '' }}>
                                    {{ $country->label_en }}
                                </option>
                            @endforeach
                        </select>
                        @error('country_id')
                            <p style="color: red; font-size:12px;font-weight: 500">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="input-wrapper">
                        <label for="national-federation"
                            class="input-label">{{ getTranslation('accommodation-details') }}</label>

                        <select name="accommodation_details" class="input-select">
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
                            <p style="color: red; font-size:12px;font-weight: 500">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="radio-group radio-group-2">
                        <label for="citizenship" class="input-label">{{ getTranslation('visa-required') }} ?
                        </label>
                        <div>
                            <label class="radio-label">
                                <input type="radio" name="requires_visa"
                                    {{ old('requires_visa') == 1 ? 'checked' : '' }} value="1" />
                                <span class="custom-radio"></span>
                                {{ getTranslation('yes_vise') }}
                            </label>
                            <label class="radio-label">
                                <input type="radio" name="requires_visa"
                                    {{ old('requires_visa') == 0 ? 'checked' : '' }} value="0" />
                                <span class="custom-radio"></span>
                                {{ getTranslation('no_visa') }}
                            </label>
                        </div>
                        @error('requires_visa')
                            <p style="color: red; font-size:12px;font-weight: 500">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="group-additional">
                <div class="input-group">

                    <div class="input-wrapper">
                        <label for="issuing-authority"
                            class="input-label">{{ getTranslation('copy-of-passport') }}</label>
                        <div class="file-upload">
                            <input type="file" id="fileInput" value="{{ old('passport_copy') }}"
                                name="passport_copy" class="hidden-input" accept=".jpg, .jpeg, .pdf" />
                            <label for="fileInput" class="file-label">
                                Upload file
                                <span class="file-icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18"
                                        viewBox="0 0 18 18" fill="none">
                                        <path
                                            d="M10.1843 6.05955L4.71295 11.5446L4.70837 11.5401L4.60303 11.6505L4.49821 11.7604L4.434 11.8252L4.43387 11.8251L4.42896 11.8305L4.38879 11.8753L4.38864 11.8751L4.38368 11.8813C4.35497 11.9169 4.33019 11.9545 4.30929 11.9934C3.46714 13.1442 3.56578 14.7683 4.6055 15.8081C5.717 16.9196 7.49656 16.9556 8.65153 15.9171L8.67652 15.8964L8.68199 15.8919L8.687 15.8869L15.287 9.28824L15.287 9.28827L15.2895 9.28567L15.4307 9.13765L15.4307 9.13766L15.4325 9.13571C17.1112 7.31132 17.0658 4.47082 15.2964 2.70141C13.5009 0.90593 10.6024 0.885672 8.78325 2.64117L8.78113 2.64061L8.72033 2.70142L1.55868 9.8644L1.55839 9.86411L1.55121 9.87243L1.49675 9.93552L1.49644 9.93526L1.48983 9.94416C1.28278 10.2232 1.30564 10.619 1.55869 10.872C1.83693 11.1503 2.28806 11.1503 2.56631 10.872L9.71856 3.71977L9.71878 3.72L9.72527 3.7126L9.73019 3.70699L9.84977 3.59331C11.1157 2.45086 13.0692 2.48944 14.2888 3.70904C15.5483 4.96849 15.5483 7.01049 14.2901 8.27016L7.66988 14.8887C7.07208 15.397 6.17405 15.3687 5.60944 14.8041C5.05318 14.2479 5.01754 13.3679 5.50264 12.7704L11.1933 7.06585L11.1936 7.06613L11.2008 7.05778L11.2552 6.99462L11.2555 6.99489L11.2621 6.98597C11.4687 6.70666 11.4454 6.31092 11.192 6.05821L11.1923 6.05792L11.1839 6.05074L11.1208 5.99637L11.121 5.99605L11.1121 5.98946C10.8328 5.78279 10.4371 5.80617 10.1844 6.05954C10.1844 6.05954 10.1844 6.05955 10.1843 6.05955Z"
                                            fill="#176670" stroke="#176670" stroke-width="0.3" />
                                    </svg>
                                </span>
                            </label>
                            <div id="fileName" class="file-name"></div>
                            <div class="accepted-types">

                            </div>
                        </div>
                        @error('passport_copy')
                            <p style="color: red; font-size:12px;font-weight: 500">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="input-wrapper">
                        <label for="national-federation"
                            class="input-label">{{ getTranslation('photo_for_accreditation') }}</label>
                        <div class="input-wrapper-crop">
                            <div class="buttons">
                                <input type="file" id="fileInputCrop" name="photo" class="hidden-input"
                                    accept="image/*" />
                                <label for="fileInputCrop" class="file-label">
                                    Upload file
                                    <span class="file-icon">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18"
                                            viewBox="0 0 18 18" fill="none">
                                            <path
                                                d="M10.1843 6.05955L4.71295 11.5446L4.70837 11.5401L4.60303 11.6505L4.49821 11.7604L4.434 11.8252L4.43387 11.8251L4.42896 11.8305L4.38879 11.8753L4.38864 11.8751L4.38368 11.8813C4.35497 11.9169 4.33019 11.9545 4.30929 11.9934C3.46714 13.1442 3.56578 14.7683 4.6055 15.8081C5.717 16.9196 7.49656 16.9556 8.65153 15.9171L8.67652 15.8964L8.68199 15.8919L8.687 15.8869L15.287 9.28824L15.287 9.28827L15.2895 9.28567L15.4307 9.13765L15.4307 9.13766L15.4325 9.13571C17.1112 7.31132 17.0658 4.47082 15.2964 2.70141C13.5009 0.90593 10.6024 0.885672 8.78325 2.64117L8.78113 2.64061L8.72033 2.70142L1.55868 9.8644L1.55839 9.86411L1.55121 9.87243L1.49675 9.93552L1.49644 9.93526L1.48983 9.94416C1.28278 10.2232 1.30564 10.619 1.55869 10.872C1.83693 11.1503 2.28806 11.1503 2.56631 10.872L9.71856 3.71977L9.71878 3.72L9.72527 3.7126L9.73019 3.70699L9.84977 3.59331C11.1157 2.45086 13.0692 2.48944 14.2888 3.70904C15.5483 4.96849 15.5483 7.01049 14.2901 8.27016L7.66988 14.8887C7.07208 15.397 6.17405 15.3687 5.60944 14.8041C5.05318 14.2479 5.01754 13.3679 5.50264 12.7704L11.1933 7.06585L11.1936 7.06613L11.2008 7.05778L11.2552 6.99462L11.2555 6.99489L11.2621 6.98597C11.4687 6.70666 11.4454 6.31092 11.192 6.05821L11.1923 6.05792L11.1839 6.05074L11.1208 5.99637L11.121 5.99605L11.1121 5.98946C10.8328 5.78279 10.4371 5.80617 10.1844 6.05954C10.1844 6.05954 10.1844 6.05955 10.1843 6.05955Z"
                                                fill="#176670" stroke="#176670" stroke-width="0.3" />
                                        </svg>
                                    </span>
                                </label>
                                @error('photo')
                                    <p style="color: red; font-size:12px;font-weight: 500">{{ $message }}</p>
                                @enderror
                                <div id="fileNameCrop"
                                    style="
                                    display: none;
                                    margin-top: 10px;
                                    font-size: 14px;
                                    color: #176670;
                                  ">
                                </div>
                            </div>

                            <div class="previewabsolute">
                                <div id="previewContainer" style="display: none; position: relative;">
                                    <div style="position: relative; display: inline-block">
                                        <img id="croppedPreview"
                                            style="
                                      box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
                                    " />
                                        <button id="deletePreview"
                                            style="
                                      position: absolute;
                                      top: -10px;
                                      right: -10px;
                                      width: 24px;
                                      height: 24px;
                                      border-radius: 50%;
                                      background: #ff4444;
                                      color: white;
                                      border: none;
                                      cursor: pointer;
                                      display: flex;
                                      align-items: center;
                                      justify-content: center;
                                      font-size: 14px;
                                      box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
                                    "
                                            onclick="deletePreviewImage(event)">
                                            &times;
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div id="cropperModal" class="cropper-modal">
                            <div class="modal-content">
                                <button class="close-btn" type="button" id="closeModal">&times;</button>
                                <div class="img-container">
                                    <img id="preview" src="#" alt="Preview" />
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn"
                                        id="cropBtn">{{ getTranslation('crop_image') }}</button>
                                </div>
                            </div>
                        </div>
                    </div>


                </div>
            </div>
            <div class="terms">
            </div>
            <button type="submit" class="btn">{{ getTranslation('add') }}</button>
        </form>
    </section>
    <div class="toast-container"></div>
</main>
{{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.13/cropper.min.js"></script> --}}
<script src="/frontend/cdn/js/cropper.min.js"></script>
<script nonce="{{ request()->attributes->get('csp_nonce') }}">
    let cropper;
    let croppedImageData = null;
    let currentFileName = "";
    const modal = document.getElementById("cropperModal");
    const preview = document.getElementById("preview");
    const fileInput = document.getElementById("fileInputCrop");
    const cropBtn = document.getElementById("cropBtn");
    const closeBtn = document.getElementById("closeModal");
    const fileNameDisplay = document.getElementById("fileNameCrop");
    const previewContainer = document.getElementById("previewContainer");
    const croppedPreview = document.getElementById("croppedPreview");
    const deletePreviewBtn = document.getElementById("deletePreview");

    fileInput.addEventListener("change", function(e) {
        modal.style.display = "block";
        currentFileName = e.target.files[0].name;
        const file = e.target.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                preview.src = e.target.result;
                preview.style.display = "block";
                if (cropper) {
                    cropper.destroy();
                }
                cropper = new Cropper(preview, {
                    aspectRatio: NaN,
                    viewMode: 2,
                    background: false,
                });
            };
            reader.readAsDataURL(file);
        }
    });

    cropBtn.addEventListener("click", async function() {
        if (!cropper) return;

        try {
            // Get cropped canvas and convert to blob
            const canvas = cropper.getCroppedCanvas();
            const blob = await new Promise((resolve) =>
                canvas.toBlob(resolve, "image/png")
            );

            // Create a File object from the blob
            const file = new File([blob], currentFileName || 'photo.png', {
                type: 'image/png'
            });

            // Create a temporary URL for preview
            const previewUrl = URL.createObjectURL(file);

            // Create a new FileList-like object
            const dataTransfer = new DataTransfer();
            dataTransfer.items.add(file);

            // Set the file to the hidden input
            const croppedInput = document.getElementById("fileInputCrop");
            croppedInput.files = dataTransfer.files;

            // Update UI
            croppedPreview.src = previewUrl;
            previewContainer.style.display = "block";
            // Limit file name to 20 characters, add ellipsis if longer
            fileNameDisplay.textContent = currentFileName.length > 20 ? currentFileName.substring(0, 17) +
                '...' : currentFileName;
            fileNameDisplay.style.display = "block";

            // Clean up
            if (cropper) {
                cropper.destroy();
                cropper = null;
            }
            modal.style.display = "none";
        } catch (error) {
            console.error("Error during crop:", error);
        }
    });

    closeBtn.addEventListener("click", function() {
        modal.style.display = "none";
        if (cropper) {
            cropper.destroy();
            cropper = null;
        }
    });

    function deletePreviewImage(e) {
        e.preventDefault();
        e.stopPropagation();

        // Clear all input values
        document.getElementById("fileInputCrop").value = "";
        croppedImageData = null;
        currentFileName = "";

        // Reset UI
        previewContainer.style.display = "none";
        fileNameDisplay.style.display = "none";
        fileNameDisplay.textContent = "";
        croppedPreview.src = "#";

        // Clear cropper if it exists
        if (cropper) {
            cropper.destroy();
            cropper = null;
        }
    }
</script>
@endsection
