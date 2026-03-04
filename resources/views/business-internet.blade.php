@extends('layouts.app')

@section('title', 'Business Internet | ' . ($siteSettings['site_name'] ?? 'Livenet Solutions'))
@section('meta_description', 'Business internet plans. Dedicated bandwidth, SLA-backed uptime, priority support.')

@section('content')
<section class="page-title" style="background-image: url({{ asset('images/background/pattern-1.png') }}); padding: 80px 0 60px;">
    <div class="auto-container">
        <h1 class="sec-title_heading">Business Internet</h1>
        <p class="sec-title_text">Dedicated bandwidth, SLA-backed uptime, and priority support so your business stays online.</p>
    </div>
</section>

<section class="service-one py-5">
    <div class="auto-container">
        <h2 class="sec-title_heading text-center mb-4">Business Plans</h2>
        <div class="row g-0">
            @forelse($businessPlans ?? collect() as $plan)
            <div class="col-lg-4 col-md-6 col-sm-12 mb-4">
                <div class="service-block_one-inner h-100 p-4">
                    @if($plan->image ?? null)
                    <div class="mb-3"><img src="{{ asset('storage/' . $plan->image) }}" alt="" class="img-fluid rounded" style="max-height:180px;object-fit:cover;width:100%;"></div>
                    @endif
                    @if($plan->badge ?? null)<span class="badge bg-primary mb-2">{{ $plan->badge }}</span>@endif
                    <h4 class="service-block_one-heading">{{ $plan->name }}</h4>
                    <p class="mb-2"><strong>{{ $plan->currency ?? 'KES' }} {{ number_format($plan->price) }}</strong>/mo</p>
                    @if($plan->speed ?? null)<p class="text-muted small">{{ $plan->speed }}</p>@endif
                    <ul class="list-unstyled small mb-3">
                        @foreach($plan->features_list ?? [] as $f)<li><i class="fa fa-check text-success me-2"></i>{{ $f }}</li>@endforeach
                    </ul>
                    <a href="#" class="btn btn-primary js-open-apply-modal">Apply for Connection</a>
                </div>
            </div>
            @empty
            <div class="col-12 text-center py-5">
                <p>Business plans are being updated. <a href="{{ route('contact') }}">Contact us</a> for details.</p>
            </div>
            @endforelse
        </div>
    </div>
</section>
@endsection
