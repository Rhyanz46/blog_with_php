$('button').click(function(){
	var back 		= document.getElementById('judul-halaman').innerHTML;
	var nilai 		= $(this).attr('nilai');
	var id 			= $(this).attr('idnya'); //memberi tanda ke #idnya
	var page 		= '';
	var nama 		= $('#nama').val();
	 
	if (back == 'Sub Menu Narkotika') {
		page = 'Menu Narkotika';
	}else if (back == 'Sub Menu Psikotropika') {
		page = 'Menu Psikotropika';
	}else if (back == 'Sub Menu Zat Adiktif') {
		page = 'Menu Zat Adiktif';
	}else{
		page = $(this).attr('ke');
	}

	if (nama) {
		localStorage.setItem('nama',nama);
	}
	
	var url = page.replace(' ','%20').replace(' ','%20');

	if (page != 'Detail') {
		$('#konten').load('halaman/' + url + '.php');
		$('#judul-halaman').text(page);
	}else if (page == 'Detail') {
		$('#konten').load('halaman/' + url + '.php');
		$('#judul-halaman').text(nilai);
		$('#idnya').text(id);
	}
	return false;
	
});