<h1>Keywords Position</h1>
<table class="table table-striped table-bordered table-hover">
	
	<tr>
		<td></td> 
		<td><?php echo date('Y-m-d', mktime(0, 0, 0, date("m")  , date("d")-21, date("Y")) ) ?></td> 
		<td><?php echo date('Y-m-d', mktime(0, 0, 0, date("m")  , date("d")-14, date("Y")) ) ?></td> 
		<td><?php echo date('Y-m-d', mktime(0, 0, 0, date("m")  , date("d")-7, date("Y")) ) ?></td> 
		<td><?php echo date('Y-m-d', time()) ?></td>
	</tr>

	<?php foreach($all['today'] as $i => $keyword): ?>
	<tr>
		<td><?php echo $keyword->keyword ?></td> 
		<?php 
			$class = '';
			if(isset($all['three'][$i]->position[0])){

				if($all['three'][$i]->position[0]->google_position < 21 && $all['three'][$i]->position[0]->google_position > 0 ){
					$class = 'success';
				} elseif( $all['three'][$i]->position[0]->google_position < 41 && $all['three'][$i]->position[0]->google_position > 20 ){
					$class = 'warning';
				}
			}

		 ?>
		<td class="<?php echo $class; ?>">
			<?php 
				if( isset($all['three'][$i]->position[0]) ){
					echo $all['three'][$i]->position[0]->google_position;
				} else {
					echo '-';
				}
			?>
		</td> 
		<?php 
			$class = '';
			if(isset($all['two'][$i]->position[0])){

				if($all['two'][$i]->position[0]->google_position < 21 && $all['two'][$i]->position[0]->google_position > 0 ){
					$class = 'success';
				} elseif( $all['two'][$i]->position[0]->google_position < 41 && $all['two'][$i]->position[0]->google_position > 20 ){
					$class = 'warning';
				}


				if(isset($all['three'][$i]->position[0])){
					$sup = $all['three'][$i]->position[0]->google_position - $all['two'][$i]->position[0]->google_position;
					$supStyle =($sup>0)?"green":"red";
					$marker = ($sup>0)?"+":"";
				}

			}

		 ?>
		<td class="<?php echo $class; ?>">
			<?php 
				if( isset($all['two'][$i]->position[0]) ){
					echo $all['two'][$i]->position[0]->google_position;
					echo '<sup style="color:'.$supStyle.'">'. $marker .$sup.'</sup>';
				} else {
					echo '-';
				}
			?>
		</td> 
		<?php 
			$class = '';
			if(isset($all['one'][$i]->position[0])){

				if($all['one'][$i]->position[0]->google_position < 21 && $all['one'][$i]->position[0]->google_position > 0 ){
					$class = 'success';
				} elseif( $all['one'][$i]->position[0]->google_position < 41 && $all['one'][$i]->position[0]->google_position > 20 ){
					$class = 'warning';
				}

				if(isset($all['two'][$i]->position[0])){
					$sup = $all['two'][$i]->position[0]->google_position - $all['one'][$i]->position[0]->google_position;
					$supStyle =($sup>0)?"green":"red";
					$marker = ($sup>0)?"+":"";
				}
			}

		 ?>
		<td class="<?php echo $class; ?>">
			<?php 
				if( isset($all['one'][$i]->position[0]) ){
					echo $all['one'][$i]->position[0]->google_position;
					echo '<sup style="color:'.$supStyle.'">'. $marker .$sup.'</sup>';
				} else {
					echo '-';
				}
			?>
		</td> 



		<?php 
			$class = '';
			if(isset($keyword->position[0])){

				if($keyword->position[0]->google_position < 21 && $keyword->position[0]->google_position > 0 ){
					$class = 'success';
				} elseif( $keyword->position[0]->google_position < 41 && $keyword->position[0]->google_position > 20 ){
					$class = 'warning';
				}



				if(isset($all['one'][$i]->position[0])){
					$sup = $all['one'][$i]->position[0]->google_position - $keyword->position[0]->google_position;
					$supStyle =($sup>0)?"green":"red";
					$marker = ($sup>0)?"+":"-";
				}

			}

		 ?>
		<td class="<?php echo $class; ?>" >
			<?php 
				if( isset($keyword->position[0]) ){
					echo $keyword->position[0]->google_position;
					echo '<sup style="color:'.$supStyle.'">'. $marker .$sup.'</sup>';
				} else {
					echo '-';
				}
			?>
		</td> 


	</tr>

	<?php endforeach; ?>
</table>