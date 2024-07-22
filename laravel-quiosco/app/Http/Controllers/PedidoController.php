<?php

namespace App\Http\Controllers;

use App\Http\Resources\PedidoCollection;
use App\Models\Pedido;
use App\Models\PedidoProducto;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PedidoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Como obtenemos todo la informacion del JSON se ocupar el with
        // El with manda a traer la relacion que se hizo en el modelo
        return new PedidoCollection(Pedido::with('user')->with('productos')->where('estado',0)->get());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        // Almacenar un orden
        $pedido = new Pedido;
        $pedido->user_id = Auth::user()->id;
        $pedido->total = $request->total; // Con el mismo nombre con que lo mandaste del front
        $pedido->save(); // Alamcenar en la bd

        // Obtener el Id del pedido
        $id = $pedido->id;

        // Obtener los productos
        $productos = $request->productos;

        // Formatearun arreglo
        $pedido_producto = [];

        // $productos viene del front
        foreach($productos as $producto) {
            $pedido_producto[] = [
                'pedido_id' => $id,
                'producto_id'=> $producto['id'],
                'cantidad'=> $producto['cantidad'],
                'created_at'=> Carbon::now(),
                'updated_at' => Carbon::now()
            ];
        }

        // Almacenar en la bd
        // insert te permite insertar un arreglo
        PedidoProducto::insert($pedido_producto);

        return[
            'hola' => 'Pedido realizado correctamente, estara listo en unos minutos'
        ];
    }

    /**
     * Display the specified resource.
     */
    public function show(Pedido $pedido)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Pedido $pedido)
    {
        $pedido->estado = 1;
        $pedido->save();
        
        return [
            'pedido'=>$pedido
        ];
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pedido $pedido)
    {
        //
    }
}
