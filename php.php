<?php
	function debug($expression) {
		echo '<pre>';
		var_dump($expression);
		echo '</pre>';
	}
	function main_function(string $host) {
		if(isset($_POST['check1'])) {
			$ans = exec(sprintf('ping %s', escapeshellarg($host)), $parm);
			preg_match('/[\d.]{7,15}/', $parm[1], $ip); // ip
			preg_match('/(?<=[(]).*(?=%)/', $parm[9], $res); // loses
			$pr = 100 - (int)$res[0];
			echo "PING:<br><b>$ip[0]</b><br>$pr%<br><br>";
		}
		if(isset($_POST['check2'])) {
			$ans = exec(sprintf('tracert %s', escapeshellarg($host)), $parm);
			echo 'TRACERT:<br>';
			for($i = 3; $parm[$i]; ++$i) {
				preg_match('/[\d.]{7,15}/', $parm[$i], $ip);
				echo $ip[0].' ';
			}
		}
	}
	if(isset($_POST['_text']))
		main_function($_POST['_text']);
	else include("index.html");
?>