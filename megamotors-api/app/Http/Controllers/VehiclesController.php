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

    public function getVehicleById()
    {

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

        $vehicle = Vehicle::create([
            'veiculo' => $request->veiculo,
            'marca' => $request->marca,
            'ano' => $request->ano,
            'descricao' => $request->descricao,
            'vendido' => $request->vendido,
        ]);
        return response()
            ->json($vehicle, 201);
    }
}
