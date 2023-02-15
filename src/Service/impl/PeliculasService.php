<?php
namespace Src\Service\impl;


use Src\DAO\impl\EloquentPeliculasDAO;
use Src\DAO\PeliculasDAO;
use Src\DTO\PeliculaDTO;
use Src\Service\IPeliculasService;

class PeliculasService implements IPeliculasService
{
    private PeliculasDAO $peliculas;

    function __construct()
    {
        $this->peliculas = new EloquentPeliculasDAO();
    }

    public function all(): array{
        return $this->peliculas->all();
    }

    public function find(int $id): PeliculaDTO
    {
        return $this->peliculas->find($id);
    }

    public function insert(PeliculaDTO $request): bool
    {
        return $this->peliculas->insert($request);
    }

    public function update(PeliculaDTO $request): bool
    {
        return $this->peliculas->update($request);
    }

    public function delete(int $id): bool
    {
        return $this->peliculas->delete($id);
    }
}
