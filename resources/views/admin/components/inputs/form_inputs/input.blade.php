<div class="{{$input_grid ?? 'col-md-6' }}  form-group {{ $input_div_class ?? '' }}">
    <label
        for="{{ isset($input_id) ? $input_id : $input_name  }}">
        <i class="{{ $input_icon ?? ''  }}"></i>
        {{$input_label ?? 'label'}}

        <span class="text-danger"> {{ isset($input_red_star) ? '*' : ''  }} </span>
    </label>

    <input
        name="{{$input_name ?? ''}}"
        id="{{ isset($input_id) ? $input_id : $input_name  }}"
        type="{{$input_type ?? 'text'}}"
        class="form-control {{$input_class ?? ''}}"
        placeholder="{{$input_placeHolder ?? $input_label}}"
        value="{{$input_value ?? ''}}"
    />

    <span id="{{$input_name}}_input" class="form-text input_warning {{ $input_warning_class ?? 'text-danger'  }}">
            {{ $input_warngin_message ?? '' }}
    </span>
</div>
