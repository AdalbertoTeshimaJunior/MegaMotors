<?php

namespace App\Http\Controllers;

use App\Vehicle;
use Illuminate\Http\Request;


class VehiclesController extends Controller
{
    public function listVehicles()
    {
        return response()
            ->json(Vehicle::all(), 200);
    }

    public function getVehicleById(int $id)
    {
        $vehicle = Vehicle::find($id);
        if (is_null($vehicle)) {
            return response()->json('', 204);
        }

        return response()->json($vehicle);
    }

    public function createVehicle(Request $request)
    {
        $this->validate($request, [
            'veiculo' => 'required',
            'marca' => 'required',
            'ano' => 'required',
            'descricao' => 'required',
            'vendido' => 'required',
        ]);

        $vehicle = Vehicle::create($request->all());
        return response()
            ->json($vehicle, 201);
    }

    public function editVehicle(int $id, Request $request)
    {
        $vehicle = Vehicle::find($id);
        if (is_null($vehicle)) {
            return response()->json([
                'erro' => 'Veículo não encontrado'
            ], 404);
        }
        $vehicle->fill($request->all());
        $vehicle->save();
        return response()
            ->json($vehicle, 200);
    }

    public function deleteVehicle(int $id)
    {
        $quantityRemoved = Vehicle::destroy($id);
        if ($quantityRemoved === 0) {
            return response()->json([
                'erro' => 'Veículo não encontrado'
            ], 404);
        }
        return response()
            ->json('', 204);
    }
}
