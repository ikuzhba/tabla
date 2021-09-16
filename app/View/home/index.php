<!-- <pre> -->
	<?php echo phpversion() . '<br />'; ?>
	<input type="range" min="1" max="10" value="5" name="nb" onchange="update()" oninput="input('nb')">
	<input type="number" disabled="disabled" name="for-nb">
	<br />

	<input type="range" min="1" max="10" value="5" name="to" onchange="update()" oninput="input('to')">
	<input type="number" disabled="disabled" name="for-to">
	<br />

	<ul id="main">
	</ul>
	
	<script src="/node_modules/jquery/dist/jquery.min.js"></script>

	<script>
		(function(){
			console.log(new Date());
		})();
		$( document ).ready(function() {
			input('nb');
			input('to');
			update();
		});

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

		function update() {
			let elements = get_elements();
			$.post(`/${elements.nb.value}/${elements.to.value}`, {}, function(response) {
				render(response);
			})
		}

		function render(data) {
			let html = '';
			for(let [a, b, c] of data) {
				if(b < 10){
					b = '&nbsp;' + b;
				}
				html += `<li>${a} * ${b} = ${c}</li>`;
			}
			$('ul#main').empty().append(html);
		}
	</script>
<!-- <pre> -->