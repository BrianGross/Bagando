  <div class="fixed">
 
    <nav class="top-bar" data-topbar role="navigation">
  <ul class="title-area">
    <li class="name">
    <a href="/"><img class="logo" src="img/logo.png"></a>
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
      <?php echo $this->html->link("Decouvrez les voyages",array("action"=>"index_travel","controller"=>"travels")); ?>
  </section>
</nav>
</div>

        <div class="black" style="overflow:hidden;">
  <video autoplay loop muted>
    <source src="video/timelapse.mp4" type="video/mp4">
</video>
<div class="text-center yellow">
<h2 style="color:#FFF;">Plateforme co-voyageur special sac a dos</h2>
<a class="button savoir" href="#">En savoir plus</a>
</div>
</div>

   <div class="description">
    <div class="contain-to-grid" style="background:#FFF;">
  <div class="row">
      <ul class="small-block-grid-3">
  
<li><img  style="width:210px;height:150px;" src="img/ordi.png"><p class="text-icone">Connectez-vous </br>& créez votre voyage</p></li>
<li><img  style="width:170px;height:150px;" src="img/groupe.png"><p class="text-icone">Constituez votre communauté</p></li>
<li><img  style="width:170px;height:150px;" src="img/avion.png"><p class="text-icone">Partez à l'aventure </br>& relevez les défis</p></li>
      </ul>

<div class="explication">
<p class="text-icone">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce commodo tellus vel blandit efficitur. Pellentesque commodo tempus quam, quis commodo orci lacinia ut. Proin tincidunt arcu et mi laoreet placerat eget vitae mi. Ut est risus, tincidunt id ullamcorper vel, faucibus pharetra nunc. Pellentesque vulputate faucibus tellus, sed cursus sapien accumsan id. Cras a tellus orci.Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce commodo tellus vel blandit efficitur. Pellentesque commodo tempus quam, quis commodo orci lacinia ut. Proin tincidunt arcu et mi laoreet placerat eget vitae mi. Ut est risus, tincidunt id ullamcorper vel, faucibus pharetra nunc. Pellentesque vulputate faucibus tellus, sed cursus sapien accumsan id. Cras a tellus orci.</p>

</div>


</div>
</div>
</div>
<div class="bgorange">
</div>
<div id="buttonshow">
<h2 class="text-center bstitle large-12 columns" style="color:#AE5726;">Se connecter</h2>
<div class="close"><img class="closeimg" src="img/icons/close.png"/></div>

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
       <script>
//Initial load of page
$(document).ready(sizeContent);

//Every resize of window
$(window).resize(sizeContent);

//Dynamically assign height
function sizeContent() {
    var newWidth = $("html").width() + "px";
    $(".black").css("width", newWidth);
}
    </script>
    <script>
//Initial load of page
$(document).ready(sizeContent);

//Every resize of window
$(window).resize(sizeContent);

//Dynamically assign height
function sizeContent() {
    var newHeight = $("html").height() - $("#navbartop").height() + "px";
    $(".black").css("height", newHeight);
}
    </script>