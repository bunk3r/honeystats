<?php 

include_once "functions.php" ;
// GeoIP db in honeypot/geoip/
include_once ("geoip/geoip.inc");
$gi = geoip_open("geoip/GeoIP.dat",GEOIP_STANDARD);


?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
	<title>HONEYSTATS - Honeypot Satistics by Andrea Purificato</title>
	<meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<meta name="expires" content="Fri, 12 Jun 15 20:15:08 +0200" />
	<meta name="Cache-Control" content="max-age=3600, must-revalidate" />
	<meta name="description" content="Nowhere Honeypot Satistics by Andrea Purificato - Ethical Hacker - ICT Senior Security Specialist - Penetration Test, Security Audit, Security Assessment, Vulnerability Assessment, Risk Assessment, Mobile Cloud IoT Internet of Things Security, Exploit, Tools, Shellcode - Roma - Italia" />
	<meta name="robots" content="index, follow" />
	<meta name="keywords" content="kippo, glastopf, honeynet, Nowhere, Honeypot, Satistics, stats, Andrea Purificato, Ethical Hacking, Ethical Hacker, Freelance, Security, Penetration Test, Security Audit, Security Assessment, Vulnerability Assessment, Risk Assessment, Mobile Cloud IoT Internet of Things Security, Exploit, Shellcode" />
	<link rel="stylesheet prefetch" type="text/css" href="honeystats.css" media="screen" />
	<link rel="stylesheet prefetch" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" />
	<!--[if lt IE 9]>
		<script src="//cdnjs.cloudflare.com/ajax/libs/html5shiv/r29/html5.min.js"></script>
	<![endif]-->
</head>

<body id="home">

<div class="page-container">
	<header>
		<a class="to_nav" href="#menuf"><i class="fa fa-bars"></i></a>
			<br/>
		# HONEYSTATS - Honeypot Statistics
	</header>
	
	<nav class="menu">
		<ul>
			<li><a href="index.php" title="Home"><i class="fa fa-home"></i> Home</a></li>
		</ul>
	</nav>
	
	<section>
<article>
	<h1>HONEYSTATS - Honeypot Statistics</h1>
	<p>This area is still under development! Please be patient as we iron out the bugs!</p>
</article>

<article>		
	<h2>Live Dictionaries</h2>
	<ul>
		<li>You can download a <i>collection</i> of passwords extracted from SSH attacks <a href="stats/live_dict.txt.tar.gz" target="_blank">HERE</a></li>
		<li>You can download a <i>collection</i> of users exctracted from SSH attacks <a href="stats/live_users.txt" target="_blank">HERE</a></li>
	</ul>
</article>


<p>Honeypot stats below:</p>







<article>
		<?php include_once "glastopf_txt.php"; ?>
</article>
<article>
		<?php include_once "kippo_txt.php"; ?>
</article>
<article>
		<?php include_once "mfiles_txt.php"; ?>
</article>
		
		
		
		
		
		
		
		<ul>
			<li><a href="#home">^ Top</a></li>
		</ul>

	</section> <!-- content -->

	
	<nav class="menuf" id="menuf">
		<ul>
			<li><a href="index.php" title="Home"><i class="fa fa-home"></i> Home</a></li>
		</ul>
		<ul>
			<li><a href="#home">^ Top</a></li>
		</ul>
	</nav>
	
		
	<div class="social">
		<a class="icon-link round-corner facebook fill" href="https://www.facebook.com/purificato.org" target="_blank"><i class="fa fa-facebook"></i></a>
		<a class="icon-link round-corner linkedin fill" href="https://it.linkedin.com/in/andreapurificato" target="_blank"><i class="fa fa-linkedin"></i></a>
		<a class="icon-link round-corner twitter fill" href="https://twitter.com/purificato_org" target="_blank"><i class="fa fa-twitter"></i></a>
		<a class="icon-link round-corner google-plus fill" href="https://www.google.com/+PurificatoOrgEthicalHack" target="_blank"><i class="fa fa-google-plus"></i></a>
		<!--<a class="icon-link round-corner github fill"><i class="fa fa-github"></i></a>-->
	</div>
		
	
	<footer>
		
		<p></p>

	</footer>

</div> <!-- page-container -->

<?php 

// Close opened GeoIP db 
geoip_close($gi);
			
?>

</body>
</html>		
				
  	

