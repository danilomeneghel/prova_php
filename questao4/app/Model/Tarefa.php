<?php

App::uses('AppModel', 'Model');

class Tarefa extends AppModel {

    public $displayField = 'titulo';
    
    public $validate = array(
        'titulo' => array(
            'notBlank' => array(
                'rule' => array('notBlank'),
            ),
        ),
        'descricao' => array(
            'notBlank' => array(
                'rule' => array('notBlank'),
            ),
        ),
    );

}
