<html>
<head>
	<title><?php echo $pageTitle; ?></title>
	<link rel="stylesheet" href="<?php echo BASE_URL; ?>css/bootstrap.css" type="text/css">
	<link rel="stylesheet" href="<?php echo BASE_URL; ?>css/style.css" type="text/css">

	<link rel="stylesheet" href="<?php echo BASE_URL; ?>css/animations.css" type="text/css">
	<link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Oswald:200,300,400,500,700" type="text/css">

	<link rel="shortcut icon" href="<?php echo BASE_URL; ?>favicon.ico">
	<link rel="apple-touch-icon" href="<?php echo BASE_URL; ?>favicon.ico" sizes="153x153" />

		
<!--
	<script type="text/javascript">
	  var _paq = _paq || [];
	  /* tracker methods like "setCustomDimension" should be called before "trackPageView" */
	  _paq.push(['trackPageView']);
	  _paq.push(['enableLinkTracking']);
	  (function() {
	    var u="//localhost:8888/piwik/";
	    _paq.push(['setTrackerUrl', u+'piwik.php']);
	    _paq.push(['setSiteId', '1']);
	    var d=document, g=d.createElement('script'), s=d.getElementsByTagName('script')[0];
	    g.type='text/javascript'; g.async=true; g.defer=true; g.src=u+'piwik.js'; s.parentNode.insertBefore(g,s);
	  })();
	  
	</script>
-->
	
</head>
<body>
		<div id="main" data-transition="moveup">
			<div class="header">

		<div class="wrapper">

			<h1 class="branding-title"><a href="<?php echo BASE_URL; ?>"><img class="hero" src="<?php echo BASE_URL; ?>images/yugioh-tcg-logo.png" width="300" alt="Yu-Gi-Oh! Trading Card Game"></a></h1>

			<ul class="nav">
				<?php
				  /* list items with a class of "on" indicate the current section; those links 
				   * are underlined in the CSS to communicate that back to the site visitor;
				   * the $section variable is set in each individual file
				   */
				?>
				<li class="home <?php if ($section == "home") { echo "on"; } ?>"><a href="<?php echo BASE_URL; ?>">Home</a></li>
				<li class="sets <?php if ($section == "sets") { echo "on"; } ?>"><a href="<?php echo BASE_URL; ?>sets/">Sets</a></li>
				<li class="cards <?php if ($section == "cards") { echo "on"; } ?>"><a href="<?php echo BASE_URL; ?>cards/">Cards</a></li>
				<li class="search <?php if ($section == "search") { echo "on"; } ?>"><a href="<?php echo BASE_URL; ?>search/">Search</a></li>
			</ul>

		</div>

	</div>

		

		<div id="content" class="sceneElement" data-viewport="0">