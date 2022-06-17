<?php 
use App\Models\PageSetting;
use App\Models\Course;
use App\Models\Notification;
use App\Models\Blog;
use App\Models\BookInterview;

function globalData()
{
    $page_settings = PageSetting::get(['parent_slug', 'key', 'value']);
    $home_page_data = [];
    foreach ($page_settings as $key => $page_setting) {
        $home_page_data[$page_setting->key] = $page_setting->value;
    }
    return $home_page_data;
}

function courses($degree)
{
    return $courses = Course::where('degree_slug', $degree)->get(['degree_slug', 'title', 'slug']);
}

function notification($created_by, $notify_id, $type, $message){
    Notification::create([
        'created_by' => $created_by,
        'notify_id' => $notify_id,
        'notify_type' => $type,
        'message' => $message,
    ]);
}

function getNotifications()
{
    return Notification::with('hasReadNotification')->orderby('id', 'desc')->get();
}

function getNotify($notify_id, $notify_type)
{
    if($notify_type=='blog'){
        return Blog::where('id', $notify_id)->first();
    }elseif($notify_type=='book_interview'){
        return BookInterview::where('id', $notify_id)->first();
    }
}