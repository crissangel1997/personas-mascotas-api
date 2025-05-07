<?php

namespace App\Repositories;

use App\Models\Persona;

/**
 * Repositorio de Personas
 *
 * Este repositorio gestiona las operaciones CRUD sobre la entidad Persona.
 */
class PersonaRepository
{
        /**
     * Obtener todas las personas con paginación.
     *
     * @param int $perPage Cantidad de elementos por página (valor por defecto es 5)
     *
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     *
     */
    public function all()
    {
        return Persona::paginate(5);
    }

    /**
     * Obtener una persona por su ID, incluyendo las mascotas asociadas.
     *
     * @param int $id ID de la persona a buscar.
     *
     * @return Persona
     *
     * @response 200 {
     *   "id": 1,
     *   "nombre": "Juan Pérez",
     *   "email": "juan@example.com",
     *   "mascotas": [
     *     {
     *       "id": 1,
     *       "nombre": "Rex",
     *       "especie": "Perro",
     *        "fecha_nacimiento": "1993-05-06"
     *     }
     *   ],
     *   "created_at": "2025-05-06T00:00:00.000000Z",
     *   "updated_at": "2025-05-06T00:00:00.000000Z"
     * }
     */
    public function find($id)
    {
        return Persona::with('mascotas')->findOrFail($id);
    }

     /**
     * Obtener personas con paginación personalizada.
     *
     * @param int $perPage Cantidad de personas por página.
     *
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     *
     * @response 200 {
     *   "current_page": 1,
     *   "data": [
     *      {
     *        "id": 1,
     *        "nombre": "Juan Pérez",
     *        "email": "juan@example.com",
     *         "fecha_nacimiento": "1993-05-06"
     *      }
     *   ],
     *   "total": 50,
     *   "per_page": 10,
     *   "last_page": 5
     * }
     */
    public function paginate(int $perPage = 5)
    {
        return Persona::paginate($perPage);
    }

    /**
     * Crear una nueva persona en la base de datos.
     *
     * @bodyParam nombre string requerido Nombre de la persona. Ejemplo: Juan Pérez
     * @bodyParam email string requerido Correo electrónico de la persona. Ejemplo: juan@example.com
     *
     * @param array $data Los datos de la persona a crear.
     *
     * @return Persona
     *
     * @response 201 {
     *   "id": 1,
     *   "nombre": "Juan Pérez",
     *   "email": "juan@example.com",
     *   "fecha_nacimiento": "1993-05-06"
     *   "created_at": "2025-05-06T00:00:00.000000Z",
     *   "updated_at": "2025-05-06T00:00:00.000000Z"
     * }
     */
    public function create(array $data)
    {
        return Persona::create($data);
    }

    /**
     * Actualizar los datos de una persona.
     *
     * @param Persona $persona Instancia de la persona a actualizar.
     * @param array $data Los datos a actualizar en la persona.
     *
     * @return Persona
     *
     * @response 200 {
     *   "id": 1,
     *   "nombre": "Juan Pérez Actualizado",
     *   "email": "juan_actualizado@example.com",
     *   "fecha_nacimiento": "1993-05-06"
     *   "created_at": "2025-05-06T00:00:00.000000Z",
     *   "updated_at": "2025-05-06T00:00:00.000000Z"
     * }
     */
    public function update(Persona $persona, array $data)
    {
        $persona->update($data);
        return $persona;
    }


    /**
     * Eliminar una persona de la base de datos.
     *
     * @param Persona $persona Instancia de la persona a eliminar.
     *
     * @return bool
     *
     * @response 200 {
     *   "message": "Persona eliminada correctamente"
     * }
     */

    public function delete(Persona $persona)
    {
        return $persona->delete();
    }
}
