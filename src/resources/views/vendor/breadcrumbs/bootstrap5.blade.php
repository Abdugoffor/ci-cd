@php
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
            <div>
                <a class="breadcrumb-link" href="{{ $breadcrumb->url }}">
                    {{ mb_strimwidth($breadcrumb->title, 0, 25, '...') }}
                </a>
            </div>
        @else
            <div>{{ mb_strimwidth($breadcrumb->title, 0, 25, '...') }}</div>
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
