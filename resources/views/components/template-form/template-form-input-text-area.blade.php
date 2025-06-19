<!-- Template for input hidden-->

<div class="{{ $grid }}">
    <div class="form-group row">
        <label class="col-sm-3 col-form-label" style="font-size: 1rem; color: #333;">
            {{ $label }}
            @if (!empty($required) && $required)
                <span style="color: red;">*</span>
            @endif
        </label>
        <div class="col-sm-9">
            <textarea name="{{ $name }}" id="{{ $name }}" placeholder="{{ $placeholder }}"
                class="form-control custom-input-height" style="font-size: 1rem; resize: vertical; min-height: 50px;"
                @if (false) required @endif>{{ $value }}</textarea>

            @error($name)
                <small style="color:red; font-family: Arial, sans-serif;">
                    <i class="fas fa-exclamation-circle" style="color:red;"></i>
                    {{ $message }}
                </small>
            @enderror
        </div>
    </div>
</div>
