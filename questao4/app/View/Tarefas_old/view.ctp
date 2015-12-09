<div class="tarefas view">
    <h2><?php echo __('Lista de Tarefa'); ?></h2>
    <dl>
        <dt><?php echo __('Id'); ?></dt>
        <dd>
            <?php echo h($tarefa['Tarefa']['id']); ?>
            &nbsp;
        </dd>
        <dt><?php echo __('Titulo'); ?></dt>
        <dd>
            <?php echo h($tarefa['Tarefa']['titulo']); ?>
            &nbsp;
        </dd>
        <dt><?php echo __('Descricao'); ?></dt>
        <dd>
            <?php echo h($tarefa['Tarefa']['descricao']); ?>
            &nbsp;
        </dd>
        <dt><?php echo __('Prioridade'); ?></dt>
        <dd>
            <?php echo h($tarefa['Tarefa']['prioridade']); ?>
            &nbsp;
        </dd>
    </dl>
</div>
<div class="actions">
    <h3><?php echo __('Actions'); ?></h3>
    <ul>
        <li><?php echo $this->Html->link(__('Edit Tarefa'), array('action' => 'edit', $tarefa['Tarefa']['id'])); ?> </li>
        <li><?php echo $this->Form->postLink(__('Delete Tarefa'), array('action' => 'delete', $tarefa['Tarefa']['id']), array(), __('Are you sure you want to delete # %s?', $tarefa['Tarefa']['id'])); ?> </li>
        <li><?php echo $this->Html->link(__('List Tarefas'), array('action' => 'index')); ?> </li>
        <li><?php echo $this->Html->link(__('New Tarefa'), array('action' => 'add')); ?> </li>
    </ul>
</div>
<div class="related">
    <h3><?php echo __('Related Tags'); ?></h3>
	<?php if (!empty($tarefa['Tag'])): ?>
    <table cellpadding = "0" cellspacing = "0">
        <tr>
            <th><?php echo __('Id'); ?></th>
            <th><?php echo __('Descricao'); ?></th>
            <th class="actions"><?php echo __('Actions'); ?></th>
        </tr>
	<?php foreach ($tarefa['Tag'] as $tag): ?>
        <tr>
            <td><?php echo $tag['id']; ?></td>
            <td><?php echo $tag['descricao']; ?></td>
            <td class="actions">
                <?php echo $this->Html->link(__('View'), array('controller' => 'tags', 'action' => 'view', $tag['id'])); ?>
                <?php echo $this->Html->link(__('Edit'), array('controller' => 'tags', 'action' => 'edit', $tag['id'])); ?>
                <?php echo $this->Form->postLink(__('Delete'), array('controller' => 'tags', 'action' => 'delete', $tag['id']), array(), __('Are you sure you want to delete # %s?', $tag['id'])); ?>
            </td>
        </tr>
	<?php endforeach; ?>
    </table>
<?php endif; ?>
    <div class="actions">
        <ul>
            <li><?php echo $this->Html->link(__('New Tag'), array('controller' => 'tags', 'action' => 'add')); ?> </li>
        </ul>
    </div>
</div>
