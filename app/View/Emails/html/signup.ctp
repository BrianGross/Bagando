<p>
<strong>Bonjour <?php echo $username; ?></strong>
</p>

<p>
Pour activer votre compte, veuillez cliquer sur le lien : 
</p>

<p>
<?php echo $this->html->link("Activer votre compte",$this->html->url($link, true)); ?>
</p>