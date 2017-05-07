<?php
/**
 * Author: Kanchan Khatri
 * This is the sorted trip view file which will display the planned iternary.
 * params passed here are from the class Trip.
 * keys in the $data are loaded as variables here.
 * $data['plan'] in Trip class passed will provide $plan as variable in view file.
 */
$sorted = isset($sorted)?$sorted:false;
$success = isset($success)?$success:false;
$fail = isset($fail)?$fail:false;
?>
<div class='row' id='trip_plan'>
	<ol>
		<?php 
	// loading trip_helper to use generate_trip_html which will return the iternary in html format.
		$this->load_helper('trip_helper');
		$trip_sort_li = $this->trip_helper->generate_trip_html($plan);
		$trip_sort_li.= '<li> You have arrived at your final destination.</li>';
		echo $trip_sort_li;
		?>
	</ol>	
</div>
<?php if(!empty($success)){?>
<div class="alert alert-success">
  <?php echo $success;?>
</div>
<?php }?>
<?php if(!empty($fail)){?>
<div class="alert alert-danger">
  <?php echo $fail;?>
</div>
<?php }?>
<?php if(!$sorted){?>
<button class=" col-lg-12 col-md-12 btn btn-primary" id='arrange_trip'>
	Make Sorted Plan
</button>
<?php }?>