<div class="tarefas form">
<?php echo $this->Form->create('Tarefa'); ?>
    <fieldset>
        <legend><?php echo __('Add Tarefa'); ?></legend>
	<?php
            //echo $this->Form->input('titulo');
            echo $this->Form->input('descricao');
            echo $this->Form->input('prioridade');
	?>
    </fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
    <h3><?php echo __('Actions'); ?></h3>
    <ul>
        <li><?php echo $this->Html->link(__('List Tarefas'), array('action' => 'index')); ?></li>
    </ul>
</div>
