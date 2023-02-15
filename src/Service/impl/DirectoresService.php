<?php
namespace Src\Service\impl;


use Src\DAO\DirectoresDAO;
use Src\DAO\impl\EloquentDirectoresDAO;
use Src\DTO\DirectorDTO;
use Src\Service\IDirectoresService;

class DirectoresService implements IDirectoresService
{
    private DirectoresDAO $Directores;

    function __construct()
    {
        $this->Directores = new EloquentDirectoresDAO();
    }

    public function all(): array{
        return $this->Directores->all();
    }

    public function find(int $id): DirectorDTO
    {
        return $this->Directores->find($id);
    }

    public function insert(DirectorDTO $request): bool
    {
        return $this->Directores->insert($request);
    }

    public function update(DirectorDTO $request): bool
    {
        return $this->Directores->update($request);
    }

    public function delete($id): bool
    {
        return $this->Directores->delete($id);
    }
}
