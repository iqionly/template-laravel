@extends('main')

@section('content')
<div class="card">
    <h5 class="card-header">Manage User</h5>
    <div class="card-body">
        <x-user-table-component />
    </div>
</div>
@endsection
