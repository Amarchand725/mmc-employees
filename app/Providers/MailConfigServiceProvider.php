<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use DB;
use Config;

class MailConfigServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        if (\Schema::hasTable('mail_settings')) {
            $mail = DB::table('mail_settings')->first();
            if ($mail) //checking if table is not empty
            {
                $config = array(
                    'driver'     => $mail->mail_mailer,
                    'host'       => $mail->mail_host,
                    'port'       => $mail->mail_port,
                    'from' => ['address' => $mail->mail_username, 'name' => $mail->mail_from_name],
                    'encryption' => $mail->mail_encryption,
                    'username'   => $mail->mail_username,
                    'password'   => $mail->mail_password,
                    'sendmail'   => '/usr/sbin/sendmail -bs',
                    'pretend'    => false,
                );
                Config::set('mail', $config);   
            }
        }
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
