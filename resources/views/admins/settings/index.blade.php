@extends('main')

@section('content')
<div class="card">
    <h5 class="card-header">Settings Application</h5>
    <div class="card-body">
        <x-form-model header="profile" :hideSubmit="false" action="{{ route('user.profile.update') }}" description="{{ __('settings.profile_description') }}">
            <div class="mb-3 row">
                <label for="{{ 'photo_profile' }}" class="col-sm-2 col-form-label">{{ __('settings.photo_profile') }}:</label>
                <div class="col-sm-10">
                    <div class="input-images"></div>
                    {{-- <input type="file" name="photo_profile" class="form-control" id="{{ $model->name . '-photo_profile'}}"> --}}
                </div>
            </div>
        </x-form-model>
    </div> 
</div>

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