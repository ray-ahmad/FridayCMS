<?php
	defined("BASEPATH") or exit("No direct script access allowed!");

	if($com->user_id !== NULL)
		$sender = $this->user_m->user_info($com->user_id)->full_name;
	else
		$sender = $com->commentator_name;		
?>
	<blockquote>
		<p><?php echo $com->comment;?></p>
		<small class="pull-right">By : <?php echo $sender;?></small>
	</blockquote>
	
	