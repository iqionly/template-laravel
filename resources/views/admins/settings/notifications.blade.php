@if($model && $model->name == 'notifications')
<input type="hidden" name="settings" value="{{ $model->name }}">
<div class="mb-3 row">
    <div class="col-sm-12">
        <div class="form-check form-switch">
            <input class="form-check-input" name="enable_sms_notification" type="checkbox" id="{{ $model->name . '-enable_sms_notification'}}" {{ $model->values->enable_sms_notification ? 'checked' : '' }}>
            <label for="{{ $model->name . '-enable_sms_notification'}}" class="form-check-label">{{ __('settings.enable_sms_notification') }}</label>
        </div>
    </div>
</div>
<div class="mb-3 row">
    <div class="col-sm-12">
        <div class="form-check form-switch">
            <input class="form-check-input" name="enable_push_notification" type="checkbox" id="{{ $model->name . '-enable_push_notification'}}" {{ $model->values->enable_push_notification ? 'checked' : '' }}>
            <label for="{{ $model->name . '-enable_push_notification'}}" class="form-check-label">{{ __('settings.enable_push_notification') }}</label>
        </div>
    </div>
</div>
<div class="mb-3 row">
    <div class="col-sm-12">
        <div class="form-check form-switch">
            <input class="form-check-input" name="enable_email_notification" type="checkbox" id="{{ $model->name . '-enable_email_notification'}}" {{ $model->values->enable_email_notification ? 'checked' : '' }}>
            <label for="{{ $model->name . '-enable_email_notification'}}" class="form-check-label">{{ __('settings.enable_email_notification') }}</label>
        </div>
    </div>
</div>
@endif
