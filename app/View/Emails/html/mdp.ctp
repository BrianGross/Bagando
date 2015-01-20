<p>
<strong>Bonjour <?php echo $username; ?></strong>
</p>

<p>
Vous avez fait une demande de rappel de mot de passe : 
</p>

<p>
<?php echo $this->html->link("Me rappeler mon mot de passe",$this->html->url($link, true)); ?>
</p>