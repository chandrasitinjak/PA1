var keyword = document.getElementById('keyword');
var tombolCari = document.getElementById('tombol-cari');
var container = document.getElementById('container1');

keyword.addEventListener('keyup', function() {
	
	var xhr = new XMLHttpRequest();

	xhr.onreadystatechange = function() {
		if(xhr.readyState == 4 && xhr.status == 200) {
			container.innerHTML = xhr.responseText;
		}
	}

	xhr.open('GET','search_produk.php?keyword=' + keyword.value , true);
	xhr.send();
});


