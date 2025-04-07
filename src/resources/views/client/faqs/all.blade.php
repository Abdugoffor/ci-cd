@extends('layouts.client')
@section('title', getTranslation('faqs'))
@section('banner')
@endsection
<script>
    document.addEventListener('DOMContentLoaded', function() {
        document.querySelectorAll(".faq-question").forEach((question) => {
            question.addEventListener("click", () => {
                const item = question.parentElement;
                item.classList.toggle("active");
            });
        });
    });
</script>
<style>
    .faq-item {
        border: 1px solid #ddd;
        border-radius: 8px;
        margin-bottom: 10px;
        overflow: hidden;
    }

    .faq-question {
        background: #e6fbfd;
        cursor: pointer;
        padding: 15px 20px;
        font-weight: 500;
        transition: all 0.3s ease;
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .faq-question:hover {
        background: #d3f4fa;
    }

    .faq-answer {
        max-height: 0;
        padding: 0 20px;
        background: #fff;
        border-top: 1px solid #ddd;
        overflow: hidden;
        transition: all 0.3s ease;
    }

    .faq-item.active .faq-answer {
        max-height: 300px;
        padding: 15px 20px;
    }

    .faq-icon {
        width: 20px;
        height: 20px;
        position: relative;
        transition: transform 0.3s ease;
    }

    .faq-icon:before {
        content: '';
        position: absolute;
        width: 10px;
        height: 10px;
        border: solid #5a808b;
        border-width: 0 2px 2px 0;
        transform: rotate(45deg);
        top: 2px;
        left: 4px;
        transition: all 0.3s ease;
    }

    .faq-item.active .faq-icon:before {
        transform: rotate(-135deg);
        top: 8px;
    }
</style>
@section('content')
    <main class="container">
        <section class="register-personal faq-section">
            <h2 class="section-title">{{ getTranslation('ask_question') }}</h2>
            @foreach ($models as $key => $model)
                <div class="faq-item">
                    <div class="faq-question">
                        <span> {{ getLocale($model->question) }}</span>
                        <span class="faq-icon"></span>
                    </div>
                    <div class="faq-answer">
                        {{ getLocale($model->answer) }}
                    </div>
                </div>
            @endforeach
        </section>
    </main>
@endsection
@section('scripts')
@endsection
