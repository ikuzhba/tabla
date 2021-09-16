<!-- <pre> -->
	<?php echo phpversion() . '<br />'; ?>
	<input type="range" min="1" max="10" value="5" name="nb" onchange="update()" oninput="input('nb')">
	<input type="number" disabled="disabled" name="for-nb">
	<br />

	<input type="range" min="1" max="10" value="5" name="to" onchange="update()" oninput="input('to')">
	<input type="number" disabled="disabled" name="for-to">
	<br />

	<ul id="main"></ul>
	
	<script src="/node_modules/jquery/dist/jquery.min.js"></script>
	<script src="/app/src/js/script.js"></script>
<!-- <pre> -->