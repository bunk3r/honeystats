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
		<style>
		* {
		  margin: 0;
		  padding: 0;
		}

		li {
		  list-style: none;
		}

		a {
		  color: #005B9C;
		}

		img {
		  border: 0;
		}

		p {
		  margin-bottom: 5px;
		}

		h1,
		h2 {
		  font: bold 110%  'Open Sans', sans-serif;
		  color: #005B9C;
		  text-transform: uppercase;
		  margin-bottom: 10px;
		}

		body {
		  background-color: #454545;
		  color: #333;
		  font: normal 90%  'Open Sans', sans-serif;
		  line-height: 1;
		}

		.page-container {
		  position: relative;
		  width: 740px;
		  margin: auto;
		  padding: 0;
		}

		header,
		section,
		nav {
		  padding: 10px;
		  margin-bottom: 12px;
		}

		header,
		section {
		  overflow: hidden;
		  border-radius: 6px 6px 6px 6px;
		  box-shadow: 6px 6px 6px #262626;
		}

		header,
		nav {
		  clear: both;
		  /* no float around */
		}

		header {
		  top: 50px;
		  background-color: #365d95;
		  /* logo background */
		  background-image: url('img/ethicalhackprofile.png');
		  background-repeat: no-repeat;
		  background-position: bottom right;
		  margin-top: 12px;
		}
	
		header p {
			color: #ffffff;
			font: normal 100% 'Play', sans-serif;
			text-decoration: none;
			text-shadow: 2px 2px #454545;
			text-align: left;
		}
		header a.logo {
		  color: #ffffff;
		  font: bold 200%  'Play', sans-serif;
		  text-decoration: none;
		  text-transform: uppercase;
		}
		a.to_nav {
		  float: right;
		  border: 1px solid #ffffff;
		  border-radius: 6px;
		  /*background-color: #365d95;*/
		  color: #ffffff;
		  font: bold 100%  'Play', sans-serif;
		  text-decoration: none;
		  text-align: center;
		  text-transform: uppercase;
		  width: 48px;
		  height: 48px;
		  min-height: 48px;
		  line-height: 48px;
		  margin-left: 20px;
		}

		a.lang {
		  float: right;
		  border: 1px solid #ffffff;
		  border-radius: 6px;
		  /*background-color: #365d95;*/
		  color: #ffffff;
		  font: bold 100%  'Play', sans-serif;
		  text-decoration: none;
		  text-align: center;
		  text-transform: uppercase;
		  width: 48px;
		  height: 48px;
		  min-height: 48px;
		  line-height: 48px;
		  margin-left: 10px;
		}

		nav {
		  display: block;
		}

		nav ul {
		  list-style: none;
		}

		nav li {
		  display: inline;
		}

		.menuf li {
		  display: block;
		}

		.menu {
		  margin-bottom: 12px;
		}

		.menu  ul {
		  list-style: none;
		}

		.menu  a {
		  border-radius: 6px;
		  padding: 5px 10px 5px 10px;
		  background-color: #365d95;
		  color: #ffffff;
		  font: bold 100%  'Play', sans-serif;
		  text-decoration: none;
		  text-align: center;
		  text-transform: uppercase;
		  box-shadow: 6px 6px 6px #262626;
		}

		.menu li {
		  display: inline;
		}

		.menuf {
		  display: block;
		  margin-bottom: 12px;
		}

		.menuf  ul {
		  list-style: none;
		}

		.menuf  a {
		  box-shadow: 6px 6px 6px #262626;
		  border-radius: 6px;
		  padding: 5px 10px 5px 10px;
		  background-color: #365d95;
		  color: #ffffff;
		  font: bold 100%  'Play', sans-serif;
		  text-decoration: none;
		  text-align: left;
		  display: block;
		  text-transform: uppercase;
		  min-height: 48px;
		  line-height: 48px;
		}

		.menuf li {
		  border-bottom: 1px solid #262626;
		}

		section {
		  background-color: #d1d1d1;
		  color: #000;
		  font: normal 100%  'Open Sans', sans-serif;
		}

		.article {
		  background-color: #FFF;
		  line-break: strict;
		  overflow: hidden;
		  border-radius: 6px 6px 6px 6px;
		  padding: 12px;
		  margin-bottom: 12px;
		}

		.article li {
		  list-style-type: disc;
		  list-style-position: inside;
		}

		.article ul {
		  padding: 8px;
		}

		@media only screen and (max-width: 360px) {
		  .menu {
			display: none;
		  }

		  .page-container {
			position: relative;
			width: auto;
			margin: 0;
			padding: 0;
		  }
		}

		@media only screen and (min-width: 361px) and (max-width: 768px) {
		  .menu {
			display: none;
		  }

		  .page-container {
			position: relative;
			width: auto;
			margin-left: 10px;
			margin-right: 10px;
			padding: 0;
		  }
		}

		@media only screen and (min-width: 768px) and (max-width: 1024px) {
		  .page-container {
			position: relative;
			width: 740px;
			margin: auto;
			padding: 0;
		  }

		  .menuf {
			display: none;
		  }

		  .to_nav {
			display: none;
		  }
		}

		@media only screen and (min-width: 1025px) {
		  .page-container {
			position: relative;
			width: 900px;
			margin: auto;
			padding: 0;
		  }

		  .menuf {
			display: none;
		  }

		  .to_nav {
			display: none;
		  }
		}
	</style>
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
	
	
	
