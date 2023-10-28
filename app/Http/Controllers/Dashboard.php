<?php

namespace App\Http\Controllers;


use App\Traits\jsonResponseCommon;

class Dashboard extends Controller
{
    use jsonResponseCommon;
    private string $main_path       = "admin.";
    private string $components_path = "components.inputs.tags.";

    protected function getViewPath(string $path): string
    {
        return $this->main_path . $path . ".";
    }

    protected function componentsPath(string $element_path): string
    {
        return $this->main_path . $this->components_path . $element_path;
    }

    protected function viewContent($element_path, $data)
    {
        return view($this->componentsPath($element_path), $data);
    }


}
