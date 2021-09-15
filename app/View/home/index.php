<!-- <pre> -->
	<ul>
	<?php foreach($data as $row): ?>
		<li><?=$row['a']?> * <?=($row['b'] < 10 ? '&nbsp;' . $row['b'] : $row['b'])?> = <?=$row['c']?></li>
	<?php endforeach; ?>
	</ul>
<!-- <pre> -->