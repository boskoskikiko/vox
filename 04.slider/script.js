var current = document.getElementById('current');
var thumb = document.getElementsByClassName('thumb');

for (var i = 0; i < thumb.length; i++) {
	thumb[i].addEventListener('click', display);
}
function display() {
	var sl = this.getAttribute('src');
	current.setAttribute('src',sl);
}