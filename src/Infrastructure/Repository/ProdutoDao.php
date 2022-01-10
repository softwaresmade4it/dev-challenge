<?php

namespace App\Infrastructure\Repository;

use App\Infrastructure\Persistence\Conexao;
use App\Domain\Model\Produto;

class ProdutoDao {

    public function create(Produto $p) {

        $query = 'INSERT INTO produtos (codigo, nome, preco, descricao) VALUES (?,?,?,?)';        
        
        $stmt = Conexao::getConn()->prepare($query);
        $stmt->bindValue(1, $p->getCodigo());
        $stmt->bindValue(2, $p->getNome());
        $stmt->bindValue(3, $p->getpreco());
        $stmt->bindValue(4, $p->getDescricao());
        $stmt->execute();
    }


    public function read($fields = '*', $where = null, $order = null, $limit = null) {

        $where = strlen($where) ? 'WHERE '.$where : '';
        $order = strlen($order) ? 'ORDER BY '.$order : '';
        $limit = strlen($limit) ? 'LIMIT '.$limit : '';
    
        $query = 'SELECT '.$fields.' FROM produtos '.$where.' '.$order.' '.$limit;

        $stmt = Conexao::getConn()->prepare($query);
        $stmt->execute();

        if($stmt->rowCount()>0){
            $resultado = $stmt->fetchAll(\PDO::FETCH_ASSOC);
            return $resultado;
        }
        return [];
    }


    public function readCliente($id) {
  
        $query = 'SELECT * FROM produtos WHERE id ='.$id;

        $stmt = Conexao::getConn()->prepare($query);
        $stmt->execute();

        if($stmt->rowCount()>0){
            $resultado = $stmt->fetchAll(\PDO::FETCH_ASSOC);
            return $resultado;
        }
        return [];
    }


    public function update(Produto $p) {
        $query = 'UPDATE produtos SET codigo = ?, nome = ?, preco = ?, descricao = ? WHERE id = ?';

        $stmt = Conexao::getConn()->prepare($query);
        $stmt->bindValue(1, $p->getCodigo());
        $stmt->bindValue(2, $p->getNome());
        $stmt->bindValue(3, $p->getPreco());
        $stmt->bindValue(4, $p->getDescricao());
        $stmt->bindValue(5, $p->getId());
        
        $stmt->execute();
    }

    public function delete($ids) {

        $query = 'DELETE FROM produtos WHERE id IN ('.implode(',', $ids).')';

        $stmt = Conexao::getConn()->prepare($query);
        $stmt->execute();
    }
}