<!-- <pre> -->
	<input type="range" min="1" max="10" name="nb" onchange="update('nb')" oninput="input('nb')">
	<input type="number" disabled="disabled" value="5" name="for-nb">
	<br />

	<input type="range" min="1" max="10" name="to" onchange="update('to')" oninput="input('to')">
	<input type="number" disabled="disabled" value="5" name="for-to">
	<br />
	
	<ul>
	<?php foreach($data as $row): ?>
		<li><?=$row[0]?> * <?=($row[1] < 10 ? '&nbsp;' . $row[1] : $row[1])?> = <?=$row[2]?></li>
	<?php endforeach; ?>
	</ul>
	

	<script>
		(function(){
			console.log(new Date());
		})();

		function get_elements() {
			let elements = {
				nb: document.querySelectorAll('[name="nb"]')[0],
				to: document.querySelectorAll('[name="to"]')[0]
			};
			return elements;
		}

		function input(name) {
			let elements = get_elements();
			document.querySelectorAll(`[name="for-${name}"]`)[0].value = elements[name].value;
		}

		function update(name) {
			let elements = get_elements();
			console.log('change made');
			// document.querySelectorAll(`[name="for-${name}"]`)[0].value = elements[name].value;
		}
	</script>
<!-- <pre> -->