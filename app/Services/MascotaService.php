<?php

namespace App\Services;

use App\Models\Mascota;
use Illuminate\Support\Facades\Log;
use App\Repositories\MascotaRepository;
use Illuminate\Support\Facades\Http;

 /**
 * @group Servicio de Mascotas
 *
 * Métodos relacionados con el manejo de mascotas.
 */
class MascotaService
{
    protected $mascotaRepository;

    public function __construct(MascotaRepository $mascotaRepository)
    {
        $this->mascotaRepository = $mascotaRepository;

    }


      /**
     * Obtener todas las mascotas
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function getAll()
    {
        return $this->mascotaRepository->all();
    }
   /**
     * Obtener todas las mascotas paginadas junto con su persona
     *
     * @queryParam perPage int Número de elementos por página. Default: 10
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function getAllPaginated(int $perPage = 10)
     {
         return Mascota::with('persona')->paginate($perPage);
     }
     /**
     * Obtener una mascota por su ID
     *
     * @param int $id ID de la mascota
     * @return Mascota|null
     */

    public function getById($id)
    {
        return $this->mascotaRepository->find($id);
    }
    /**
     * Crear una nueva mascota
     *
     * @bodyParam nombre string requerido Nombre de la mascota.
     * @bodyParam especie string requerido Especie de la mascota (perro/gato).
     * @bodyParam raza string Raza de la mascota (opcional, usado para imagen).
     * @bodyParam persona_id int requerido ID de la persona dueña.
     *
     * @param array $data
     * @return Mascota
     *
     * @throws \Exception
     */
    public function create(array $data)
    {
        try {
            if (!empty($data['raza'])) {
                Log::info("Buscando información de la raza", [
                    'especie' => $data['especie'],
                    'raza' => $data['raza']
                ]);

                $info = $this->obtenerInfoRaza($data['especie'], $data['raza']);

                if ($info && isset($info['image']['url'])) {
                    $data['imagen'] = $info['image']['url'];

                    Log::info("Imagen de raza encontrada", [
                        'url' => $info['image']['url']
                    ]);
                } else {
                    Log::warning("No se encontró imagen para la raza", [
                        'raza' => $data['raza']
                    ]);
                }
            }

            $mascota = $this->mascotaRepository->create($data);

            Log::info("Mascota creada exitosamente", [
                'mascota_id' => $mascota->id,
                'persona_id' => $mascota->persona_id,
                'nombre' => $mascota->nombre
            ]);

            return $mascota;

        } catch (\Exception $e) {
            Log::error("Error al crear mascota", [
                'mensaje' => $e->getMessage(),
                'data' => $data
            ]);

            throw $e;
        }
    }
   /**
     * Actualizar una mascota
     *
     * @bodyParam nombre string Nombre actualizado.
     * @bodyParam especie string Especie actualizada.
     * @bodyParam raza string Raza actualizada.
     *
     * @param Mascota $mascota
     * @param array $data
     * @return Mascota
     *
     * @throws \Exception
     */
    public function update(Mascota $mascota, array $data)
    {
        try {
            if (!empty($data['raza']) && !empty($data['especie'])) {
                Log::info("Buscando información de la raza para actualización", [
                    'especie' => $data['especie'],
                    'raza' => $data['raza']
                ]);

                $info = $this->obtenerInfoRaza($data['especie'], $data['raza']);

                if ($info && isset($info['image']['url'])) {
                    $data['imagen'] = $info['image']['url'];

                    Log::info("Imagen de raza actualizada", [
                        'url' => $info['image']['url']
                    ]);
                } else {
                    Log::warning("No se encontró imagen para la raza actualizada", [
                        'raza' => $data['raza']
                    ]);
                }
            }

            $updated = $this->mascotaRepository->update($mascota, $data);

            Log::info("Mascota actualizada exitosamente", [
                'mascota_id' => $mascota->id,
                'persona_id' => $mascota->persona_id,
                'data_actualizada' => $data
            ]);

            return $updated;
        } catch (\Exception $e) {
            Log::error("Error al actualizar la mascota", [
                'mascota_id' => $mascota->id,
                'mensaje' => $e->getMessage(),
                'datos' => $data
            ]);
            throw $e;
        }
    }
   /**
     * Eliminar una mascota
     *
     * @param Mascota $mascota
     * @return bool
     *
     * @throws \Exception
     */
    public function delete(Mascota $mascota)
    {
        try {
            $this->mascotaRepository->delete($mascota);

            Log::info("Mascota eliminada correctamente", [
                'mascota_id' => $mascota->id,
                'persona_id' => $mascota->persona_id
            ]);

            return true;
        } catch (\Exception $e) {
            Log::error("Error al eliminar mascota", [
                'mascota_id' => $mascota->id,
                'mensaje' => $e->getMessage()
            ]);
            throw $e;
        }
    }

    /**
     * Obtener información de una raza desde thedogapi o thecatapi
     *
     * @param string $especie 'perro' o 'gato'
     * @param string $raza nombre de la raza
     * @return array|null
     */

     public function obtenerInfoRaza(string $especie, string $raza)
     {
         $apiBase = strtolower($especie) === 'perro' ? 'thedogapi' : 'thecatapi';
         $searchUrl = "https://api.$apiBase.com/v1/breeds/search";

         // Desactivar verificación SSL
         $response = Http::withoutVerifying()->get($searchUrl, ['q' => $raza]);
         $results = $response->json();

         if (!empty($results) && isset($results[0]['id'])) {
             $breedId = $results[0]['id'];

             $imageUrl = "https://api.$apiBase.com/v1/images/search";
             // Desactivar verificación SSL también aquí
             $imageRes = Http::withoutVerifying()->get($imageUrl, ['breed_ids' => $breedId]);
             $images = $imageRes->json();

             if (!empty($images) && isset($images[0]['url'])) {
                 $results[0]['image']['url'] = $images[0]['url'];
             }
         }

         return $results[0] ?? null;
     }
}
