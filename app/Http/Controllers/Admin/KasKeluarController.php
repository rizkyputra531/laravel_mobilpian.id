<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\KasKeluarEditRequest;
use App\Http\Requests\KasKeluarRequest;
use App\Models\KasKeluar;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class KasKeluarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // script untuk datatables, AJAX
        if (request()->ajax()) {
            $query = KasKeluar::query();

            return DataTables::of($query)
                ->addColumn('action', function ($kaskeluar) {
                    return '
                        <a class="block w-full px-2 py-1 mb-1 text-xs text-center text-white transition duration-500 bg-gray-700 border border-gray-700 rounded-md select-none ease hover:bg-gray-800 focus:outline-none focus:shadow-outline"
                            href="' . route('admin.kaskeluars.edit', $kaskeluar->id) . '">
                            Edit
                        </a>
                        <form class="block w-full" onsubmit="return confirm(\'Apakah anda yakin?\');" -block" action="' . route('admin.kaskeluars.destroy', $kaskeluar->id) . '" method="POST">
                        <button class="w-full px-2 py-1 text-xs text-white transition duration-500 bg-red-500 border border-red-500 rounded-md select-none ease hover:bg-red-600 focus:outline-none focus:shadow-outline" >
                            Hapus
                        </button>
                            ' . method_field('delete') . csrf_field() . '
                        </form>';
                })
                ->rawColumns(['action'])
                ->make();
        }


        // script untuk return halaman view brand
        return view('admin.kaskeluars.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.kaskeluars.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(KasKeluarRequest $request)
    {
        //
        $data = $request->all();
        // $data['slug'] = Str::slug($data['name']) . '-' . Str::lower(Str::random(5));
        
        // $data['tanggal'] = Carbon::now()->format('Y-m-d');
        
        // $data = Carbon::createFromFormat('m/d/y', ['tanggal'])->format('Y-m-d');

        $data['tanggal'] = Carbon::createFromFormat('m/d/Y', $request->tanggal)->format('Y-m-d');
        
        KasKeluar::create($data);

        return redirect()->route('admin.kaskeluars.index');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(KasKeluar $kaskeluar)
    {
        //
        $kaskeluar['tanggal'] = date('m/d/Y');
        // $date = $kaskeluar->tanggal->format('m-d-Y');
        // $kaskeluar['tanggal'] = Carbon::createFromFormat('m/d/Y', $request->tanggal)->format('Y-m-d');
        
        return view('admin.kaskeluars.edit', [
            'kas_keluar' => $kaskeluar,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(KasKeluarRequest $request, KasKeluar $kaskeluar)
    {
        //
        $data = $request->all();
        $data['tanggal'] = Carbon::createFromFormat('m/d/Y', $request->tanggal)->format('Y-m-d');
        
        $kaskeluar->update($data);

        return redirect()->route('admin.kaskeluars.index');

        // return view('admin.kaskeluars.create');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(KasKeluar $kaskeluar)
    {
        //
        $kaskeluar->delete();
        return redirect()->route('admin.kaskeluars.index');
    }
}
