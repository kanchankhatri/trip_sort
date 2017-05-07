<!DOCTYPE html>
<html>
<head>
	<title>Trip Way Points</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" media="screen">
</head>
<body>
	<!-- <h1>Trip Way Points</h1> -->
	<script src="https://code.jquery.com/jquery-3.2.1.min.js"
  integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
  crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>	
	<nav class="navbar navbar-default navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>            
          </button>
          <a class="navbar-brand" href="#">Trip Sort</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
            <li class="active"><a href="#">Home</a></li>                        
          </ul>          
        </div>
      </div>
    </nav>	
	<div class="container">          
		
		<div class="jumbotron">
        <h1>Trip Sort Example</h1>
      </div>
      <?php echo $content;?>          
	</div>    
	<footer>
		<p>Posted by: Kanchan Khatri</p>  			
	</footer>
	<script src="<?php echo ASSETS_DIR.'common.js'?>"></script>
</body>
</html>