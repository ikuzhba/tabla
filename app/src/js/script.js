(function(){
	console.log(new Date());
})();

$( document ).ready(function() {
	input();
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
	if(name) {
		document.querySelectorAll(`[name="for-${name}"]`)[0].value = elements[name].value;
	} else {
		for(let name of Object.keys(elements)) {
			document.querySelectorAll(`[name="for-${name}"]`)[0].value = elements[name].value;
		}
	}
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