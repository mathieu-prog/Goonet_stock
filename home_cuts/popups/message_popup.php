<div class="toastContainer">
	<div class="toastBox">
<div class="toastbody">
	<?php 
	 if (isset($result)) { ?>
<i class="fa-solid fa-check"></i>
	<?php }  ?>
		
	<?php 
	 if (isset($error)) { ?>
<i style="background:red;" class="fa-solid fa-exclamation"></i>
	<?php }  ?>

<p><?php if (isset($result)) {
	echo $result;
}if (isset($error)) {
	echo $error;
} ?></p>	
</div>
</div>
</div>
