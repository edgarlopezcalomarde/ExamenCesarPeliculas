<?php

namespace Src\Service;

use Src\DTO\DirectorDTO;

interface IDirectoresService{
    public function all(): array;
    public function find(int $id): DirectorDTO;
    public function insert(DirectorDTO $request):bool;
    public function update(DirectorDTO $request): bool;
    public function delete(int $id):bool;
}
