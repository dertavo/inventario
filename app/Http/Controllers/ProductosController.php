<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Validator;

use App\Models\Productos;

class ProductosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
      
        $validator = Validator::make($request->all(),[
            "sku"=>"required",
            "nombre"=>"required",
            "id_categoria"=>"required",
            "descripcion"=>"required",
            "precio"=>"required",
            "cantidad"=>"required",
            "estado"=>"required",
        ]);

        if($validator->fails()){

            return response()->json([
                "response"=>$validator->messages(),
                "code"=>400,
            ]);
        }
        $producto = Productos::create([
            "sku"=>$request->sku,
            "nombre"=>$request->nombre,
            "id_categoria"=>$request->id_categoria,
            "descripcion"=>$request->descripcion,
            "precio"=>$request->precio,
            "cantidad"=>$request->cantidad,
            "estado"=>$request->estado,
        ]);

        if($producto){
            return response()->json([
                "response"=>"Producto registrado",
                "code"=>200,
            ]);
        }

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
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
