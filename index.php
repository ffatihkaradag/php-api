<?php
	require('connect.php');
	$ch = curl_init();

	curl_setopt($ch, CURLOPT_URL, 'http://localhost/test/api/posts.php');
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

	$result = curl_exec($ch);
	if (curl_errno($ch)) {
		echo 'Error:' . curl_error($ch);
	}
	curl_close($ch);
	
	$posts = json_decode($result, true);
	
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <title>test</title>
	<style>
	@import url('https://fonts.googleapis.com/css2?family=Roboto&display=swap');
	body{
		font-family: 'Roboto', sans-serif;
		
		color:#000;
		padding-top:4rem;
	}
	.navbar-custom{background-color:pink;}
	.navbar-custom a{color:#000;}
	.br{border:1px solid black}
	</style>
  </head>
  <body>
	<nav class="navbar navbar-expand-lg navbar-custom fixed-top">
	  <div class="container">
		<a class="navbar-brand" href="<?=baseURL?>">test</a>
		  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		  </button>

		  <div class="collapse navbar-collapse" id="navbarSupportedContent">
			<ul class="navbar-nav ml-auto">
			  <li class="nav-item"><a class="nav-link" href="<?=baseURL?>">Home</a></li>
			</ul>
		  </div>
	  </div>
	</nav>
    <div class="container">
		<div class="row">
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<?php foreach($posts['posts'] as $post): ?>
				<div class="card mb-4">
				  <div class="card-header"><?=$post['title']?></div>
				  <div class="card-body">
					<?=$post['body']?>
				  </div>
				  <div class="card-footer">
					<?=date('d.m.Y h:i',strtotime($post['created_at']))?>
				  </div>
				</div>
				<?php  endforeach; ?>
			</div>
		</div>
	</div>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.slim.min.js" integrity="sha512-/DXTXr6nQodMUiq+IUJYCt2PPOUjrHJ9wFrqpJ3XkgPNOZVfMok7cRw6CSxyCQxXn6ozlESsSh1/sMCTF1rL/g==" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
	<script>
		$( document ).ready(function() {
			console.log( "ready!" );
		});
	</script>
  </body>
</html>