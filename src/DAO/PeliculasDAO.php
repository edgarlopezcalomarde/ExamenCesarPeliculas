<?php
namespace Src\DAO;



use Src\DTO\PeliculaDTO;

interface PeliculasDAO{
    public function all(): array;
    public function find(int $id): PeliculaDTO;
    public function insert(PeliculaDTO $request):bool;
    public function update(PeliculaDTO $request): bool;
    public function delete(int $id):bool;
}
