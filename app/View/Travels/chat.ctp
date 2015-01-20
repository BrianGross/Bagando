<div id="refresh">
<?php foreach ($messages as $message): ?>
	<p id=""><?php echo $message["Chat"]["content"]; ?></p>
<?php endforeach ?>
</div>
<?php echo $this->Form->create('Travel'); ?>
	<?php
		echo $this->Form->input('content',array('placeholder'=>'Envoyer un message','class'=>'large-12 columns','label'=>false,'id'=>'message')); ?>
		
<?php echo $this->Form->end(__('Publier')); ?>
</div>
<script type="text/javascript"
    src="http://code.jquery.com/jquery-1.10.1.min.js"></script>
<script>

 $(document).ready(function(){
function refreshCode(){ 
        $.ajax({
          url: "/travels/chat/<?php echo $url1; ?>/<?php echo $url2; ?>",
          cache: false,
          success: function(html){
            $("#refresh").html(html);
          }
        })
        setTimeout("refreshCode()",1000);
    } 
    refreshCode();
});
</script>