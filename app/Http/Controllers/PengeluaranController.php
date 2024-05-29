<?php

namespace App\Http\Controllers;

use App\Models\Pengeluaran;
use App\Models\Saldo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PengeluaranController extends Controller
{
    public function index()
    {
        $user_id = Auth::id();

        $pengeluarans = Pengeluaran::join('saldos', 'pengeluarans.user_id', '=', 'saldos.user_id')
            ->select('pengeluarans.*', 'saldos.saldo')
            ->where('pengeluarans.user_id', $user_id)
            ->get();

        return view('pengeluaran.index', compact('pengeluarans'));
    }

    public function create()
    {
        return view('pengeluaran.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'tanggal_transaksi' => 'required|date',
            'total_pengeluaran' => 'required|numeric',
            'metode_pembayaran' => 'required|string',
            'catatan' => 'nullable|string',
        ]);

        $user_id = Auth::id();

        // Update saldo directly in the database
        DB::beginTransaction();
        try {
            $pengeluaran = new Pengeluaran($request->all());
            $pengeluaran->user_id = $user_id;
            $pengeluaran->save();

            // Subtract the expense amount from the saldo
            DB::table('saldos')->where('user_id', $user_id)->decrement('saldo', $request->total_pengeluaran);

            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();

            return redirect()->route('pengeluaran.index')->with('error', 'Failed to save expense.');
        }

        return redirect()->route('pengeluaran.index')->with('success', 'Expense saved successfully.');
    }

    public function edit(Pengeluaran $pengeluaran)
    {
        if ($pengeluaran->user_id !== Auth::id() || $pengeluaran->update_count >= 3) {
            return redirect()->route('pengeluaran.index');
        }

        return view('pengeluaran.edit', compact('pengeluaran'));
    }

    public function update(Request $request, Pengeluaran $pengeluaran)
    {
        if ($pengeluaran->user_id !== Auth::id() || $pengeluaran->update_count >= 3) {
            return redirect()->route('pengeluaran.index');
        }

        $request->validate([
            'tanggal_transaksi' => 'required|date',
            'total_pengeluaran' => 'required|numeric',
            'metode_pembayaran' => 'required|string',
            'catatan' => 'nullable|string',
        ]);

        $pengeluaran->update($request->all());
        $pengeluaran->increment('update_count');
        $pengeluaran->save();

        return redirect()->route('pengeluaran.index');
    }

    public function destroy(Pengeluaran $pengeluaran)
    {
        if ($pengeluaran->user_id === Auth::id()) {
            $pengeluaran->delete();
        }

        return redirect()->route('pengeluaran.index');
    }
}
