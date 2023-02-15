<?php
namespace Src\Service\impl;

use Src\DAO\impl\EloquentUsuariosDAO;
use Src\DAO\UsuariosDAO;
use Src\DTO\UsuarioDTO;
use Src\Service\IUsuariosService;

class UsuariosService implements IUsuariosService
{
    private UsuariosDAO $usuarios;

    function __construct()
    {
        $this->usuarios = new EloquentUsuariosDAO();
    }

    public function all(): array{
        return $this->usuarios->all();
    }

    public function find(int $id): UsuarioDTO
    {
        return $this->usuarios->find($id);
    }

    public function insert(UsuarioDTO $request): bool
    {
        return $this->usuarios->insert($request);
    }

    public function update(UsuarioDTO $request): bool
    {
        return $this->usuarios->update($request);
    }

    public function delete(int $id): bool
    {
        return $this->usuarios->delete($id);
    }
}
