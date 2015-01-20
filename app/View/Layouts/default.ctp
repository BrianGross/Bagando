<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.View.Layouts
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

$cakeDescription = __d('cake_dev', 'CakePHP: the rapid development php framework');
$cakeVersion = __d('cake_dev', 'CakePHP %s', Configure::version())
?>
<!DOCTYPE html>
<html>
<head>
	<?php echo $this->Html->charset(); ?>
	<title>
	<?php echo $this->pageTitle = 'Bagando || Home'; ?>
	</title>
	<?php
		echo $this->Html->meta('icon');


		echo $this->fetch('meta');
		echo $this->Html->css('app');
		echo $this->Html->css('style');
		echo $this->Html->script('bower_components/modernizr/modernizr');
		?>

</head>
<body>


			<?php echo $this->Session->flash(); ?>

			<?php echo $this->fetch('content'); ?>
<div class="partenaire">
    <div class="contain-to-grid" style="background:none;">
  <div class="row">
      <ul class="large-block-grid-3">
  
<li><p class="text-info">Informations Generales</p><p class="text-icone" style="font-size:13px; text-align:justify;">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce commodo tellus vel blandit efficitur. Pellentesque commodo tempus quam, quis commodo orci lacinia ut.Proin tincidunt arcu et mi laoreet placerat. </p></li>
<li><p class="text-info">Partenaires</p><p class="text-icone" style="font-size:13px;">A venir</p></li>
<li><p class="text-info">Nous sommes ici</p> <div class='row'>
  <a href="https://www.facebook.com/bagandoonebagonetrip?fref=ts"target="_blank"><i class='icon-facebook'></i></a>
  <a href="https://www.twitter.com/bagando"target="_blank"><i class='icon-twitter'></a></i>
  <i class='icon-googleplus'></i><i class='icon-pinterest'></i>
  <i class='icon-dribbble'></i></div>
</li>

      </ul>
</div>
</div>
</div>

<div class="footer">
    <div class="contain-to-grid" style="background:#272c30;">
  <div class="row">
      <ul class="small-block-grid-1">
  
<li><p class="text-info" style="text-align:center;color:#FFF;margin-bottom:0px;">Ce site est un projet etudiant de l'ufr ingemedia</p></li>
      </ul>
</div>
</div>
</div>
			<?php 

		echo $this->Html->script('bower_components/jquery/dist/jquery.min');
echo $this->Html->script('bower_components/foundation/js/foundation.min');
echo $this->Html->script('app');
echo $this->Html->script('main');
?>
</body>
</html>
