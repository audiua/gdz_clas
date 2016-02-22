<h1>``<?php echo $model->keyword; ?>``</h1>
<table class="table table-striped table-bordered table-hover">
	<thead>
		<th></th> <th><?php echo date('Y-m-d', mktime(0, 0, 0, date("m")  , date("d")-35, date("Y")) ); ?></th> 
		<th><?php echo date('Y-m-d', mktime(0, 0, 0, date("m")  , date("d")-28, date("Y")) ); ?></th> 
		<th><?php echo date('Y-m-d', mktime(0, 0, 0, date("m")  , date("d")-21, date("Y")) ); ?></th> 
		<th><?php echo date('Y-m-d', mktime(0, 0, 0, date("m")  , date("d")-14, date("Y")) ); ?></th> 
		<th><?php echo date('Y-m-d', mktime(0, 0, 0, date("m")  , date("d")-7, date("Y")) ); ?></th> 
		<th><?php echo date('Y-m-d', time()) ?></th>
	</thead>
	<tbody>

		<tr>
			<td>google position</td>
			<?php $i=5; while($i>=0): ?>
				<td><?= isset($item[$i]->google_position) ? $item[$i]->google_position : '--' ?></td>
			<?php $i--; endwhile; ?>
		</tr>
		
		<tr>
			<td>yandex position</td>
			<?php $i=5; while($i>=0): ?>
				<td><?= isset($item[$i]->yandex_position) ? $item[$i]->yandex_position : '--' ?></td>
			<?php $i--; endwhile; ?>
		</tr>

		<tr>
			<td>links count</td><td>---</td><td>0</td><td>1</td><td>3</td><td>4</td><td>6</td>
		</tr>
		<tr>
			<td>twitter links</td><td>---</td><td>---</td><td>---</td><td>---</td><td>---</td><td>---</td>
		</tr>
		<tr>
			<td>vk links</td><td>---</td><td>---</td><td>---</td><td>---</td><td>---</td><td>---</td>
		</tr>

	</tbody>
</table>

