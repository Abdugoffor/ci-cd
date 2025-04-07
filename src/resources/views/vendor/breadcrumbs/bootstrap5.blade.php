@php
    // Faqat bitta element (masalan: Home) bo‘lsa, breadcrumb ko‘rsatilmaydi
    if ($breadcrumbs->count() <= 1) {
        return;
    }
@endphp

<nav aria-label="breadcrumb" class="breadcrumb-wrapper">
    <ol class="custom-breadcrumb">
        @foreach ($breadcrumbs as $breadcrumb)
            @if ($breadcrumb->url && !$loop->last)
                <li><a href="{{ $breadcrumb->url }}">{{ $breadcrumb->title }}</a></li>
            @else
                <li class="active">{{ $breadcrumb->title }}</li>
            @endif
        @endforeach
    </ol>
</nav>

<style>
    .breadcrumb-wrapper {
        margin: 1rem 0;
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }

    .custom-breadcrumb {
        list-style: none;
        display: flex;
        flex-wrap: wrap;
        padding: 0;
        margin: 0;
        font-size: 0.95rem;
    }

    .custom-breadcrumb li {
        display: flex;
        align-items: center;
        color: #555;
    }

    .custom-breadcrumb li+li::before {
        content: "›";
        padding: 0 8px;
        color: #999;
    }

    .custom-breadcrumb li a {
        text-decoration: none;
        color: #007bff;
        transition: color 0.2s;
    }

    .custom-breadcrumb li a:hover {
        color: #0056b3;
        text-decoration: underline;
    }

    .custom-breadcrumb li.active {
        color: #6c757d;
        font-weight: 500;
    }
</style>
