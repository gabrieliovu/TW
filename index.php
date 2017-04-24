<?php
	if (!isset($_SERVER['HTTP_REFERER'])) return 0;
	if ($_SERVER['HTTP_REFERER']=='/comanda/alcool') http_response_code(403);
	
	
	
	//comanda/ceai -> proceseaza si insereaza in 
	
	?>
