<?php
/**
 * TarefasTag Fixture
 */
class TarefasTagFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'tarefa_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10, 'unsigned' => true, 'key' => 'primary'),
		'tag_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10, 'unsigned' => true, 'key' => 'primary'),
		'indexes' => array(
			'PRIMARY' => array('column' => array('tarefa_id', 'tag_id'), 'unique' => 1),
			'fk_tarefas_has_tags_tags1_idx' => array('column' => 'tag_id', 'unique' => 0),
			'fk_tarefas_has_tags_tarefas_idx' => array('column' => 'tarefa_id', 'unique' => 0)
		),
		'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_general_ci', 'engine' => 'InnoDB')
	);

/**
 * Records
 *
 * @var array
 */
	public $records = array(
		array(
			'tarefa_id' => 1,
			'tag_id' => 1
		),
	);

}
