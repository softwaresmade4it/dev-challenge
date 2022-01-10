<?php

namespace App\Domain\Model;

class Tarefa {

    public $id, $tarefa, $prazo,  $status;

    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function getTarefa() {
        return $this->tarefa;
    }

    public function setTarefa($tarefa) {
        $this->tarefa = $tarefa;
    }

    public function getPrazo() {
        return $this->prazo;
    }

    public function setPrazo($prazo) {
        $this->prazo = $prazo;
    }

    public function getStatus() {
        return $this->status;
    }

    public function setStatus($status) {
        $this->status = $status;
    }
}