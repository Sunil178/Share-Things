<?php

use Illuminate\Support\Facades\Storage;

function storeDocument($file, $path = 'public/files') {
    $haystack = $file->store($path);
    $needle = "public/";
    $pos = strpos($haystack, "public/");
    if ($pos !== false) {
        return substr_replace($haystack, "storage/", $pos, strlen($needle));
    }
    return null;
}

function deleteDocument($haystack) {
    if ($haystack) {
        $needle = "storage/";
        $pos = strpos($haystack, "storage/");
        if ($pos !== false) {
            $path = substr_replace($haystack, "public/", $pos, strlen($needle));
            Storage::delete($path);
        }
    }
    return null;
}

function back() {
    $previous_url = request()->server->get('HTTP_REFERER');
    return redirect($previous_url);
}

function old($key = null, $default = null)
{
    return app('request')->old($key, $default);
}

function session($key = null, $default = null)
{
    if (is_null($key)) {
        return app('session');
    }

    if (is_array($key)) {
        return app('session')->put($key);
    }

    return app('session')->get($key, $default);
}

function bladeMessage($key, $class) {
    $html = "";
    if (session()->has($key)) {
        $messages = session($key);
        if ($messages) {
            if (is_string($messages)) {
                $html .= "<div class=\"alert alert-$class w-50\">$messages</div>";
            } else {
                foreach ($messages->all() as $message) {
                    $html .= "<div class=\"alert alert-$class w-50\">$message</div>";
                }
            }
        }
    }
    echo $html;
}

function bladeErrorMessage() {
    bladeMessage('errors', 'danger');
}

function bladeSuccessMessage() {
    bladeMessage('success', 'success');
}
