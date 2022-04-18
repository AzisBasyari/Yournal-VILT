<?php

namespace App\Http\Controllers;

use App\Models\Catatan;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {

        $catatan = Catatan::whereBelongsTo(auth()->user())->latest()->paginate(9);

        return inertia('home', [
            'catatan' => $catatan
        ]);
    }
}
