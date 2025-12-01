<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Setting;
use Illuminate\Support\Str;

class SettingController extends Controller
{
    public function index()
    {

        // Site SETTINGS
        $headerLogo = Setting::where('key', 'header_logo')->value('value');
        $footerLogo = Setting::where('key', 'footer_logo')->value('value');

        $headerLogoAr = Setting::where('key', 'header_logo_ar')->value('value');
        $footerLogoAr = Setting::where('key', 'footer_logo_ar')->value('value');

        $faviconLogo =  Setting::where('key', 'favicon_logo')->value('value');
        $faviconLogoAr =  Setting::where('key', 'favicon_logo_ar')->value('value');

        $title =  Setting::where('key', 'title')->value('value');
        $title_ar =  Setting::where('key', 'title_ar')->value('value');
        $copy_right_text =  Setting::where('key', 'copy_right_text')->value('value');
        $copy_right_text_ar =  Setting::where('key', 'copy_right_text_ar')->value('value');



        // EMAIL SETTINGS
        $emailSettings = Setting::whereIn('key', [
            'mail_driver',
            'mail_host',
            'mail_port',
            'mail_username',
            'mail_password',
            'mail_encryption',
            'mail_from_address',
            'mail_from_name'
        ])->pluck('value', 'key');

        // Assign email values
        $mail_driver       = $emailSettings['mail_driver'] ?? '';
        $mail_host         = $emailSettings['mail_host'] ?? '';
        $mail_port         = $emailSettings['mail_port'] ?? '';
        $mail_username     = $emailSettings['mail_username'] ?? '';
        $mail_password     = $emailSettings['mail_password'] ?? '';
        $mail_encryption   = $emailSettings['mail_encryption'] ?? '';
        $mail_from_address = $emailSettings['mail_from_address'] ?? '';
        $mail_from_name    = $emailSettings['mail_from_name'] ?? '';

        return view('pages.setting.index', compact('headerLogo', 'headerLogoAr', 'footerLogo', 'footerLogoAr', 'title', 'title_ar', 'faviconLogo', 'faviconLogoAr', 'mail_driver', 'mail_host', 'mail_port', 'mail_username', 'mail_password', 'mail_encryption', 'mail_from_address', 'mail_from_name','copy_right_text','copy_right_text_ar'));
    }

    public function save(Request $request)
    {
        // Validate fields (optional)
        $request->validate([
            'mail_driver' => 'nullable',
            'mail_host' => 'nullable',
            'mail_port' => 'nullable',
            'mail_username' => 'nullable',
            'mail_password' => 'nullable',
            'mail_encryption' => 'nullable',
            'mail_from_address' => 'nullable|email',
            'mail_from_name' => 'nullable',

            'header_logo' => 'nullable|image',
            'footer_logo' => 'nullable|image',
            'favicon_logo' => 'nullable|image',

            'header_logo_ar' => 'nullable|image',
            'footer_logo_ar' => 'nullable|image',
            'favicon_logo_ar' => 'nullable|image',
        ]);


        foreach ($request->except(['_token', 'header_logo', 'footer_logo', 'favicon_logo', 'header_logo_ar', 'footer_logo_ar', 'favicon_logo_ar']) as $key => $value) {
            Setting::updateOrCreate(
                ['key' => $key],
                ['value' => $value]
            );
        }

        /* -------------------------------------------
        SAVE LOGO UPLOADS
    -------------------------------------------- */
        $imageFields = [
            'header_logo',
            'footer_logo',
            'favicon_logo',
            'header_logo_ar',
            'footer_logo_ar',
            'favicon_logo_ar',
        ];

        foreach ($imageFields as $imgField) {

            if ($request->hasFile($imgField)) {

                $file = $request->file($imgField);

                // Generate unique filename with UUID + original extension
                $filename = Str::uuid()->toString() . '.' . $file->getClientOriginalExtension();

                $file->move(public_path('uploads/settings'), $filename);

                $path = 'uploads/settings/' . $filename;

                Setting::updateOrCreate(
                    ['key' => $imgField],
                    ['value' => $path]
                );
            }
        }

        $mailSettings = $request->only([
            'mail_driver',
            'mail_host',
            'mail_port',
            'mail_username',
            'mail_password',
            'mail_encryption',
            'mail_from_address',
            'mail_from_name',
        ]);

        $this->setEnvValue($mailSettings);


        return redirect()->back()->with('success', 'Email Settings Updated Successfully');
    }


    protected function setEnvValue(array $values)
    {
        $envPath = base_path('.env');

        if (!file_exists($envPath)) {
            return false;
        }

        $envContent = file_get_contents($envPath);

        foreach ($values as $key => $value) {
            $pattern = "/^{$key}=.*/m";
            $replacement = "{$key}={$value}";

            if (preg_match($pattern, $envContent)) {
                // Replace existing key
                $envContent = preg_replace($pattern, $replacement, $envContent);
            } else {
                // Add new key
                $envContent .= PHP_EOL . $replacement;
            }
        }

        file_put_contents($envPath, $envContent);

        return true;
    }



}
