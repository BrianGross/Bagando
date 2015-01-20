<div class="travels view">
<h2><?php echo __('Travel'); ?></h2>
	<dl>
		<dt><?php echo __('Titre du voyage :'); ?></dt>
		<dd>
			<?php echo h($travel['Travel']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Description du voyage'); ?></dt>
		<dd>
			<?php echo h($travel['Travel']['content']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Destination du voyage'); ?></dt>
		<dd>
			<?php echo h($travel['Travel']['start']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Date de départ du voyage'); ?></dt>
		<dd>
			<?php echo h($travel['Travel']['date_start']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Date de retour du voyage'); ?></dt>
		<dd>
			<?php echo h($travel['Travel']['date_end']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Nombre de participants'); ?></dt>
		<dd>
			<?php echo h($travel['Travel']['members'])."/".h($travel['Travel']['count']); ?>
			&nbsp;
		</dd>

	</dl>
</div>

<p><?php echo $this->Html->link(__('Rejoindre le voyage'), array('action' => 'join_travel', $travel['Travel']['id'])); ?>
</p>