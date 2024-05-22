@extends('main')

@section('content')
<div class="card">
    <h5 class="card-header">Settings Application</h5>
    <div class="card-body">
        @foreach ($settings as $model)
            <x-form-model :header="$model->name" :action="$update_config" description="{{ __('settings.'.$model->name.'_form_description') }}">
                @include('admins.settings.authorizations')
                @include('admins.settings.notifications')
            </x-form-model>
        @endforeach
    </div> 
</div>
@endsection
