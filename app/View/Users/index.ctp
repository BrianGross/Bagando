<div class="menu-right">
<div class="white">

</div>

<div class="editusers">
<?php echo $this->html->link("", array("action" => 'edit', 'controller' => 'users'), array('class' => 'ausers')); ?>
<div class="titleusers text-center">
<p>Editer son profil</p>
</div>
</div>

<div class="travelss">
<?php echo $this->html->link("", array("action" => 'index', 'controller' => 'travels'), array('class' => 'ausers')); ?>
<div class="titletravels text-center">
<p>Trouver des voyages</p>
</div>
</div>


</div>


<nav class="top-bar" data-topbar role="navigation"> 
<section class="top-bar-section">

	<div class="left">
		<div class="profil">
		<?php echo "<img class=\"img-profil\" src=\"../img/avatars/".$user.".".$avatar."\"/>"; ?>
			<div class="profil-block">
			</div>
		</div>
		<a href="" class="a-mbr"><img class="logo-mbr" style="width:100%;" src="../img/logo.png"/></a>
		<p class="p-mbr"><?php echo "bienvenue, ".$username.""; ?>
		</p>
		<p class="p2-mbr">
		<?php echo "Dernière connexion le ".$lastlogin."."; ?></p>
	</div>



	<div class="right"> 
		<div class="shut_down"><?php echo $this->html->link("se deconnecter", array("action" => 'logout', 'controller' => 'users'), array('class' => 'shut_down2')); ?> 
	</div></div>
	</section> 
	<div class="search">
		 <input type="text" class="large-8 columns" style="top:34px; width:300px; height:40px;" placeholder="Rechercher des voyages, personnes ..." />
		 <div class="input-mbr"><img src="../img/icons/search.png"/></div>
	</div>
</nav>



 