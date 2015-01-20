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
<div class="large-12 columns text-center" style="margin-top:50px;">
<div class="large-4 columns area"><?php echo $this->html->link("Accueil",array("action"=>"index_travel","controller"=>"travels"),array("style"=>"color:#FFF")); ?></div>
<div class="large-4 columns area"><?php echo $this->html->link("Mes voyages",array("action"=>"index_membre","controller"=>"users"),array("style"=>"color:#FFF")); ?></div>
<div class="large-4 columns area active-area"><?php echo $this->html->link("Creer un voyage",array("action"=>"add","controller"=>"travels"),array("style"=>"color:#000")); ?></div>
</div>

<div class="travels form large-12 columns">
<?php echo $this->Form->create('Travel',array("type" => "file")); ?>
	<fieldset>
	<?php
	echo $this->Form->input("avatar_file", array('label' => 'Uploader une photo pour le voyage (.jpg ou .png) : ','type' => 'file'));

		echo $this->Form->input('name',array('label'=>'Le titre du voyage :'));
		echo $this->Form->input('content',array('label'=>'La description du voyage :'));
		echo $this->Form->input('start',array('label'=>'La ville :'));
		echo $this->Form->input('date_start',array('label'=>'la date du départ :'));
		echo $this->Form->input('date_end',array('label'=>'la date du retour :'));
		echo $this->Form->input('count',array('label'=>'Combien de baganders pour ce voyage :','type'=>'text'));
		echo $this->Form->input('country',array('label'=>'Pays :'));
		echo $this->Form->input('categorie',array('label'=>'Choisir une categorie :',
      'options' => array("Voyage Culturelle","Randonnee","Autre"),
      'empty' => 'Choisir'));
		echo $this->Form->input('defi1',array('label'=>'Choisir le premier defi :',
      'options' => array("Faire un selfie / level 1","Vivre avec 1 euros par jour / level 4"),
      'empty' => 'Aucun'));
		echo $this->Form->input('defi2',array('label'=>'Choisir le premier defi :',
      'options' => array("Faire un selfie / level 1","Vivre avec 1 euros par jour / level 4"),
      'empty' => 'Aucun'));
		echo $this->Form->input('defi3',array('label'=>'Choisir le premier defi :',
      'options' => array("Faire un selfie / level 1","Vivre avec 1 euros par jour / level 4"),
      'empty' => 'Aucun'));
		echo "<p>Envie de rajouter une galerie de photo ?</p>";
		echo $this->Media->iframe("Travel",$last["Travel"]["id"]+1);

	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script>
$(document).ready(function(){
  $( ".submit input" ).addClass( "button-search" );
   });

</script>
