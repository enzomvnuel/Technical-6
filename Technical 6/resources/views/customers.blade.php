@extends('layouts.app')

@section('content')
<div class="page-head"><div class="eyebrow">Account management</div><h1>Customer Accounts</h1><p>Customer records retrieved through the Eloquent <code>Customer</code> model.</p></div>
<div class="table-wrap"><table class="data"><thead><tr><th>ID</th><th>Full Name</th><th>Email</th><th>Phone</th></tr></thead><tbody>
@foreach ($customers as $customer)
<tr><td class="id">{{ $customer->id }}</td><td>{{ $customer->full_name }}</td><td>{{ $customer->email }}</td><td>{{ $customer->phone }}</td></tr>
@endforeach
</tbody></table></div>
@endsection
