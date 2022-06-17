<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\MailSetting;

class MailSettingController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function create()
    {
        $page_title = 'Add Mail Setting';
        return view('admin.mail_setting.create', compact('page_title'));
    }

    public function store(Request $request)
    {
        $validator = $request->validate([
            'mail_mailer' => 'required|max:255',
            'mail_host' => 'required|max:255',
            'mail_port' => 'required|max:255',
            'mail_username' => 'required|max:255',
            'mail_password' => 'required|max:255',
            'mail_encryption' => 'max:255',
            'mail_from_name' => 'max:255',
        ]);

        $model = MailSetting::create([
            'mail_mailer' => $request->mail_mailer,
            'mail_host' => $request->mail_host,
            'mail_port' => $request->mail_port,
            'mail_username' => $request->mail_username,
            'mail_password' => $request->mail_password,
            'mail_encryption' => $request->mail_encryption,
            'mail_from_address' => $request->mail_from_address,
            'mail_from_name' => $request->mail_from_name,
        ]);

        return redirect()->route('mail_setting.edit', $model->id)->with('message', 'Mail Setting Added Successfully !');
    }

    public function edit($id)
    {
        $page_title = 'Edit Mail Setting';
        $mail_setting = MailSetting::where('id', $id)->first();
        return view('admin.mail_setting.edit', compact('mail_setting', 'page_title'));
    }

    public function update(Request $request, $id)
    {
        $validator = $request->validate([
            'mail_mailer' => 'required|max:255',
            'mail_host' => 'required|max:255',
            'mail_port' => 'required|max:255',
            'mail_username' => 'required|max:255',
            'mail_password' => 'required|max:255',
            'mail_encryption' => 'max:255',
            'mail_from_name' => 'max:255',
        ]);

        $model = MailSetting::where('id', $id)->first();
        $model->mail_mailer = $request->mail_mailer;
        $model->mail_host = $request->mail_host;
        $model->mail_port = $request->mail_port;
        $model->mail_username = $request->mail_username;
        $model->mail_password = $request->mail_password;
        $model->mail_encryption = $request->mail_encryption;
        $model->mail_from_address = $request->mail_from_address;
        $model->mail_from_name = $request->mail_from_name;
        $model->update();

        return redirect()->back()->with('message', 'Mail Setting Updated Successfully !');
    }
}
