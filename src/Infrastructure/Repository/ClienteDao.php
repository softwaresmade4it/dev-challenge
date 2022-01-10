<?php

namespace App\Infrastructure\Repository;

use App\Infrastructure\Persistence\Conexao;
use App\Domain\Model\Cliente;

class ClienteDao {

    public function create(Cliente $p) {

        $query = 'INSERT INTO clientes (nome, email, empresa) VALUES (?,?,?)';        
        
        $stmt = Conexao::getConn()->prepare($query);
        $stmt->bindValue(1, $p->getNome());
        $stmt->bindValue(2, $p->getEmail());
        $stmt->bindValue(3, $p->getEmpresa());
        $stmt->execute();
    }


    public function read($fields = '*', $where = null, $order = null, $limit = null) {

        $where = strlen($where) ? 'WHERE '.$where : '';
        $order = strlen($order) ? 'ORDER BY '.$order : '';
        $limit = strlen($limit) ? 'LIMIT '.$limit : '';
    
        $query = 'SELECT '.$fields.' FROM clientes '.$where.' '.$order.' '.$limit;

        $stmt = Conexao::getConn()->prepare($query);
        $stmt->execute();

        if($stmt->rowCount()>0){
            $resultado = $stmt->fetchAll(\PDO::FETCH_ASSOC);
            return $resultado;
        }
        return [];
    }


    public function readCliente($id) {
  
        $query = 'SELECT * FROM clientes WHERE id ='.$id;

        $stmt = Conexao::getConn()->prepare($query);
        $stmt->execute();

        if($stmt->rowCount()>0){
            $resultado = $stmt->fetchAll(\PDO::FETCH_ASSOC);
            return $resultado;
        }
        return [];
    }


    public function update(Cliente $p) {
        $query = 'UPDATE clientes SET nome = ?, email = ?, empresa = ? WHERE id = ?';

        $stmt = Conexao::getConn()->prepare($query);
        $stmt->bindValue(1, $p->getNome());
        $stmt->bindValue(2, $p->getEmail());
        $stmt->bindValue(3, $p->getEmpresa());
        $stmt->bindValue(4, $p->getId());
        $stmt->execute();
    }



    public function delete($ids) {

        $query = 'DELETE FROM clientes WHERE id IN ('.implode(',', $ids).')';

        $stmt = Conexao::getConn()->prepare($query);
        $stmt->execute();
    
    }
}