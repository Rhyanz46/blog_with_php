<html>
<head>
	<title>Halaman Dinamis by TUTORIALWEB.NET</title>
</head>
<body>
	
    <h1>Halaman Dinamis</h1>
    
	<div id="menu">
    	<a href="index.php?p=home">Home</a> /
        <a href="index.php?p=about">About</a> /
        <a href="index.php?p=contact">Contact</a>
    </div>
    
    <div id="konten">
    	<?php
		$pages_dir = 'pages';
		if(!empty($_GET['p'])){
			$pages = scandir($pages_dir, 0);
			unset($pages[0], $pages[1]);
			
			$p = $_GET['p'];
			if(in_array($p.'.php', $pages)){
				include($pages_dir.'/'.$p.'.php');
			} else {
				echo 'Halaman tidak ditemukan! :(';
			}
		} else {
			include($pages_dir.'/home.php');
		}
		?>
    </div>
    
</body>
</html>