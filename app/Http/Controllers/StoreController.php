<?php

namespace App\Http\Controllers;
use App\Models\Store;
use Illuminate\Http\Request;
use Illuminate\Support\Str;


class StoreController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $stores = Store::all();
        // O si prefieres paginarlas: $stores = Store::paginate(10);
        
        return view('stores.index', compact('stores'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
       return view('stores.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'Nombre_Tienda' => 'required|string|max:100',
            'Direccion' => 'required|string|max:200',
            'Telefono' => 'nullable|string|max:20',
            'Email' => 'nullable|email|max:100',
        ]);

        Store::create([
            'Nombre_Tienda' => $request->Nombre_Tienda,
            'Direccion' => $request->Direccion,
            'Telefono' => $request->Telefono,
            'slug' => Str::slug($request->Nombre_Tienda),
            'Email' => $request->Email,
            'Estado_Activo' => $request->has('Estado_Activo') ? true : true,
        ]);
        return redirect()->route('stores.index')->with('success', 'Tienda creada exitosamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Store $store)
    {
        return view('stores.edit', compact('store'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Store $store)
    {
       $request->validate([
        'Nombre_Tienda' => 'required|string|max:100',
        'Direccion' => 'required|string|max:200',
        'Telefono' => 'nullable|integer',
        'Email' => 'nullable|email|max:100',
    ]);
    $store->Nombre_Tienda = $request->Nombre_Tienda;
    $store->slug = Str::slug($request->Nombre_Tienda);
    $store->Direccion = $request->Direccion;
    $store->Telefono = $request->Telefono;
    $store->Email = $request->Email;
    $store->Estado_Activo = $request->has('Estado_Activo') ? 1 : 0;
    $store->save();

    return redirect()->route('stores.index')->with('success', 'Tienda actualizada exitosamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Store $store)
{
    $store->delete();

    return redirect()->route('stores.index')->with('success', 'Tienda eliminada exitosamente.');
}
}
