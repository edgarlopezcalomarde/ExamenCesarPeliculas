<?php
namespace Src\DAO;


use Src\DTO\DirectorDTO;

interface DirectoresDAO{
    public function all(): array;
    public function find(int $id): DirectorDTO;
    public function insert(DirectorDTO $request):bool;
    public function update(DirectorDTO $request): bool;
    public function delete(int $id):bool;
}
