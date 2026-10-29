@extends('layouts.app')

@section('content')
<div class="page-head"><div class="eyebrow">Account management</div><h1>User Accounts</h1><p>User records retrieved through the Eloquent <code>User</code> model.</p></div>
<div class="table-wrap"><table class="data"><thead><tr><th>ID</th><th>Username</th><th>Full Name</th></tr></thead><tbody>
@foreach ($users as $user)
<tr><td class="id">{{ $user->id }}</td><td>{{ $user->username }}</td><td>{{ $user->full_name }}</td></tr>
@endforeach
</tbody></table></div>
@endsection
