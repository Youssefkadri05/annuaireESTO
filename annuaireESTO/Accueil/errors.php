<?php if(count($errors) > 0) : ?>

	

		<?php foreach($errors as $error) : ?>

			 <b style="color: red;"> <?php echo $error; ?></b><br>

		<?php endforeach	?>
   
 <?php endif ?>