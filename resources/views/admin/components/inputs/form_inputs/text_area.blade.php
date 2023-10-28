<div class="{{ $text_grid ?? 'col-md-6' }}  form-group {{ $text_div_class ?? '' }}">
    <label for="{{isset($text_id) ? $text_id : $text_name}}">
        <i class="{{$text_icon ?? ''}}"></i>
        {{$text_label ?? 'Example textarea Label'}}

    </label>
    <span class="text-danger"> {{ isset($text_red_star) ? '*' : ''  }} </span>

    <textarea
        class="form-control {{$text_class ?? ''}}"
        name="{{$text_name ?? ''}}"
        id="{{isset($text_id) ? $text_id : $text_name}}"
        rows="{{$text_rows ?? '3'}}">
        {{$text_value ?? ''}}
    </textarea>

</div>
