@extends('layouts.client')
@section('banner')
@endsection
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" />
<link rel="stylesheet" href="style.css" />
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" defer></script>
@section('content')
    <main class="container">
        <section class="register-personal mb-5">
            <h2 class="section-title">{{ getTranslation('ask_question') }}</h2>
            <div class="accordion mb-5 mt-5" id="faqAccordion">
                @foreach ($models as $key => $model)
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button" type="button" data-bs-toggle="collapse"  style="background-color: #e6fbfd; !important"
                                data-bs-target="#faq{{ $model->id }}">
                                {{ getLocale($model->question) }}
                            </button>
                        </h2>
                        <div id="faq{{ $model->id }}" class="accordion-collapse collapse {{ $key === 0 ? 'show' : '' }}"
                            data-bs-parent="#faqAccordion">
                            <div class="accordion-body">
                                {{ getLocale($model->answer) }}
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </section>
    </main>
@endsection
