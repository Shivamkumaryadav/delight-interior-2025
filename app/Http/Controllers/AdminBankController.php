<?php

namespace App\Http\Controllers;

use App\Models\BankDetail;
use Illuminate\Http\Request;

class AdminBankController extends Controller
{
    public function update(Request $request)
    {
        $request->validate([
            'ifsc_code' => 'nullable|numeric',
            'bank_name' => 'required',
            'branch' => 'required',
            'address' => 'required',
            'account_number' => 'required|numeric'
        ]);
        BankDetail::first()->update([
            'ifsc_code' => $request->ifsc_code,
            'bank_name' => $request->bank_name,
            'branch' => $request->branch,
            'address' => $request->address,
            'account_number' => $request->account_number
        ]);

        session()->flash('success', 'Bank details has been updated');
        return redirect()->route('admin.calculator.show');
    }
}
