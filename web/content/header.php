<head>
    <meta charset="utf-8">
    <meta name="description" content="<?php if (isset($this->post)) :?><?php echo $this->post->description ?><?php else: ?>Letras, números y dibujos por doquier. QUIQUID LATINE DICTUM SIT ALTUM VIDITUR<?php endif; ?>">
    <meta name="keywords" content="<?php if (isset($this->post)) :?><?php foreach ($this->post->terms as $t) {echo $t->name . ',';} ?>Leprosystems<?php else: ?>Software, Cuentos, Blog, Musica, Dibujos, Noticias.<?php endif; ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0">

    <title><?php if (isset($this->post)) {echo $this->post->title . ' - ';} ?>LEPROSYSTEMS</title>

    <link rel="shortcut icon" href="/favicon.ico">
    <link rel="stylesheet" media="all" href="<?php echo BASE_URL ?>content/css/normalize.min.css">
    <link rel="stylesheet" media="all" href="<?php echo BASE_URL ?>content/css/main.css">
    <script src="<?php echo BASE_URL ?>content/js/modernizr.js"></script>
    <script src="<?php echo BASE_URL ?>content/js/jquery.js"></script>
    <script src="<?php echo BASE_URL ?>content/js/history.js"></script>

    <!-- Analystics :) -->
    <script type="text/javascript">
      var _gaq = _gaq || [];
      _gaq.push(['_setAccount', 'UA-8155451-3']);
      _gaq.push(['_trackPageview']);
    
      (function() {
        var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
        ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
        var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
      })();
    </script>
</head>