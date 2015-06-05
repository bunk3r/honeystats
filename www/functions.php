<?php
function iplink($ip) {
    echo "<a href=\"http://whois.domaintools.com/$ip\" target=\"_blank\">$ip</a>";
}

function virustotal($file) {
    echo "<a href=\"https://www.virustotal.com/search/?query=$file\" target=\"_blank\">$file</a>";
}
?>
