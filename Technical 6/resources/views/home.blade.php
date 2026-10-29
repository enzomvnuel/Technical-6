@extends('layouts.app')

@section('content')
<section class="hero">
    <div>
        <div class="eyebrow">Laravel point of sale foundations</div>
        <h1>Simple pages. Clear MVC structure.</h1>
        <p>A four-page POS foundation built with Laravel routes, controllers, Blade views, and temporary static PHP arrays.</p>
        <a class="button" href="{{ url('/customers') }}">View customer accounts</a>
    </div>
    <div class="hero-card"><div class="mini">SYSTEM STATUS</div><div class="metric">04</div><div class="metric-label">connected application pages</div></div>
</section>
<section class="grid">
    <div class="card"><h3>Route driven</h3><p>Every page is connected through a named route in <code>routes/web.php</code>.</p></div>
    <div class="card"><h3>Controller ready</h3><p>Controllers prepare the page response and pass data to Blade views.</p></div>
    <div class="card"><h3>Easy to extend</h3><p>Static records can later be replaced with models and database queries.</p></div>
</section>
@endsection
