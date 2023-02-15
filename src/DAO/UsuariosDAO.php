<?php
namespace Src\DAO;



use Src\DTO\UsuarioDTO;

interface UsuariosDAO{
    public function all(): array;
    public function find(int $id): UsuarioDTO;
    public function insert(UsuarioDTO $request):bool;
    public function update(UsuarioDTO $request): bool;
    public function delete(int $id):bool;
}
