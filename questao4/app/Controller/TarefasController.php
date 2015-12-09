<?php

App::uses('AppController', 'Controller');

class TarefasController extends AppController {

    public $components = array('Paginator', 'RequestHandler');

    public function index() {
        $this->Tarefa->recursive = 0;

        $tarefas = $this->Tarefa->find('all');

        $this->set('tarefas', $tarefas);
        $this->set('_serialize', array('tarefas'));
    }

    public function view($id = null) {
        if (!$this->Tarefa->exists($id)) {
            throw new NotFoundException(__('Invalid tarefa'));
        }
        if (!empty($id)) {
            $this->set('title_for_layout', 'Editar Tarefa');
        } else {
            $this->set('title_for_layout', 'Adicionar Tarefa');
        }
        
        $options = array('conditions' => array('Tarefa.' . $this->Tarefa->primaryKey => $id));
        $this->set('tarefa', $this->Tarefa->find('first', $options));
    }

    public function listaTarefas() {
        $this->Tarefa->recursive = 0;
        $tarefas = $this->Tarefa->find('all', array(
            'fields' => array('Tarefa.id, Tarefa.titulo, Tarefa.descricao, Tarefa.prioridade'),
            'order' => array('Tarefa.prioridade' => 'asc'),
            'recursive' => 0,
        ));
        
        $tarefas = $this->arrayTarefas($tarefas);
        echo json_encode($tarefas);
        exit;
    }

    public function arrayTarefas($arr) {
        $retorno = [];
        
        foreach ($arr as $reg):
            $retorno[] = [
                'id' => $reg['Tarefa']['id'],
                'titulo' => $reg['Tarefa']['titulo'],
                'descricao' => $reg['Tarefa']['descricao'],
                'prioridade' => $reg['Tarefa']['prioridade'],
            ];
        endforeach;

        return [
            'resultado' => $retorno
        ];
    }

    public function add() {
        if ($this->request->is(array('post', 'ajax', 'xml', 'json'))) {

            $this->Tarefa->create();

            $p_max = $this->Tarefa->find('first', array(
                'fields' => 'max(prioridade)+1 as maxp',
                'recursive' => 0
            ));
            $pri = (!empty($p_max[0]['maxp'])) ? $p_max[0]['maxp'] : 0;

            $this->request->data['Tarefa']['prioridade'] = $pri;

            if ($this->Tarefa->save($this->request->data)) {
                $resultado = [
                    "sucesso" => true,
                    "mensagem" => "Tarefa adicionada com sucesso"
                ];
            } else {
                $resultado = [
                    "sucesso" => false,
                    "mensagem" => "Erro ao gravar."
                ];
            }

            if ($this->request->is('ajax')) {
                echo json_encode($resultado);
                exit;
            }

            $this->set('resultado', $resultado);
            $this->set('_serialize', array('resultado'));
        }
    }

    public function edit($id = null) {
        if (!$this->Tarefa->exists($id)) {
            throw new NotFoundException(__('Invalid tarefa'));
        }
        if ($this->request->is(array('post', 'put', 'ajax', 'xml', 'json'))) {

            if ($this->Tarefa->save($this->request->data)) {
                $resultado = [
                    "sucesso" => true,
                    "mensagem" => "Tarefa alterada com sucesso"
                ];
            } else {
                $resultado = [
                    "sucesso" => false,
                    "mensagem" => "Erro ao gravar."
                ];
            }

            if ($this->request->is('ajax')) {
                echo json_encode($resultado);
                exit;
            }

            $this->set('resultado', $resultado);
            $this->set('_serialize', array('resultado'));
        }
    }

    public function updatePriority() {
        $array = $_POST['reg'];

        if ($_POST['update'] == "update") {
            $count = 1;
            foreach ($array as $id) {
                $query = "UPDATE tarefas SET prioridade = " . $count . " WHERE id = " . $id;
                $this->Tarefa->query($query);
                $count++;
            }

            $resultado = "Prioridade alterada com sucesso";

            if ($this->request->is('ajax')) {
                echo json_encode($resultado);
                exit;
            }
        }

        set('resultado', $resultado);
        set('_serialize', array('resultado'));
    }

    public function delete($id = null) {
        $this->Tarefa->id = $id;
        if (!$this->Tarefa->exists()) {
            throw new NotFoundException(__('Invalid tarefa'));
        }
        $this->request->allowMethod('post', 'delete', 'ajax');

        $query = "DELETE FROM tarefas WHERE id = " . $id;
        $this->Tarefa->query($query);

        if ($this->request->is('ajax')) {
            $resultado = [
                "sucesso" => true,
                "mensagem" => "Tarefa excluída com sucesso"
            ];
            echo json_encode($resultado);
            exit;
        }

        set('resultado', $resultado);
        set('_serialize', array('resultado'));
    }

}
