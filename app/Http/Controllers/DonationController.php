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
        // 1. Validasi Jumlah Donasi + Metode Pembayaran
        $request->validate([
            'amount'          => 'required|integer|min:10000', // Minimal Rp 10.000
            'payment_method'  => 'required|in:qris,bank_transfer,e_wallet,card',
        ]);

        $amount = $request->amount;
        $user = Auth::user();

        // 2. LOGIKA PERHITUNGAN DAMPAK
        $impactFormula = $program->impact_formula; // Contoh: "Rp 50.000 = 1 Paket Sembako Darurat"
        $impactUnitCost = 0;

        // Asumsi format formula adalah "Rp [COST] = [UNIT]"
        if (preg_match('/Rp\s([\d\.,]+)/', $impactFormula, $matches)) {
            // Bersihkan angka (hapus titik dan koma, lalu konversi ke integer)
            $impactUnitCost = (int) str_replace(['.', ','], '', $matches[1]);
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
                'program_id'      => $program->id,
                'user_id'         => $user->id,
                'donor_name'      => $user->name,
                'donor_email'     => $user->email,
                'tracking_code'   => $trackingCode,
                'amount'          => $amount,
                'payment_method'  => $request->payment_method, // 👈 BARIS PENTING INI
                'status'          => 'verified',
                'created_at'      => now(),
                'updated_at'      => now(),
            ]);

            // Update Collected Amount di Tabel Programs
            DB::table('programs')
                ->where('id', $program->id)
                ->increment('collected_amount', $amount);

            // (opsional) update total_impact_count user kalau nanti kamu punya kolomnya

            DB::commit();

            // 4. Redirect ke halaman Sukses Donasi
            return redirect()
                ->route('donation.success', ['code' => $trackingCode])
                ->with(
                    'success',
                    'Terima kasih! Donasi Anda sebesar Rp ' . number_format($amount, 0, ',', '.') .
                        ' berhasil diproses dan memberikan ' . $impactIncrease . ' unit dampak nyata.'
                );
        } catch (\Exception $e) {
            DB::rollBack();
            // dd($e->getMessage()); // boleh dipakai kalau lagi debug
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
