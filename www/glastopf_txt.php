
<h1>WEB</h1>
<button onclick="document.getElementById('glastopf_last20events').style.display='block'" class="w3-btn">glastopf_last20events</button>

<div id="glastopf_last20events" class="w3-modal">
  <div class="w3-modal-content">
    <div class="w3-container">
      <span onclick="document.getElementById('glastopf_last20events').style.display='none'" class="w3-closebtn">×</span>

<?php
$file = 'stats/glastopf_last20events.txt';

if ( file_exists($file) ) { 
	if ( $data = file($file) ) { 

// LAST 20 EVENTS
echo '
<table class="tablefit w3-table-all w3-hoverable w3-responsible w3-centerd">
	<caption>LAST 20 (relevant) EVENTS</caption>
	<tr>
		<th>Timestamp</th>	<th colspan="2">Source</th>	
	</tr>';

foreach ($data as $line) {
        list($occurs,$time,$attack,$ip_port,$event) = explode("\t",$line);
echo '
	<tr>
		<td>' . $time . '</td>
		<td>'; $ip = substr($ip_port, 0, strpos($ip_port, ':')); echo iplink( $ip ) . '</td>
	<td>'.geoip_country_name_by_addr($gi, $ip ).'</td>
	</tr>
	<tr>
		<td colspan="3" class="tdlight">'.htmlentities($event).'</td>
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
  







<button onclick="document.getElementById('glastopf_top15ip').style.display='block'" class="w3-btn">glastopf_top15ip</button>

<div id="glastopf_top15ip" class="w3-modal">
  <div class="w3-modal-content">
    <div class="w3-container">
      <span onclick="document.getElementById('glastopf_top15ip').style.display='none'" class="w3-closebtn">×</span>


<?php
$file = 'stats/glastopf_top15ip.txt';

if ( file_exists($file) ) { 
	if ( $data = file($file) ) { 

// TOP 15 IPs
echo '
<table class="tablefit w3-table-all w3-hoverable w3-responsible w3-centerd">
	<caption>TOP 15 (attacker) IP</caption>
	<tr>
		<th>Connections</th>	<th>Type</th>	<th colspan="2">Source</th>
	</tr>';

foreach ($data as $line) {
        list($occurs,$attack,$count,$ip) = explode("\t",$line);
		$ip = trim($ip);
        echo "
	
	<tr>
		<td>" . $count . "</td>
		<td>" . $attack . "</td>
		<td>";
			iplink( $ip );

        echo "</td>
			<td>".geoip_country_name_by_addr($gi, $ip).'</td>
	</tr>';
	}

echo "
</table>";
	} else { echo 'Could not read file:'.$file; }
} else { echo "no file: ".$file;
}
clearstatcache(); 	 ?>

    </div>
  </div>
</div>  
  

<button onclick="document.getElementById('glastopf_top15ext').style.display='block'" class="w3-btn">glastopf_top15ext</button>

<div id="glastopf_top15ext" class="w3-modal">
  <div class="w3-modal-content">
    <div class="w3-container">
      <span onclick="document.getElementById('glastopf_top15ext').style.display='none'" class="w3-closebtn">×</span>


<?php
// OTHER 1

$file = 'stats/glastopf_top15ext.txt';

if ( file_exists($file) ) { 
	if ( $data = file($file) ) { 

// TOP 15 EXT
echo '
<table class="tablefit w3-table-all w3-hoverable w3-responsible w3-centerd">
	<caption>TOP 15 EXT</caption>
	<tr>
		<th>Count</th>	<th>ext</th>
	</tr>';

foreach ($data as $line) {
        list($count,$ext) = explode("\t",$line);

        echo "
	<tr>
		<td>" . $count . "</td>
		<td>" . $ext . "</td>
	</tr>";
	}

echo "</table>";
	} else { echo 'Could not read file:'.$file; }
} else { echo "no file: ".$file;
}
clearstatcache(); ?>

    </div>
  </div>
</div>  
  

<button onclick="document.getElementById('glastopf_top15intitle').style.display='block'" class="w3-btn">glastopf_top15intitle</button>

<div id="glastopf_top15intitle" class="w3-modal">
  <div class="w3-modal-content">
    <div class="w3-container">
      <span onclick="document.getElementById('glastopf_top15intitle').style.display='none'" class="w3-closebtn">×</span>


<?php
// OTHER 1

$file = 'stats/glastopf_top15intitle.txt';

if ( file_exists($file) ) { 
	if ( $data = file($file) ) { 

// TOP 15 INTITLE
echo '
<table class="tablefit w3-table-all w3-hoverable w3-responsible w3-centerd">
	<caption>TOP 15 INTITLE</caption>
	<tr>
		<th>Count</th>	<th>ext</th>
	</tr>';

foreach ($data as $line) {
        list($count,$ext) = explode("\t",$line);

        echo "
	<tr>
		<td>" . $count . "</td>
		<td>" . $ext . "</td>
	</tr>";
	}

echo "</table>";
	} else { echo 'Could not read file:'.$file; }
} else { echo "no file: ".$file;
}
clearstatcache(); ?>

    </div>
  </div>
</div>  
  

<button onclick="document.getElementById('glastopf_top15intext').style.display='block'" class="w3-btn">glastopf_top15intext</button>

<div id="glastopf_top15intext" class="w3-modal">
  <div class="w3-modal-content">
    <div class="w3-container">
      <span onclick="document.getElementById('glastopf_top15intext').style.display='none'" class="w3-closebtn">×</span>


<?php
// OTHER 1

$file = 'stats/glastopf_top15intext.txt';

if ( file_exists($file) ) { 
	if ( $data = file($file) ) { 

// TOP 15 INTEXT
echo '
<table class="tablefit w3-table-all w3-hoverable w3-responsible w3-centerd">
	<caption>TOP 15 INTEXT</caption>
	<tr>
		<th>Count</th>	<th>ext</th>
	</tr>';

foreach ($data as $line) {
        list($count,$ext) = explode("\t",$line);

        echo "
	<tr>
		<td>" . $count . "</td>
		<td>" . $ext . "</td>
	</tr>";
	}

echo "</table>";
	} else { echo 'Could not read file:'.$file; }
} else { echo "no file: ".$file;
}
clearstatcache(); ?>

    </div>
  </div>
</div>  
  

<button onclick="document.getElementById('glastopf_top15inurl').style.display='block'" class="w3-btn">glastopf_top15inurl</button>

<div id="glastopf_top15inurl" class="w3-modal">
  <div class="w3-modal-content">
    <div class="w3-container">
      <span onclick="document.getElementById('glastopf_top15inurl').style.display='none'" class="w3-closebtn">×</span>


<?php
// OTHER 1

$file = 'stats/glastopf_top15inurl.txt';

if ( file_exists($file) ) { 
	if ( $data = file($file) ) { 

// TOP 15 INTEXT
echo '
<table class="tablefit w3-table-all w3-hoverable w3-responsible w3-centerd">
	<caption>TOP 15 INURL</caption>
	<tr>
		<th>Count</th>	<th>ext</th>
	</tr>';

foreach ($data as $line) {
        list($count,$ext) = explode("\t",$line);

        echo "
	<tr>
		<td>" . $count . "</td>
		<td>" . htmlentities( $ext ) . "</td>
	</tr>";
	}

echo "</table>";
	} else { echo 'Could not read file:'.$file; }
} else { echo "no file: ".$file;
}
clearstatcache(); 

?>

    </div>
  </div>
</div>  
