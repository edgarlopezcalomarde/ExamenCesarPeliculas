<?php
namespace Src\Service\impl;

use App\Models\Actor;
use Illuminate\Http\Request;
use Src\DAO\ActoresDAO;
use Src\DAO\impl\EloquentActoresDAO;
use Src\DTO\ActorDTO;
use Src\Service\IActoresService;

class ActoresService implements IActoresService
{
    private ActoresDAO $actores;

    function __construct()
    {
        $this->actores = new EloquentActoresDAO();
    }

    public function all(): array{
        return $this->actores->all();
    }

    public function find(int $id): ActorDTO
    {
        return $this->actores->find($id);
    }

    public function insert(ActorDTO $request): bool
    {
        return $this->actores->insert($request);
    }

    public function update(ActorDTO $request): bool
    {
        return $this->actores->update($request);
    }

    public function delete(int $id): bool
    {
        return $this->actores->delete($id);
    }
}
