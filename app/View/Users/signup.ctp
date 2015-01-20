<h2>S'enregistrer</h2>
<?php echo $this->Form->create("User"); ?>
<?php echo $this->Form->input("username", array('label' => 'Pseudo : ')); ?>
<?php echo $this->Form->input("mail", array('label' => 'Email : ')); ?>
<?php echo $this->Form->input("password", array('label' => 'Password : ')); ?>
<?php echo $this->Recaptcha->display(); ?>
<?php echo $this->Form->end("S'enregistrer"); ?>
<script src='https://www.google.com/recaptcha/api.js'></script>