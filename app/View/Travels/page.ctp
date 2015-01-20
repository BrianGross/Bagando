<?php foreach ($posts as $post): ?>
	<p class="large-12 columns"><?php echo $post["User"]["username"]." : ". $post["Post"]["content"]; ?></p>
<?php endforeach ?>


<?php echo $this->Form->create('Travel',array('action' => 'addpost')); ?>
	<?php
		echo $this->Form->input('content',array('placeholder'=>'Publier sur le mur du voyage','class'=>'large-12 columns','label'=>false)); ?>
		<?php echo $this->Form->hidden('id',array('default'=>$travel["Travel"]["id"])); ?>
		
<?php echo $this->Form->end(__('Publier')); ?>
</div>

<h2>Membre du voyage :</h2>
<p><?php echo $travel["User"]["username"]; ?> <?php echo $this->Html->link(__('Discuter'), array('action' => 'chat', $travel['Travel']['id'],$travel["User"]["id"])); ?>
</p>
<?php foreach ($members as $member): ?>
	<p><?php echo $member["User"]["username"]; ?>
		<?php echo $this->Html->link(__('Discuter'), array('action' => 'chat', $travel['Travel']['id'],$member["User"]["id"])); ?>
	</p>

<?php endforeach ?>