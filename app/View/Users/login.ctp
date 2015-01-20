<div class="full-screen1">
<div class="row">
	<h2 class="large-12 columns wh">Se connecter</h2>
<?php echo $this->Form->create("User"); ?>
<div class="large-12 columns wh">
<?php echo $this->Form->input("username", array('label' => 'login : ')); ?>
</div>
<div class="large-12 columns wh">
<?php echo $this->Form->input("password", array('label' => 'Password : ')); ?>
</div>
<div class="large-12 columns">
<?php echo $this->Html->link("Mot de passe oublié", array('action' => 'password','controller' => 'users')); ?>
</div>
<div class="large-12 columns">
<?php echo $this->Form->end("Se connecter"); ?>
</div>
</div>
</div>