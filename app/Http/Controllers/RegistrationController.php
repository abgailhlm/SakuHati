<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\App; // tambahkan
// use Illuminate\Support\Facades\Session; // optional

class RegistrationController extends Controller
{
    public function show(Request $request)
    {
        // Jika ada parameter lang di URL seperti /register?lang=tl — simpan di session dan langsung set locale
        if ($request->has('lang')) {
            $locale = $request->get('lang');
            if (in_array($locale, ['id', 'en', 'tl'])) {
                session(['locale' => $locale]);
                App::setLocale($locale);
            }
        } else {
            // jika session sudah ada, set juga agar view langsung memakai locale
            if (session()->has('locale')) {
                App::setLocale(session('locale'));
            }
        }

        // daftar jurusan sederhana
        $majors = [
            'ti' => __('form.majors.ti'),
            'si' => __('form.majors.si'),
            'tk' => __('form.majors.tk'),
        ];

        return view('register', compact('majors'));
    }

    // ... method submit() tetap seperti sebelumnya ...
    public function submit(Request $request)
    {
        // validasi
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);

        // Simpan user
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);

        return redirect('/login')->with('success', 'Registrasi berhasil');
    }
}
