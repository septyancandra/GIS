<?php
 //   require_once './model/mod_tableprod_traff.php';
?>
<section class="content-header">
    <h1><i class="fa fa-dashboard"></i>Notifikasi</h1>
</section>

<section class="content">

    <ul class="timeline">

    <!-- timeline time label -->
    <li class="time-label">
        <span class="bg-red">
            <?php 
			$day3 = strtotime ( '-2 day' , strtotime ( date('d M y') ) );
			$day2 = strtotime ( '-1 day' , strtotime ( date('d M y') ) );			
			echo date('d M y'); ?>
        </span>
    </li>
    <!-- /.timeline-label -->

    <!-- timeline item -->
    <?php foreach ($notif as $dta){ 
		if (date('y-m-d',strtotime($dta->waktu))=== date('y-m-d')) {
	?>
	<li>        
        <i class="fa <?php 
			switch ($dta->sts) {
				case "N":
					echo "fa-envelope bg";
					break;
				case "R":
					echo "fa-check-square bg";
					break;
			}
		?>-<?php 
			switch ($dta->type) {
				case "error":
					echo "red";
					break;
				case "info":
					echo "blue";
					break;
				case "warning":
					echo "yellow";
					break;
				default:
					echo "green";
			}
		?>"></i>
        <div class="timeline-item">
            <span class="time"><i class="fa fa-clock-o"></i><?php echo date('H:i',strtotime($dta->waktu)); ?></span>
            <h3 class="timeline-header"><a href="#"><?php echo $dta->uid.' '.$dta->isi; ?></a> ...</h3>         
        </div>
    </li>
	<?php }} ?>
    <!-- END timeline item -->    
	<li class="time-label">
        <span class="bg-red">
            <?php echo date('d M y',$day2); ?>
        </span>
    </li>
	<?php foreach ($notif as $dta){ 
		if (date('y-m-d',strtotime($dta->waktu))=== date('y-m-d',$day2)) {
	?>
	<li>        
        <i class="fa <?php 
			switch ($dta->sts) {
				case "N":
					echo "fa-envelope bg";
					break;
				case "R":
					echo "fa-check-square bg";
					break;
			}
		?>-<?php 
			switch ($dta->type) {
				case "error":
					echo "red";
					break;
				case "info":
					echo "blue";
					break;
				case "warning":
					echo "yellow";
					break;
				default:
					echo "green";
			}
		?>"></i>
        <div class="timeline-item">
            <span class="time"><i class="fa fa-clock-o"></i><?php echo date('H:i',strtotime($dta->waktu)); ?></span>
            <h3 class="timeline-header"><a href="#"><?php echo $dta->uid.' '.$dta->isi; ?></a> ...</h3>         
        </div>
    </li>
	<?php }} ?>
	<li class="time-label">
        <span class="bg-red">
            <?php echo date('d M y',$day3); ?>
        </span>
    </li>
	<?php foreach ($notif as $dta){ 
		if (date('y-m-d',strtotime($dta->waktu))=== date('y-m-d',$day3)) {
	?>
	<li>        
        <i class="fa <?php 
			switch ($dta->sts) {
				case "N":
					echo "fa-envelope bg";
					break;
				case "R":
					echo "fa-check-square bg";
					break;
			}
		?>-<?php 
			switch ($dta->type) {
				case "error":
					echo "red";
					break;
				case "info":
					echo "blue";
					break;
				case "warning":
					echo "yellow";
					break;
				default:
					echo "green";
			}
		?>"></i>
        <div class="timeline-item">
            <span class="time"><i class="fa fa-clock-o"></i><?php echo date('H:i',strtotime($dta->waktu)); ?></span>
            <h3 class="timeline-header"><a href="#"><?php echo $dta->uid.' '.$dta->isi; ?></a> ...</h3>         
        </div>
    </li>
	<?php }} ?>
</ul>   

</section>
