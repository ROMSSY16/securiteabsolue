<?php

use App\Models\Post;
use App\Models\Service;
use App\Models\Settings;
use App\Models\Apparence;

function getServices(){
    $services = Service::get();
    return $services;
}
function getBlogs(){
    $recent_blogs = Post::limit(3)->get();
    return $recent_blogs;
}
if (!function_exists('getServiceById')) {
    function getServiceById($id)
    {
        return Service::find($id);
    }
}
function apparence(){
    $apparence = Apparence::find(1);
    return $apparence;
}
function settings(){
    $settings = Settings::find(1);
    return $settings;
}