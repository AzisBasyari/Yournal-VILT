<?php

namespace App\Http\Controllers;

use App\Models\Catatan;
use Illuminate\Http\Request;

class ManageController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function manage()
    {
        $catatan = Catatan::with('user')->latest()->paginate(5);

        return inertia('manage', [
            'catatan' => $catatan
        ]);
    }

    public function edit(Catatan $catatan)
    {
        $catatan = Catatan::findOrfail($catatan->id)->get();

        return inertia('edit', [
            'catatan' => $catatan
        ]);
    }
}
