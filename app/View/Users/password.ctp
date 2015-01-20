<?php $this->set('title_for_layout','Mot de passe oublié'); ?>

<?php echo $this->Form->create("User"); ?>
<?php echo $this->Form->input("mail", array('label' => 'Votre email : ')); ?>
<?php echo $this->Form->end("Envoyer"); ?>