<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreMascotaRequest;
use App\Http\Resources\MascotaResource;
use App\Models\Mascota;
use App\Services\MascotaService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class MascotaController extends Controller
{
    protected $mascotaService;

    public function __construct(MascotaService $mascotaService)
    {
        $this->mascotaService = $mascotaService;
        $this->authorizeResource(Mascota::class, 'mascota');
    }
    /**
     * @group Mascotas
     * Listar mascotas
     * @queryParam per_page int Opcional. Cantidad de resultados por página.
    */

    public function index(Request $request): JsonResponse
    {
        $perPage = $request->get('per_page', 5);
        $mascotas = $this->mascotaService->getAllPaginated($perPage);
        return response()->json(MascotaResource::collection($mascotas));
    }


    /**
     * @group Mascotas
     * Crear una nueva mascota
     *
     * Este endpoint permite registrar una nueva mascota asociada a una persona.
     *
     * @bodyParam nombre string requerido El nombre de la mascota. Ejemplo: Rocky
     * @bodyParam especie string requerido Especie de la mascota. Puede ser 'perro' o 'gato'. Ejemplo: perro
     * @bodyParam raza string opcional Raza de la mascota. Ejemplo: Labrador
     * @bodyParam edad integer opcional Edad aproximada de la mascota en años. Ejemplo: 3
     * @bodyParam fecha_nacimiento date opcional Fecha de nacimiento de la mascota en formato Y-m-d. Ejemplo: 2022-06-15
     * @bodyParam persona_id integer requerido ID de la persona a la que pertenece la mascota. Ejemplo: 1
     *
     * @response 201 {
     *   "id": 10,
     *   "nombre": "Rocky",
     *   "especie": "perro",
     *   "raza": "Labrador",
     *   "edad": 3,
     *   "fecha_nacimiento": "2022-06-15",
     *   "persona_id": 1,
     * }
     */

    public function store(StoreMascotaRequest $request): JsonResponse
    {
        $mascota = $this->mascotaService->create($request->validated());
        return response()->json(new MascotaResource($mascota), 201);
    }

    /**
     * @group Mascotas
     * Mostrar mascota
     * @urlParam id int requerido. ID de la mascota.
     */
    public function show($id): JsonResponse
    {
        $mascota = $this->mascotaService->getById($id);
        return response()->json(new MascotaResource($mascota));
    }
    /**
     * @group Mascotas
     * Actualizar mascota
     * @urlParam id int requerido. ID de la mascota.
     * @bodyParam nombre string requerido.
     * @bodyParam especie string requerido.
     * @bodyParam raza string requerido.
     * @bodyParam edad int requerido.
     * @bodyParam persona_id int requerido.
     */
    public function update(StoreMascotaRequest $request, Mascota $mascota): JsonResponse
    {
        $updated = $this->mascotaService->update($mascota, $request->validated());
        return response()->json(new MascotaResource($updated));
    }
    /**
     * @group Mascotas
     * Eliminar mascota
     * @urlParam id int requerido. ID de la mascota.
     */
    public function destroy(Mascota $mascota): JsonResponse
    {
        $this->mascotaService->delete($mascota);
        return response()->json(['message' => 'Mascota eliminada correctamente']);
    }
}
