<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class WebController extends Controller
{
    // 1. HOME PAGE: Menampilkan Impact, Program, DAN PARTNER (Sesuai Request)
    public function home(Request $request)
    {
        // 1. Ambil Statistik
        $stats = [
            'total_donasi' => DB::table('programs')->sum('collected_amount'),
            'program_aktif' => DB::table('programs')->where('is_active', true)->count(),
            'penerima_manfaat' => 1540,
            'donatur' => DB::table('donations')->count()
        ];

        // 2. LOGIKA PENCARIAN (SEARCH)
        $query = DB::table('programs');

        if ($request->has('search')) {
            $keyword = $request->input('search');
            // Cari berdasarkan Judul ATAU Kategori
            $query->where(function ($q) use ($keyword) {
                $q->where('title', 'like', "%{$keyword}%")
                    ->orWhere('category', 'like', "%{$keyword}%");
            });
        }

        $programs = $query->orderBy('id', 'desc')->get();

        // 3. Ambil Partner
        $partners = DB::table('partners')->get();

        return view('home', compact('stats', 'programs', 'partners'));
    }

    // 2. TRACKING SYSTEM: Cek status donasi & bukti
    public function track(Request $request)
    {
        $code = $request->input('code');
        $data = null;

        // LOGIKA PEMERIKSAAN LOGIN SEBELUM MELACAK DIMULAI
        if ($code) {
            // Jika ada kode yang dikirim (tombol 'Lacak Sekarang' ditekan), cek apakah user sudah login
            if (!Auth::check()) {
                // Jika belum login, redirect ke halaman login dengan pesan
                return redirect()->route('login')->with('info', 'Anda harus masuk untuk melacak detail donasi.');
            }

            // Jika sudah login, lanjutkan proses pelacakan
            $data = DB::table('donations')
                ->join('programs', 'donations.program_id', '=', 'programs.id')
                ->select('donations.*', 'programs.title as program_title')
                ->where('tracking_code', $code)->first();
        }

        // Halaman tetap dapat diakses publik, tetapi data hanya diproses jika sudah login
        return view('track', compact('data', 'code'));
    }

    // 3. PROGRAM DETAIL: Lengkap dengan Storytelling, Peta, Allocations
    public function program($id)
    {
        $program = DB::table('programs')->find($id);
        $updates = DB::table('program_updates')->where('program_id', $id)->get();
        $allocations = DB::table('fund_allocations')->where('program_id', $id)->get();

        return view('program', compact('program', 'updates', 'allocations'));
    }

    // 4. FITUR BARU: SUBSCRIBE / REMINDER DONASI
    public function subscribe(Request $request, $id)
    {
        // CEK LOGIN DULU (Middleware harusnya sudah memproteksi, tapi diletakkan di sini untuk keamanan)
        if (!Auth::check()) {
            return redirect()->route('login')->with('info', 'Silakan Login untuk subscribe program.');
        }

        $userId = Auth::id();

        $exists = DB::table('subscriptions')
            ->where('user_id', $userId)
            ->where('program_id', $id)
            ->exists();

        if (!$exists) {
            DB::table('subscriptions')->insert([
                'user_id' => $userId,
                'program_id' => $id,
                'notify_updates' => true,
                'created_at' => now()
            ]);
            return back()->with('success', 'Berhasil Subscribe!');
        }

        return back()->with('info', 'Anda sudah berlangganan.');
    }

    // 5. USER DASHBOARD: Impact Tracker, History, DAN LIST SUBSCRIPTION
    public function dashboard()
    {
        // CEK LOGIN
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        $user_id = Auth::id();

        $donations = DB::table('donations')->join('programs', 'donations.program_id', '=', 'programs.id')
            ->select('donations.*', 'programs.title')
            ->where('user_id', $user_id)->get();

        $subscriptions = DB::table('subscriptions')
            ->join('programs', 'subscriptions.program_id', '=', 'programs.id')
            ->select('programs.title', 'programs.id')
            ->where('subscriptions.user_id', $user_id)
            ->get();

        $impact_count = $donations->count() * 5;

        return view('dashboard', compact('donations', 'impact_count', 'subscriptions'));
    }


    // 6. ABOUT PAGE: Legalitas DAN TIM (Behind the System)
    public function about()
    {
        $legals = DB::table('legal_documents')->get();
        $teams = DB::table('team_members')->get();

        return view('about', compact('legals', 'teams'));
    }

    // 7. DUMMY REPORT
    public function dummyReport()
    {
        return view('donation_report_dummy');
    }
}
