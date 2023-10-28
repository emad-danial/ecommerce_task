<?php

use Illuminate\Support\Str;

function uploadImage($image, $dir_name): string
{
    $photo_url       = $image;
    $photo_url_photo = Str::random(30) . '.' . $photo_url->getClientOriginalExtension();
    $photo_url->move(public_path('uploads/' . $dir_name), $photo_url_photo);
    $full_path_photo_url = '/uploads/' . $dir_name . '/' . $photo_url_photo;
    return $full_path_photo_url;
}
