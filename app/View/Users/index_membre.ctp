<?php foreach ($users as $user) {
  $lastname = $user["User"]["lastname"];
  $firstname = $user["User"]["firstname"];
  $credit = $user["User"]["credits"];
  $id = $user["User"]["id"];
  $avatar = $user["User"]["avatar"];
} ?>

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
<div class="large-4 columns area"><?php echo $this->html->link("Accueil",array("action"=>"index_travel","controller"=>"travels"),array("style"=>"color:#FFF")); ?></div>
<div class="large-4 columns area active-area"><?php echo $this->html->link("Mes voyages",array("action"=>"index_membre","controller"=>"users"),array("style"=>"color:#000")); ?></div>
<div class="large-4 columns area"><?php echo $this->html->link("Creer un voyage",array("action"=>"add","controller"=>"travels"),array("class"=>"wh")); ?></div>
</div>


<?php if (!$user['User']['avatar']): ?>
  <div class="large-12 columns" id="user-warning">

    <img src="../img/icons/delete.png" id="close" alt="btn-close"/>
    <div class="text-center"><p><img src="../img/icons/warning.png"/>
      Attention vous ne pouvez pas rejoindre ou créer des voyages tant que vous n'avez pas mis de photo de profil. <?php echo $this->html->link("Terminer mon profil",array('action'=>'edit')); ?>
    </div>
  </div>
<?php endif ?>
<h2 style="margin-top:70px;">Mes voyages</h2>
<?php foreach ($users as $user): ?>
  
  <?php endforeach ?>
  <div class="large-12 columns travelsss">
  <div class="large-12 columns">
    <div class="large-12 text-center columns"><?php echo $user["Travel"][0]["name"]; ?></div>
    <div class="large-6 columns"><img src="../img/avatars_travel/<?php echo $user["Travel"][0]["id"]; ?>.<?php echo $user["Travel"][0]["avatar"]; ?>" class="large-12 columns"></div>
    <div class="large-6 columns">
      <p><span>createur : <?php echo $user["User"]["username"]; ?></span> <img src="../img/avatars/<?php echo $user["User"]["id"]; ?>.<?php echo $user["User"]["avatar"]; ?>" style="width:40px; height:40px;"></p>
      <p>Destination : <?php echo $user["Travel"][0]["start"]; ?></p>
      <p>Date de depart : <?php echo $user["Travel"][0]["date_start"]; ?></p>
      <p>Date d'arrivee : <?php echo $user["Travel"][0]["date_end"]; ?></p>
      <p>Nb de participants : <?php echo $user["Travel"][0]["members"]; ?>/<?php echo $user["Travel"][0]["count"]; ?></p>
    </div>
  </div>

  <div class="large-12 columns">

    <h4>Description</h4>
    <p><?php echo $user["Travel"][0]["content"]; ?></p>

  </div>
  <div class="large-12 text-right columns"><?php echo $this->html->link("Rejoindre le mur",array("controller"=>"travels","action"=>"page",$user['Travel'][0]['id']),array("class"=>"button-search","style"=>"margin-top:-20px")); ?></div>
</div>


<div>
<p><?php echo $firstname." ".$lastname; ?></p>
        <p><?php echo $this->html->link("se deconnecter", array("action" => 'logout', 'controller' => 'users')); ?> </p>
        <p><?php if (!empty($user['User']['avatar'])) {
          echo "<img class=\"img-profil\" src=\"../img/avatars/".$user['User']['id'].".".$user['User']['avatar']."\"/>";
        } else {
          # code...
        }
          ?></p>
<p><?php echo $this->html->link("editer mon profil",array("controller"=>"users","action"=>"edit")); ?></p>

</div>

<p>

<?php echo $this->html->link("créer un voyage",array("action"=>"add","controller"=>"travels")); ?>

</p>

<p><?php echo $credit . ' credits' ?></p>

<p><?php echo $this->html->link("index voyage", array("action" => 'index_travel', 'controller' => 'travels')); ?> </p>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script>
$(document).ready(function(){
  $("#close").click(function(){
     $("#user-warning").css("display",'none');
     $("#user-warning").css('transition','2');
      });
  });
</script>
<script>
$(document).ready(function(){
  $( ".submit input" ).addClass( "button-search" );
   });

</script>


