@extends('page')

@section('content')
<div class="card w-50 m-auto">
    <h5 class="card-header">Login Application</h5>
    <div class="card-body">
        <form method="POST" action="{{ route('login') }}">
            @csrf
            @if($errors->any())
                @foreach($errors->all() as $error)
                    <div class="alert alert-danger" role="alert">
                        {{ __($error) }}
                    </div>
                    @break
                @endforeach
            @endif
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group mt-2">
                        <label for="{{ customFieldIdentifier() }}">{{ customFieldIdentifierLabel() }}</label>
                        <input type="{{ customFieldIdentifier() != 'email' ? 'text' : 'email' }}" class="form-control" id="{{ customFieldIdentifier() }}" name="{{ customFieldIdentifier() }}" value="{{ old(customFieldIdentifier()) }}" required>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group mt-2">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" id="password" name="{{ customFieldPasswordIdentifier() }}" required>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col d-grid gap-2 d-md-flex justify-content-md-end">
                    <button type="reset" class="btn btn-secondary mt-2">Reset</button>
                    <button type="submit" class="btn btn-primary mt-2">Login</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection