<div class="{{$select_grid ?? 'col-md-6' }}  form-group {{ $select_div_class ?? '' }}">
    <label
        for="{{ isset($select_id) ? $select_id : $select_name  }}">
        <i class="{{ $select_icon ?? ''  }}"></i>
        {{$select_label ?? 'label'}}

        <span class="text-danger"> {{ isset($select_red_star) ? '*' : ''  }} </span>
    </label>


    <select
        name="{{$select_name ?? ''}}"
        id="{{ isset($select_id) ? $select_id : $select_name  }}"
        class="form-control {{$select_class ?? ''}}"
    >
        {!! $options ?? '' !!}
    </select>

    <span id="{{$select_name}}_input" class="form-text {{ $select_warning_class ?? 'text-danger'  }}">
            {{ $select_warngin_message ?? '' }}
    </span>
</div>


@if(isset($selected_option))
    @push('custom-scripts')
        <script>
            $(document).ready(function () {
                let selected_options = '{{$selected_option}}';
                if (selected_options == 'first_element') {
                    $('#{{$select_name}} option:first').prop('selected', true);
                }
                else {
                    $('#{{$select_name}}').val('{{$selected_option}}')
                }
            })
        </script>
    @endpush
@endif
