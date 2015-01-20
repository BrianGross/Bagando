<?php $this->set("title_for_layout","editer mon profil"); ?>

<?php echo $this->Form->create("User", array("type" => "file")); ?>

<?php echo "<img class=\"img-profil\" src=\"../img/avatars/".$user['User']['id'].".".$user['User']['avatar']."\"/><div class=\"button\" id=\"avatar-btn\">Modifier l'image de profil</div>"; ?>
<?php echo $this->Form->input("avatar_file", array('label' => 'Votre avatar (.jpg ou .png) : ','type' => 'file','div'=>array('id'=>'avatar','style'=>'display:none'))); ?>


<?php echo "<div>Prénom : ".$user["User"]["firstname"]."<div class=\"button\" id=\"firstname-btn\">Modifier</div></div>"; ?>
<?php echo $this->Form->input("firstname", array('label' => 'Prénom : ','div'=>array('id'=>'firstname','style'=>'display:none'))); ?>

<?php echo "<div>Nom : ".$user["User"]["lastname"]."<div class=\"button\" id=\"lastname-btn\">Modifier</div></div>"; ?>
<?php echo $this->Form->input("lastname",  array('label' => 'Nom : ','div'=>array('id'=>'lastname','style'=>'display:none'))); ?>

<div class="button" id="password-btn">Changer son mot de passe</div>

<?php echo $this->Form->input("pass1", array('label' => 'Mot de passe : ','type' => 'password','div'=>array('id'=>'password1','style'=>'display:none'))); ?>
<?php echo $this->Form->input("pass2", array('label' => 'Confirmez le mot de passe : ','type' => 'password','div'=>array('id'=>'password2','style'=>'display:none'))); ?>

<?php echo $this->Form->end("Editer mon profil"); ?>

<?php echo $this->html->link("Accueil",array("action"=>"index_membre")); ?>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script>
$(document).ready(function(){
  $("#firstname-btn").click(function(){
  	 $("#firstname").css('display','block');
      });
  });

$(document).ready(function(){
  $("#lastname-btn").click(function(){
  	 $("#lastname").css('display','block');
      });
  });

$(document).ready(function(){
  $("#password-btn").click(function(){
  	 $("#password1").css('display','block');
  	 $("#password2").css('display','block');
      });
  });

$(document).ready(function(){
  $("#avatar-btn").click(function(){
  	 $("#avatar").css('display','block');
      });
  });
</script>