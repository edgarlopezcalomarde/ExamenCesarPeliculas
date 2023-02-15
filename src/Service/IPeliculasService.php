<?php
namespace Src\Service;

use Src\DTO\PeliculaDTO;

interface IPeliculasService{
    public function all(): array;
    public function find(int $id): PeliculaDTO;
    public function insert(PeliculaDTO $request):bool;
    public function update(PeliculaDTO $request): bool;
    public function delete(int $id):bool;
}
