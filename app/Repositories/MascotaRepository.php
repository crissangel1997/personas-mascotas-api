<?php

namespace App\Repositories;

use App\Models\Mascota;

/**
 * Repositorio de Mascotas
 *
 * Este repositorio gestiona las operaciones CRUD sobre la entidad Mascota.
 */
class MascotaRepository
{
    /**
     * Obtener todas las mascotas con paginación.
     *
     * @param int $perPage Cantidad de mascotas por página (valor por defecto es 10)
     *
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     *
     * @response 200 {
     *   "current_page": 1,
     *   "data": [
     *      {
     *        "id": 1,
     *        "nombre": "Rex",
     *        "especie": "Perro",
     *        "persona_id": 1,
     *        "created_at": "2025-05-06T00:00:00.000000Z",
     *        "updated_at": "2025-05-06T00:00:00.000000Z"
     *      }
     *   ],
     *   "total": 20,
     *   "per_page": 10,
     *   "last_page": 2
     * }
     */
    public function all()
    {
        return Mascota::with('persona')->paginate(5);
    }

    /**
     * Obtener una mascota por su ID, incluyendo la persona asociada.
     *
     * @param int $id ID de la mascota a buscar.
     *
     * @return Mascota
     *
     * @response 200 {
     *   "id": 1,
     *   "nombre": "Rex",
     *   "especie": "Perro",
     *   "persona_id": 1,
     *   "persona": {
     *     "id": 1,
     *     "nombre": "Juan Pérez",
     *     "email": "juan@example.com"
     *   },
     *   "created_at": "2025-05-06T00:00:00.000000Z",
     *   "updated_at": "2025-05-06T00:00:00.000000Z"
     * }
     */
    public function find($id)
    {
        return Mascota::with('persona')->findOrFail($id);
    }

    /**
     * Crear una nueva mascota en la base de datos.
     *
     * @bodyParam nombre string requerido Nombre de la mascota. Ejemplo: Rex
     * @bodyParam especie string requerido Especie de la mascota (ej. Perro, Gato). Ejemplo: Perro
     * @bodyParam persona_id int requerido ID de la persona asociada a la mascota. Ejemplo: 1
     *
     * @param array $data Los datos de la mascota a crear.
     *
     * @return Mascota
     *
     * @response 201 {
     *   "id": 1,
     *   "nombre": "Rex",
     *   "especie": "Perro",
     *   "persona_id": 1,
     *   "created_at": "2025-05-06T00:00:00.000000Z",
     *   "updated_at": "2025-05-06T00:00:00.000000Z"
     * }
     */
    public function create(array $data)
    {
        return Mascota::create($data);
    }

    /**
     * Actualizar los datos de una mascota.
     *
     * @param Mascota $mascota Instancia de la mascota a actualizar.
     * @param array $data Los datos a actualizar en la mascota.
     *
     * @return Mascota
     *
     * @response 200 {
     *   "id": 1,
     *   "nombre": "Rex Actualizado",
     *   "especie": "Perro",
     *   "persona_id": 1,
     *   "created_at": "2025-05-06T00:00:00.000000Z",
     *   "updated_at": "2025-05-06T00:00:00.000000Z"
     * }
     */
    public function update(Mascota $mascota, array $data)
    {
        $mascota->update($data);
        return $mascota;
    }

    /**
     * Eliminar una mascota de la base de datos.
     *
     * @param Mascota $mascota Instancia de la mascota a eliminar.
     *
     * @return bool
     *
     * @response 200 {
     *   "message": "Mascota eliminada correctamente"
     * }
     */
    public function delete(Mascota $mascota)
    {
        return $mascota->delete();
    }
}
