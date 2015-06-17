  <label class="collapse" for="_1">&darr;&darr;&darr; WEB (click to expand)</label>
  <input id="_1" type="checkbox" />
  
  
<div class="stats">
  
<?php
$file = 'stats/glastopf_last20events.txt';

if ( file_exists($file) ) {

$data = file($file) or die('Could not read file!');

// LAST 20 EVENTS
echo '
<table class="tablefit">
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
		<td colspan="3"><div class="tdlight">'.htmlentities($event).'</div></td>
	</tr>';
	}
echo '</table>';
	clearstatcache();
} else {
	echo "Could not read file: ".$file;
}










echo "<p style=\"clear: left;\"></p>";

$file = 'stats/glastopf_top15ip.txt';

if ( file_exists($file) ) {

$data = file($file) or die('Could not read file!');

// TOP 15 IPs
echo '
<table class="tablefit">
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
	clearstatcache();
} else {
	echo "Could not read file: ".$file;
}















// OTHER 1
echo "<p style=\"clear: left;\"></p>";

$file = 'stats/glastopf_top15ext.txt';

if ( file_exists($file) ) {

$data = file($file) or die('Could not read file!');

// TOP 15 EXT
echo '
<table class="tablefit">
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
	clearstatcache();
} else {
	echo "Could not read file: ".$file;
}














// OTHER 1
echo "<p style=\"clear: left;\"></p>";

$file = 'stats/glastopf_top15intitle.txt';

if ( file_exists($file) ) {

$data = file($file) or die('Could not read file!');

// TOP 15 INTITLE
echo '
<table class="tablefit">
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
	clearstatcache();
} else {
	echo "Could not read file: ".$file;
}











// OTHER 1
echo "<p style=\"clear: left;\"></p>";

$file = 'stats/glastopf_top15intext.txt';

if ( file_exists($file) ) {

$data = file($file) or die('Could not read file!');

// TOP 15 INTEXT
echo '
<table class="tablefit">
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
	clearstatcache();
} else {
	echo "Could not read file: ".$file;
}









// OTHER 1
echo "<p style=\"clear: left;\"></p>";

$file = 'stats/glastopf_top15inurl.txt';

if ( file_exists($file) ) {

$data = file($file) or die('Could not read file!');

// TOP 15 INTEXT
echo '
<table class="tablefit">
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
	clearstatcache();
} else {
	echo "Could not read file: ".$file;
}













// OTHER 1
echo "<p style=\"clear: left;\"></p>";
?>


</div>