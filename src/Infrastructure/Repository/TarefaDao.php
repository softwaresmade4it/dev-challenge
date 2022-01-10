<?php

namespace App\Infrastructure\Repository;

use App\Infrastructure\Persistence\Conexao;
use App\Domain\Model\Tarefa;

class TarefaDao {

    public function create(Tarefa $p) {

        $query = 'INSERT INTO tarefas (tarefa, prazo, status) VALUES (?,?,?)';        

        $stmt = Conexao::getConn()->prepare($query);
        $stmt->bindValue(1, $p->getTarefa());
        $stmt->bindValue(2, $p->getPrazo());
        $stmt->bindValue(3, $p->getStatus());
        $stmt->execute();
    }


    public function read($fields = '*', $where = null, $order = null, $limit = null) {

        $where = strlen($where) ? 'WHERE '.$where : '';
        $order = strlen($order) ? 'ORDER BY '.$order : '';
        $limit = strlen($limit) ? 'LIMIT '.$limit : '';
    
        $query = 'SELECT '.$fields.' FROM tarefas '.$where.' '.$order.' '.$limit;

        $stmt = Conexao::getConn()->prepare($query);
        $stmt->execute();

        if($stmt->rowCount()>0){
            $resultado = $stmt->fetchAll(\PDO::FETCH_ASSOC);
            return $resultado;
        }
        return [];
    }


    public function readTarefa($id) {
  
        $query = 'SELECT * FROM tarefas WHERE id ='.$id;

        $stmt = Conexao::getConn()->prepare($query);
        $stmt->execute();

        if($stmt->rowCount()>0){
            $resultado = $stmt->fetchAll(\PDO::FETCH_ASSOC);
            return $resultado;
        }
        return [];
    }


    public function update(Tarefa $p) {
        $query = 'UPDATE tarefas SET tarefa = ?, prazo = ?, status = ? WHERE id = ?';

        $stmt = Conexao::getConn()->prepare($query);
        $stmt->bindValue(1, $p->getTarefa());
        $stmt->bindValue(2, $p->getPrazo());
        $stmt->bindValue(3, $p->getStatus());
        $stmt->bindValue(4, $p->getId());
        $stmt->execute();
    }



    public function delete($ids) {

        $query = 'DELETE FROM tarefas WHERE id IN ('.implode(',', $ids).')';

        $stmt = Conexao::getConn()->prepare($query);
        $stmt->execute();
    
    }
}