<div class="article">
	<h1>HONEYSTATS - Honeypot Statistics</h1>
	<p>This area is still under development! Please be patient as we iron out the bugs!</p>
</div>

<div class="article">
	<h2>Live Dictionaries</h2>
	<ul>
		<li><a href="stats/live_dict.txt.tar.gz" target="_blank">live_dict.txt.tar.gz</a> (updated: <?php echo date ("F d Y H:i:s", filemtime('stats/live_dict.txt.tar.gz')); ?>)</li>
		<li><a href="stats/live_users.txt" target="_blank">live_users.txt</a> (updated: <?php echo date ("F d Y H:i:s", filemtime('stats/live_users.txt')); ?>)</li>
		<li><a href="stats/live_userpass_dict.txt.tar.gz" target="_blank">live_userpass_dict.txt.tar.gz</a> (updated: <?php echo date ("F d Y H:i:s", filemtime('stats/live_userpass_dict.txt.tar.gz')); ?>)</li>
	</ul>
</div>


<p>Honeypot stats below:</p>







<div class="article">
		<?php include_once "glastopf_txt.php"; ?>
</div>
<div class="article">
		<?php include_once "kippo_txt.php"; ?>
</div>
<div class="article">
		<?php include_once "mfiles_txt.php"; ?>
</div>
		
		
		
		
		
		
		
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
	
	<!--	
	<div class="social">
		<a class="icon-link round-corner facebook fill" href="https://www.facebook.com/purificato.org" target="_blank"><i class="fa fa-facebook"></i></a>
		<a class="icon-link round-corner linkedin fill" href="https://it.linkedin.com/in/andreapurificato" target="_blank"><i class="fa fa-linkedin"></i></a>
		<a class="icon-link round-corner twitter fill" href="https://twitter.com/purificato_org" target="_blank"><i class="fa fa-twitter"></i></a>
		<a class="icon-link round-corner google-plus fill" href="https://www.google.com/+PurificatoOrgEthicalHack" target="_blank"><i class="fa fa-google-plus"></i></a>
	</div>
	-->	
	
	<footer>
		
	<p>HAND MADE &copy; Andrea Purificato - <a href="http://www.purificato.org" target="_blank">www.purificato.org</a></p>
	<p><a href="https://github.com/bunk3r/honeystats" target="_blank">HoneyStats project on Github</a></p>

	</footer>

</div> <!-- page-container -->

<?php 

// Close opened GeoIP db 
geoip_close($gi);
			
?>
	<link rel="stylesheet" type="text/css" property="stylesheet" id="honeystats-css" href="honeystats.css" title="honeystats" />
	<link rel="stylesheet prefetch" href="http://fonts.googleapis.com/css?family=Open+Sans:400,700" type="text/css" property="stylesheet prefetch"  />
	<link rel="stylesheet prefetch" href="http://fonts.googleapis.com/css?family=Play:400,700" type="text/css" property="stylesheet prefetch" />
	<link rel="stylesheet prefetch" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" property="stylesheet prefetch"  />
</body>

</html>		
				
  	

