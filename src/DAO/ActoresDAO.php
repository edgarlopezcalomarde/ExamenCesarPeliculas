<?php
namespace Src\DAO;

use Src\DTO\ActorDTO;

interface ActoresDAO{
    public function all(): array;
    public function find(int $id): ActorDTO;
    public function insert(ActorDTO $request):bool;
    public function update(ActorDTO $request): bool;
    public function delete(int $id):bool;
}
