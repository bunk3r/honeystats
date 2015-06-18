<label class="collapse" for="_3">&darr;&darr;&darr; Malware (click to expand)</label>
  <input id="_3" type="checkbox" />
<div class="stats">

<?php
$file = 'stats/glastopf_top15files.txt';

if ( file_exists($file) ) { 
	if ( $data = file($file) ) { 

$data = file($file) or die('Could not read file:'.$file);

// TOP 15 FILES
echo '<table class="tablefit"><caption>TOP 15 MALWARE</caption><tr><th>Count</th><th>File</th></tr>';

foreach ($data as $line) {

	list($count, $hash) = explode("\t",$line);
	
        echo '
		<tr>
			<td>'.$count.'</td>
			<td>';
			virustotal( trim ($hash) );
		echo '</td>
		</tr>';
	}
echo '</table>';
	} else { echo 'Could not read file:'.$file; }
} else { echo "no file: ".$file;
}
clearstatcache(); 
echo "<p style=\"clear: left;\"></p>";










$file = 'stats/mfiles.txt';

if ( file_exists($file) ) { 
	if ( $data = file($file) ) { 

	// FILES
	echo '<table id="mfiles" class="tablefit"><caption>Malicious Files (ALL)</caption><tr><th>File</th><th colspan="2">Attacker</th></tr>';

	foreach ($data as $line) {

		list($ip, $hash, $rfile) = explode("\t",$line);
		$ip = trim($ip);
		
			echo '
			<tr>
				<td>';
					virustotal( $hash );
			echo '</td>
			<td>';

			iplink( $ip );
			echo '
			</td>
			<td>'.geoip_country_name_by_addr($gi, $ip ).'</td>
			</tr>
			
			<tr>
				<td colspan="3"><div class="tdlight">http';
			$urlfile = htmlentities($rfile,ENT_QUOTES);
			$urlfile1 = str_replace ( '%3A%2F%2F' , '://', $urlfile );
			echo str_replace ( '%2F' , '/', $urlfile1 );
			echo '</div></td></tr>';
		}
	echo '</table>';
	} else { echo 'Could not read file:'.$file; }
} else { echo "no file: ".$file;
}
clearstatcache(); 
echo "<p style=\"clear: left;\"></p>";

?>
<p><a href="#home">^ Top</a></p>
</div>

