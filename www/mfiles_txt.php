<h1>MALWARE</h1>
<button onclick="document.getElementById('glastopf_top15files').style.display='block'" class="w3-btn">glastopf_top15files</button>

<div id="glastopf_top15files" class="w3-modal">
  <div class="w3-modal-content">
    <div class="w3-container">
      <span onclick="document.getElementById('glastopf_top15files').style.display='none'" class="w3-closebtn">×</span>

<?php
$file = 'stats/glastopf_top15files.txt';

if ( file_exists($file) ) { 
	if ( $data = file($file) ) { 

// TOP 15 FILES
echo '<table class="tablefit w3-table-all w3-hoverable w3-responsible w3-centerd"><caption>TOP 15 MALWARE</caption><tr><th>Count</th><th>File</th></tr>';

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
clearstatcache(); ?>

    </div>
  </div>
</div>  
  
<button onclick="document.getElementById('glastopf_mfiles').style.display='block'" class="w3-btn">glastopf_mfiles</button>

<div id="glastopf_mfiles" class="w3-modal">
  <div class="w3-modal-content">
    <div class="w3-container">
      <span onclick="document.getElementById('glastopf_mfiles').style.display='none'" class="w3-closebtn">×</span>

<?php


$file = 'stats/mfiles.txt';

if ( file_exists($file) ) { 
	if ( $data = file($file) ) { 

	// FILES
	echo '<table class="tablefit w3-table-all w3-hoverable w3-responsible w3-centerd"><caption>Malicious Files (ALL)</caption><tr><th>File</th><th colspan="2">Attacker</th></tr>';

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
				<td colspan="3">http';
			$urlfile = htmlentities($rfile,ENT_QUOTES);
			$urlfile1 = str_replace ( '%3A%2F%2F' , '://', $urlfile );
			echo str_replace ( '%2F' , '/', $urlfile1 );
			echo '</td></tr>';
		}
	echo '</table>';
	} else { echo 'Could not read file:'.$file; }
} else { echo "no file: ".$file;
}
clearstatcache(); ?>

    </div>
  </div>
</div>  
  
<button onclick="document.getElementById('kippo_wget').style.display='block'" class="w3-btn">kippo_wget</button>

<div id="kippo_wget" class="w3-modal">
  <div class="w3-modal-content">
    <div class="w3-container">
      <span onclick="document.getElementById('kippo_wget').style.display='none'" class="w3-closebtn">×</span>

<?php
$file = 'stats/kippo_wget.txt';

if ( file_exists($file) ) { 
	if ( $data = file($file) ) { 

	// FILES
	echo '<table class="tablefit w3-table-all w3-hoverable w3-responsible w3-centerd"><caption>Malicious Remote Files (SSH)</caption><tr><th>Wget Command</th></tr>';

	foreach ($data as $line) {

		list($cmd, $time, $hash) = explode("\t",$line);
		$ip = trim($cmd);
		
			echo '
			<tr>
			<td>';
			$wget = htmlentities($cmd, ENT_QUOTES);
			//$urlfile1 = str_replace ( '%3A%2F%2F' , '://', $urlfile );
			//echo str_replace ( '%2F' , '/', $urlfile1 );
			echo $wget . '</td></tr>';
		}
	echo '</table>';
	} else { echo 'Could not read file:'.$file; }
} else { echo "no file: ".$file;
}
clearstatcache(); ?>

    </div>
  </div>
</div>  

