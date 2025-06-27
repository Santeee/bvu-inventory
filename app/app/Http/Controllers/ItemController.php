<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $items = Item::orderBy('created_at', 'desc')->paginate(20);
        return view('items.index', compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('items.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'elementos' => 'required|string|max:255',
            'observaciones' => 'nullable|string',
            'estado' => 'nullable|string|max:100',
            'uso' => 'nullable|string|max:10',
            'ubicacion' => 'nullable|string|max:255',
            'destino' => 'nullable|string|max:255',
            'observaciones_detalle' => 'nullable|string',
            'movimiento' => 'nullable|string|max:100',
            'fecha' => 'nullable|date',
            'ubicacion_original' => 'nullable|string|max:255',
            'destino_original' => 'nullable|string|max:255',
            'clasificacion_ruba' => 'nullable|string|max:255',
            'carga_ruba' => 'nullable|string|max:255',
            'estado_general' => 'nullable|string|max:100',
            'nueva_ubicacion' => 'nullable|string|max:255',
            'destino_final' => 'nullable|string|max:255',
            'operador' => 'nullable|string|max:255',
            'fecha_actualizacion_inventario' => 'nullable|date',
            'operador_carga' => 'nullable|string|max:255',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        Item::create($request->all());

        return redirect()->route('items.index')
            ->with('success', 'Item creado exitosamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Item $item)
    {
        return view('items.show', compact('item'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Item $item)
    {
        return view('items.edit', compact('item'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Item $item)
    {
        $validator = Validator::make($request->all(), [
            'elementos' => 'required|string|max:255',
            'observaciones' => 'nullable|string',
            'estado' => 'nullable|string|max:100',
            'uso' => 'nullable|string|max:10',
            'ubicacion' => 'nullable|string|max:255',
            'destino' => 'nullable|string|max:255',
            'observaciones_detalle' => 'nullable|string',
            'movimiento' => 'nullable|string|max:100',
            'fecha' => 'nullable|date',
            'ubicacion_original' => 'nullable|string|max:255',
            'destino_original' => 'nullable|string|max:255',
            'clasificacion_ruba' => 'nullable|string|max:255',
            'carga_ruba' => 'nullable|string|max:255',
            'estado_general' => 'nullable|string|max:100',
            'nueva_ubicacion' => 'nullable|string|max:255',
            'destino_final' => 'nullable|string|max:255',
            'operador' => 'nullable|string|max:255',
            'fecha_actualizacion_inventario' => 'nullable|date',
            'operador_carga' => 'nullable|string|max:255',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $item->update($request->all());

        return redirect()->route('items.index')
            ->with('success', 'Item actualizado exitosamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Item $item)
    {
        $item->delete();

        return redirect()->route('items.index')
            ->with('success', 'Item eliminado exitosamente.');
    }

    /**
     * Search items
     */
    public function search(Request $request)
    {
        $query = $request->get('query');
        
        $items = Item::where('elementos', 'like', "%{$query}%")
            ->orWhere('ubicacion', 'like', "%{$query}%")
            ->orWhere('destino', 'like', "%{$query}%")
            ->orWhere('estado', 'like', "%{$query}%")
            ->orderBy('created_at', 'desc')
            ->paginate(20);

        return view('items.index', compact('items', 'query'));
    }
}
