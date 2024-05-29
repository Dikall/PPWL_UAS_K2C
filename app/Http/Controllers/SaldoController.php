<?php

namespace App\Http\Controllers;

use App\Models\Saldo;
use App\Models\User;
use Illuminate\Http\Request;

class SaldoController extends Controller
{
    public function index()
    {
        $saldos = Saldo::with('user')->get();

        return view('saldo.index', compact('saldos'));
    }

    public function create()
    {
        $users = User::all();

        return view('saldo.create', compact('users'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'saldo' => 'required|numeric',
        ]);

        Saldo::create($request->all());

        return redirect()->route('saldo.index');
    }

    public function edit(Saldo $saldo)
    {
        return view('saldo.edit', compact('saldo'));
    }

    public function update(Request $request, Saldo $saldo)
    {
        $request->validate([
            'saldo' => 'required|numeric',
        ]);

        $saldo->update($request->all());

        return redirect()->route('saldo.index');
    }

    public function destroy(Saldo $saldo)
    {
        $saldo->delete();

        return redirect()->route('saldo.index');
    }
}
