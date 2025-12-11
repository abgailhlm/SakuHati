<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Program;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class DonationController extends Controller
{
    /**
     * Menampilkan halaman checkout (meminta jumlah donasi).
     */
    public function checkout(Program $program)
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        return view('checkout', [
            'program' => $program
        ]);
    }

    /**
     * Memproses donasi instan.
     */
    public function processDonation(Request $request, Program $program)
    {
        // 1. Validasi Jumlah Donasi
        $request->validate([
            'amount' => 'required|integer|min:10000', // Minimal Rp 10.000
        ]);

        $amount = $request->amount;
        $user = Auth::user();

        // 2. LOGIKA PERHITUNGAN DAMPAK (BARU)
        $impactFormula = $program->impact_formula; // Contoh: "Rp 50.000 = 1 Paket Sembako Darurat"
        $impactUnitCost = 0;

        // Asumsi format formula adalah "Rp [COST] = [UNIT]"
        if (preg_match('/Rp\s([\d\.,]+)/', $impactFormula, $matches)) {
            // Bersihkan angka (hapus titik dan koma, lalu konversi ke integer)
            $impactUnitCost = (int)str_replace(['.', ','], '', $matches[1]);
        }

        $impactIncrease = 0;
        if ($impactUnitCost > 0) {
            // Hitung berapa unit dampak yang diberikan oleh donasi ini
            $impactIncrease = floor($amount / $impactUnitCost);
        }


        // 3. Simulasikan Proses Pembayaran dan Penyimpanan
        try {
            DB::beginTransaction();

            // Simulasikan Pembuatan Tracking Code
            $trackingCode = 'TRX-' . time() . rand(100, 999);

            // Simpan ke Tabel Donations
            DB::table('donations')->insert([
                'program_id' => $program->id,
                'user_id' => $user->id,
                'donor_name' => $user->name,
                'donor_email' => $user->email,
                'tracking_code' => $trackingCode,
                'amount' => $amount,
                'status' => 'verified',
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            // Update Collected Amount di Tabel Programs
            DB::table('programs')->where('id', $program->id)->increment('collected_amount', $amount);

            /*
             * LOGIKA AKUMULASI GLOBAL (PENTING):
             * Asumsi ada tabel 'statistics' atau kolom di 'users' yang menyimpan total dampak.
             * Jika Anda memiliki kolom `total_donated` di tabel `users` atau `total_impact_count` 
             * di tabel `statistics`, Anda harus menambahkannya di sini.
             */

            // Contoh Update Total Dampak di tabel user (Jika ada kolom 'total_impact_count')
            // DB::table('users')->where('id', $user->id)->increment('total_impact_count', $impactIncrease);

            DB::commit();

            // 4. Redirect ke halaman Sukses Donasi
            return redirect()->route('donation.success', ['code' => $trackingCode])
                ->with('success', 'Terima kasih! Donasi Anda sebesar Rp ' . number_format($amount) . ' berhasil diproses dan memberikan ' . $impactIncrease . ' unit dampak nyata.');
        } catch (\Exception $e) {
            DB::rollBack();
            // Anda dapat log $e untuk debugging
            return back()->with('error', 'Pembayaran gagal. Silakan coba lagi.');
        }
    }

    /**
     * Menampilkan halaman sukses setelah donasi.
     */
    public function success(Request $request)
    {
        if (!$request->code) {
            return redirect()->route('home')->with('error', 'Akses tidak sah ke halaman sukses.');
        }

        return view('donation_success', [
            'trackingCode' => $request->code
        ]);
    }
}
