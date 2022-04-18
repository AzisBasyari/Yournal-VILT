<?php

namespace App\Http\Controllers;

use App\Models\Catatan;
use App\Http\Requests\StoreCatatanRequest;
use App\Http\Requests\UpdateCatatanRequest;

class CatatanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $catatan = Catatan::whereBelongsTo(auth()->user())->latest()->paginate(5);

        return inertia('manage', [
            'catatan' => $catatan
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return inertia('create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreCatatanRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCatatanRequest $request)
    {
        $validatedData = $request->validated();
        $validatedData['user_id'] = auth()->user()->id;

        if(Catatan::create($validatedData)){
            return redirect(route('catatan.create'))->with('success', 'Catatan Perjalanan Berhasil Ditambahkan!');
        } else {
            return redirect(route('catatan.create'))->with('error', 'Catatan Perjalanan Gagal Ditambahkan!');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Catatan  $catatan
     * @return \Illuminate\Http\Response
     */
    public function show(Catatan $catatan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Catatan  $catatan
     * @return \Illuminate\Http\Response
     */
    public function edit(Catatan $catatan)
    {
        return inertia('edit', [
            'catatan' => $catatan
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCatatanRequest  $request
     * @param  \App\Models\Catatan  $catatan
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCatatanRequest $request, Catatan $catatan)
    {
        $validatedData = $request->validated();
        
        if(Catatan::where('id', $catatan->id)->update($validatedData)){
            return redirect(route('catatan.index'))->with('success', 'Catatan Perjalanan Berhasil Diedit!');
        } else {
            return redirect(route('catatan.index'))->with('error', 'Catatan Perjalanan Gagal Diedit!');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Catatan  $catatan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Catatan $catatan)
    {
        $catatan = Catatan::findOrfail($catatan->id);

        if($catatan->delete()){
            return redirect(route('catatan.index'))->with('success', 'Catatan berhasil dihapus!');
        } else {
            return redirect(route('catatan.index'))->with('error', 'Catatan gagal dihapus!');
        }
    }
}
