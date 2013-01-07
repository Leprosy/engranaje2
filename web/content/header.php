<head>
    <meta charset="utf-8">
    <meta name="description" content="">
    <meta name="keywords" content="">
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