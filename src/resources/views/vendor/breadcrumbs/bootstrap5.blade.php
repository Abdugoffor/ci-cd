@php
    // Faqat bitta element (masalan: Home) bo‘lsa, breadcrumb ko‘rsatilmaydi
    if ($breadcrumbs->count() <= 1) {
        return;
    }
@endphp
<div class="breadcrumb">
    @foreach ($breadcrumbs as $breadcrumb)
        @if (!$loop->first)
            <div>/</div>
        @endif

        @if ($breadcrumb->url && !$loop->last)
            <div><a class="breadcrumb-link" href="{{ $breadcrumb->url }}">{{ $breadcrumb->title }}</a></div>
        @else
            <div>{{ $breadcrumb->title }}</div>
        @endif
    @endforeach
</div>

<style>
    .breadcrumb {
        margin-top: 30px;
    }

    .breadcrumb,
    .breadcrumb-link {
        display: flex;
        gap: 10px;
        color: #5a808b;
        font-size: 14px;
        font-weight: 400;
        line-height: 182%;
        /* 25.48px */
        letter-spacing: -0.14px;
        text-decoration: none;
    }
</style>
