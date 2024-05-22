@if($model && $model->name == 'authorizations')
<input type="hidden" name="settings" value="{{ $model->name }}">
<div class="mb-3 row">
    <label for="{{ $model->name . '-field'}}" class="col-sm-2 col-form-label">{{ __('settings.field_identifier') }}:</label>
    <div class="col-sm-10">
        <input type="text" name="custom_auth_field" class="form-control" id="{{ $model->name . '-field'}}" value="{{ $model->values->custom_auth_field ?? '' }}">
    </div>
</div>
<div class="mb-3 row">
    <label for="{{ $model->name . '-password'}}" class="col-sm-2 col-form-label">{{ __('settings.field_password_identifier') }}:</label>
    <div class="col-sm-10">
        <input type="text" name="custom_auth_field_password" class="form-control" id="{{ $model->name . '-password'}}" value="{{ $model->values->custom_auth_field_password ?? '' }}">
    </div>
</div>
<hr>
<div class="mb-3 row">
    <div class="col-sm-12">
        <div class="form-check form-switch">
            <input class="form-check-input" name="enable_registration" type="checkbox" id="{{ $model->name . '-enable_registration'}}" {{ $model->values->enable_registration ? 'checked' : '' }}>
            <label for="{{ $model->name . '-enable_registration'}}" class="form-check-label">{{ __('settings.enable_registration') }}</label>
        </div>
    </div>
</div>
<div class="mb-3 row">
    <div class="col-sm-12">
        <div class="form-check form-switch">
            <input class="form-check-input" name="enable_forgot_password" type="checkbox" id="{{ $model->name . '-enable_forgot_password'}}" {{ $model->values->enable_forgot_password ? 'checked' : '' }}>
            <label for="{{ $model->name . '-enable_forgot_password'}}" class="form-check-label">{{ __('settings.enable_forgot_password') }}</label>
        </div>
    </div>
</div>
<div class="mb-3 row">
    <div class="col-sm-12">
        <div class="form-check form-switch">
            <input class="form-check-input" name="enable_reset_password" type="checkbox" id="{{ $model->name . '-enable_reset_password'}}" {{ $model->values->enable_reset_password ? 'checked' : '' }}>
            <label for="{{ $model->name . '-enable_reset_password'}}" class="form-check-label">{{ __('settings.enable_reset_password') }}</label>
        </div>
    </div>
</div>
<div class="mb-3 row">
    <div class="col-sm-12">
        <div class="form-check form-switch">
            <input class="form-check-input" name="enable_change_password" type="checkbox" id="{{ $model->name . '-enable_change_password'}}" {{ $model->values->enable_change_password ? 'checked' : '' }}>
            <label for="{{ $model->name . '-enable_change_password'}}" class="form-check-label">{{ __('settings.enable_change_password') }}</label>
        </div>
    </div>
</div>
@endif
