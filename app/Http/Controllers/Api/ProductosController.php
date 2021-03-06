<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Marcas;
use App\Models\Productos;
use App\Models\TipoProductos;
use Illuminate\Http\Request;

class ProductosController extends Controller
{
    function create(Request $request){
        try {
            $tProduct = new Productos();
            $tProduct->nombre = $request['nombre'];
            $tProduct->marca = $request['marca'];
            $tProduct->tipo_producto = $request['tipo_producto'];
            $tProduct->stock = $request['stock'];
            $tProduct->peso_unit = $request['peso_unit'];
            $tProduct->precio_unit = $request['precio_unit'];
            $tProduct->estado = isset($request['estado']) ? $request['estado'] : true;
            $tProduct->save();

            $response['message'] = 'Producto Creado Correctamente';
            $response['success'] = true;
        } catch (\Exception $e) {
            $response['message'] = $e->getMessage();
            $response['success'] = false;
        }

        return $response;
    }

    function get(Request $request){
        try {
            $product = Productos::with('marca', 'tipoProducto')->find($request['id']);

            $response['data'] = $product;
            $response['success'] = true;
        } catch (\Exception $e){
            $response['data'] = $e->getMessage();
            $response['success'] = false;
        }

        return $response;
    }

    function listar(){
        try{
            $data = Productos::with('marca', 'tipoProducto')->get();

            $response['data'] = $data;
            $response['success'] = true;
        } catch (\Exception $e) {
            $response['data'] = $e->getMessage();
            $response['success'] = false;
        }

        return $response;
    }

    function listarA(){
        try {
            $data = Productos::with('marca', 'tipoProducto')->where('estado', true)->get();

            $response['data'] = $data;
            $response['success'] = true;
        } catch (\Exception $e) {
            $response['data'] = $e->getMessage();
            $response['success'] = false;
        }

        return $response;
    }

    function listarD(){
        try {
            $data = Productos::with('marca', 'tipoProducto')->where('estado', false)->get();

            $response['data'] = $data;
            $response['success'] = true;
        } catch (\Exception $e) {
            $response['data'] = $e->getMessage();
            $response['success'] = false;
        }

        return $response;
    }

    function update(Request $request){
        try{
            $product = Productos::find($request['id']);

            try {
                $tProduct = TipoProductos::find($request['tipo_producto']);
                $marca = Marcas::find($request['marca']);

                if ($tProduct->estado && $marca->estado){
                    $result = $product->fill($request->all())->save();

                    $response['message'] = 'Producto Actualizado';
                    $response['success'] = $result;
                } else {
                    $response['message'] = 'No se pudo actualizar el producto';
                    $response['success'] = false;
                }
            } catch (\Throwable $th) {}
        } catch (\Exception $e) {
            $response['message'] = $e->getMessage();
            $response['success'] = false;
        }

        return $response;
    }

    function activar(Request $request){
        try{
            $product = Productos::find($request['id']);

            try {
                $tProduct = TipoProductos::find($product->tipo_producto);
                $marca = Marcas::find($product->marca);

                if ($tProduct->estado && $marca->estado){
                    $result = $product->update(['estado' => true]);

                    $response['message'] = 'Producto Activado';
                    $response['success'] = $result;
                } else {
                    $response['message'] = 'No se pudo activar, tipo de producto o marca desactivado';
                    $response['success'] = false;
                }
            } catch (\Throwable $th) {
                //throw $th;
            }
        } catch (\Exception $e) {
            $response['message'] = $e->getMessage();
            $response['success'] = false;
        }

        return $response;
    }

    function desactivar(Request $request){
        try{
            $product = Productos::find($request['id']);
            $result = $product->update(['estado' => false]);

            $response['message'] = 'Producto Desactivado';
            $response['success'] = $result;
        } catch (\Exception $e) {
            $response['message'] = $e->getMessage();
            $response['success'] = false;
        }

        return $response;
    }
}
