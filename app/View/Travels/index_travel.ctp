<?php foreach ($users as $user) {
  $lastname = $user["User"]["lastname"];
  $firstname = $user["User"]["firstname"];
  $credit = $user["User"]["credits"];
  $id = $user["User"]["id"];
  $avatar = $user["User"]["avatar"];
} ?>
<?php if (AuthComponent::user('id')): ?>
	<div class="fixed">
 
    <nav class="top-bar top-bar-users" data-topbar role="navigation">
  <ul class="title-area">
    <li class="name">
    <a href="#"><img class="logo" src="../img/logo.png"></a>
    </li>
     <!-- Remove the class "menu-icon" to get rid of menu icon. Take out "Menu" to just have icon alone -->
    <li class="toggle-topbar menu-icon"><a href="#"><span style="color:#000;">Menu</span></a></li>
  </ul>

  <section class="top-bar-section">
    <!-- Right Nav Section -->
    <ul class="right">
  	<?php echo $this->html->link("Mon profil",array("action"=>"index_membre","controller"=>"users"),array("class"=>"bagicon-a")); ?>
    </ul>

    <ul class="left">
    <a href="#" class="button">Passer en premium</a>
     </ul>
    <div class="discover2">
    <?php echo $this->Form->create('Travel',array('controller' => 'travels', 'action' => 'resultSearch'),array('class'=>'large-6 columns')); ?>
                <?php echo $this->Form->input('start', array('label'=>" ")); ?>
              <?php echo $this->Form->end('rechercher',array(
    'submit' => 'button')); ?>
</div>
 
  </section>
</nav>
</div>
<div class="large-12 columns text-center">
<div class="large-4 columns area active-area"><?php echo $this->html->link("Accueil",array("action"=>"index_travel","controller"=>"travels"),array("style"=>"color:#000")); ?></div>
<div class="large-4 columns area"><?php echo $this->html->link("Mes voyages",array("action"=>"index_membre","controller"=>"users"),array("style"=>"color:#FFF")); ?></div>
<div class="large-4 columns area"><?php echo $this->html->link("Creer un voyage",array("action"=>"add","controller"=>"travels"),array("class"=>"wh")); ?></div>
</div>
<?php else: ?>
	 <div class="fixed">
 
    <nav class="top-bar top-bar-users" data-topbar role="navigation">
  <ul class="title-area">
    <li class="name">
    <a href="/"><img class="logo" src="../img/logo.png"></a>
    </li>
     <!-- Remove the class "menu-icon" to get rid of menu icon. Take out "Menu" to just have icon alone -->
    <li class="toggle-topbar menu-icon"><a href="#"><span style="color:#000;">Menu</span></a></li>
  </ul>

  <section class="top-bar-section">
    <!-- Right Nav Section -->
    <ul class="right">
  
      <a href="#" class="button" id="login-button">Se connecter</a>
       <?php echo $this->Html->link('S\'inscire', array('controller'=>'users','action'=>'signup'),array('class'=>'button')) ?>

    </ul>

    <!-- Left Nav Section -->
    <div class="discover">
      <?php $this->html->link("Decouvrez les voyages",array("action"=>"index_travel","controller"=>"travels")); ?></div>
  </section>
</nav>
</div>

<div class="bgorange">
</div>
<div id="buttonshow" style="opacity:1; z-index:99999999;">
<h2 class="text-center bstitle large-12 columns" style="color:#AE5726;">Se connecter</h2>
<div class="close"><img class="closeimg" src="../img/icons/close.png"/></div>

<?php echo $this->Form->create("User",array('action' => 'login','controller' => 'users')); ?>
<div class="large-8 columns bl" style="margin-top:-10px;">
<?php echo $this->Form->input("username", array('label' => 'Pseudo : '),array('class' => 'bl')); ?>
</div>
<div class="large-8 columns bl">
<?php echo $this->Form->input("password", array('label' => 'Mot de passe : '),array('class' => 'bl')); ?>
</div>

<div class="large-8 columns bl">
<?php echo $this->Form->checkbox('cookie', array('hiddenField' => false, 'id' => 'auto-connect')); ?>
<label for="auto-connect" class="spanmenu bl">Connexion automatique</label>
</div>

<div class="large-12 columns">
<?php echo $this->Form->end("Se connecter",array(
    'submit' => 'button')); ?>
</div>

<div class="large-8 columns mdp">
<?php echo $this->Html->link("Vous avez oublie votre mot de passe ?", array('action' => 'password','controller' => 'users'),array('class'=>'bl')); ?>
</div>

</div>

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script>
$(document).ready(function(){
  $("#login-button").click(function(){
     $(".bgorange").show();
     $("#buttonshow").show(500);
  });
});

$(document).ready(function(){
  $(".bgorange").click(function(){
     $(".bgorange").hide();
     $("#buttonshow").hide(500);
  });
});

$(document).ready(function(){
  $(".close").click(function(){
     $(".bgorange").hide();
     $("#buttonshow").hide(500);
      });
  });

$(document).ready(function(){
  $( ".submit input" ).addClass( "button-perso4" );
   });
</script>
<?php endif ?>
	

	


 



 



 

<div class="row" style="margin-top:70px;">
<h2 class="large-12 columns">Tous les voyages</h2>
<?php foreach ($travels as $travel): ?>
	<div class="large-12 columns travelsss">
	<div class="large-12 columns">
		<div class="large-12 text-center columns"><?php echo $travel["Travel"]["name"]; ?></div>
		<div class="large-6 columns"><img src="../img/avatars_travel/<?php echo $travel["Travel"]["id"]; ?>.<?php echo $travel["Travel"]["avatar"]; ?>" class="large-12 columns"></div>
		<div class="large-6 columns">
			<p><span>createur : <?php echo $travel["User"]["username"]; ?></span> <img src="../img/avatars/<?php echo $travel["User"]["id"]; ?>.<?php echo $travel["User"]["avatar"]; ?>" style="width:40px; height:40px;"></p>
			<p>Destination : <?php echo $travel["Travel"]["start"]; ?></p>
			<p>Date de depart : <?php echo $travel["Travel"]["date_start"]; ?></p>
			<p>Date d'arrivee : <?php echo $travel["Travel"]["date_end"]; ?></p>
			<p>Nb de participants : <?php echo $travel["Travel"]["members"]; ?>/<?php echo $travel["Travel"]["count"]; ?></p>
		</div>
	</div>

	<div class="large-12 columns">

		<h4>Description</h4>
		<p><?php echo $travel["Travel"]["content"]; ?></p>

	</div>
	<div class="large-12 text-right columns"><?php echo $this->html->link("Voir la fiche du voyage",array("controller"=>"travels","action"=>"view",$travel['Travel']['id']),array("class"=>"button-search","style"=>"margin-top:-20px")); ?></div>
</div>
<?php endforeach ?>
</div>



<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script>
$(document).ready(function(){
  $( ".submit input" ).addClass( "button-search" );
   });

</script>