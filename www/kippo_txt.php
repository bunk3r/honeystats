<h1>SSH</h1>
<button onclick="document.getElementById('kippo_top15userpass').style.display='block'" class="w3-btn">kippo_top15userpass</button>

<div id="kippo_top15userpass" class="w3-modal">
  <div class="w3-modal-content">
    <div class="w3-container">
      <span onclick="document.getElementById('kippo_top15userpass').style.display='none'" class="w3-closebtn">×</span>

<?php
$file = 'stats/kippo_top15userpass.txt';

if ( file_exists($file) ) {

$data = file($file) or die('Could not read file!');

// TOP 15 user pass
echo '<table class="tablefit w3-table-all w3-hoverable w3-responsible w3-centerd"><caption>TOP 15 USER+PASS</caption><tr><th>Count</th><th>Username</th><th>Password</th></tr>';

foreach ($data as $line) {

        list($user,$pass,$count) = explode("\t",$line);

        echo "<tr><td>" . $count . "</td>";
		echo "<td>";
		echo htmlentities( $user );
        echo "</td>";
        echo "<td>";
        echo htmlentities( $pass );
        echo "</td>";
        echo "</tr>";
}
echo "</table>";
	clearstatcache();
} else {
	echo "Could not read file: ".$file;
} 
?>

    </div>
  </div>
</div>  
  
<button onclick="document.getElementById('kippo_top20successlogin').style.display='block'" class="w3-btn">kippo_top20successlogin</button>

<div id="kippo_top20successlogin" class="w3-modal">
  <div class="w3-modal-content">
    <div class="w3-container">
      <span onclick="document.getElementById('kippo_top20successlogin').style.display='none'" class="w3-closebtn">×</span>

<?php

$file = 'stats/kippo_top20successlogin.txt';

if ( file_exists($file) ) {

$data = file($file) or die('Could not read file!');

// TOP 20 successful login IPs 
echo '<table class="tablefit w3-table-all w3-hoverable w3-responsible w3-centerd"><caption>TOP 20 SUCCESSFUL LOGIN IPs</caption><tr><th>Count</th><th colspan="2">Source</th></tr>';

foreach ($data as $line) {
        list($count, $ip) = explode("\t",$line);
        echo "<tr>";
        echo "<td>" . $count . "</td>";
		echo "<td>";
        iplink( $ip );
        echo "</td>";
        echo "<td>";
        echo geoip_country_name_by_addr ( $gi, trim($ip) );
	echo "</td>";
	echo "</tr>";
}
echo "</table>";
	clearstatcache();
} else {
	echo "Could not read file: ".$file;
}


?>

    </div>
  </div>
</div>  
  
<button onclick="document.getElementById('kippo_top20ip').style.display='block'" class="w3-btn">kippo_top20ip</button>

<div id="kippo_top20ip" class="w3-modal">
  <div class="w3-modal-content">
    <div class="w3-container">
      <span onclick="document.getElementById('kippo_top20ip').style.display='none'" class="w3-closebtn">×</span>

<?php





$file = 'stats/kippo_top20ip.txt';

if ( file_exists($file) ) {

$data = file($file) or die('Could not read file!');

// TOP 20 IPs
echo '<table class="tablefit w3-table-all w3-hoverable w3-responsible w3-centerd"><caption>TOP 20 attackers</caption><tr><th>Connections</th><th colspan="2">Source</th></tr>';

foreach ($data as $line) {

        list($count,$ip) = explode("\t",$line);

        echo "<tr><td>" . $count . "</td>";
	echo "<td>";
        iplink( $ip );
        echo "</td>";
        echo "<td>";
        echo geoip_country_name_by_addr ( $gi, trim($ip) );
	echo "</td>";
        echo "</tr>";
}
echo "</table>";
	clearstatcache();
} else {
	echo "Could not read file: ".$file;
}


?>

    </div>
  </div>
</div>  
  
<button onclick="document.getElementById('kippo_last20sess').style.display='block'" class="w3-btn">kippo_last20sess</button>

<div id="kippo_last20sess" class="w3-modal">
  <div class="w3-modal-content">
    <div class="w3-container">
      <span onclick="document.getElementById('kippo_last20sess').style.display='none'" class="w3-closebtn">×</span>

<?php


$file = 'stats/kippo_last20sess.txt';

if ( file_exists($file) ) {

$data = file($file) or die('Could not read file!');

// Last 20 sessions
echo '<table class="tablefit w3-table-all w3-hoverable w3-responsible w3-centerd"><caption>Last 20 sessions</caption><tr><th>Date</th><th colspan="2">Source</th></tr>';

foreach ($data as $line) {

        list($time,$ip) = explode("\t",$line);

        echo "<tr>";
        echo "<td>" . $time . "</td>";
        
	echo "<td>";
        iplink( $ip );
        echo "</td>";
        echo "<td>";
        echo geoip_country_name_by_addr ( $gi, trim($ip) );
	echo "</td>";
	echo "</tr>";
}
echo "</table>";
	clearstatcache();
} else {
	echo "Could not read file: ".$file;
}?>

    </div>
  </div>
</div>  
  
<button onclick="document.getElementById('kippo_last50commands').style.display='block'" class="w3-btn">kippo_last50commands</button>

<div id="kippo_last50commands" class="w3-modal">
  <div class="w3-modal-content">
    <div class="w3-container">
      <span onclick="document.getElementById('kippo_last50commands').style.display='none'" class="w3-closebtn">×</span>

<?php

$file = 'stats/kippo_last50commands.txt';

if ( file_exists($file) ) {

$data = file($file) or die('Could not read file!');

echo '<table class="tablefit w3-table-all w3-hoverable w3-responsible w3-centerd"><caption>Last 50 commands executed</caption><tr><th>Date</th><th>Command</th><th colspan="2">Source</th></tr>';

foreach ($data as $line) {

        list($time,$cmd,$ip) = explode("\t",$line);
        echo "<tr><td>" . $time . "</td>";
echo "<td>";
echo htmlentities( $cmd );
echo "</td>";
		echo "<td>";
        iplink( $ip );
        echo "</td>";
        echo "<td>";
        echo geoip_country_name_by_addr ( $gi, trim($ip) );
	echo "</td>";
	echo "</tr>";
}
echo '</table>';
	clearstatcache();
} else {
	echo "Could not read file: ".$file;
}

?>

    </div>
  </div>
</div>  
