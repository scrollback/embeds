<html>

<head>
    <title>jws demo</title>
</head>

<body>
	<?php
		require_once("vendor/autoload.php");	
	?>
    <script>
        document.write('<script src="http' +
        	(location.protocol == 'https:' ? 's' : '') +
        	'://scrollback.io/s/sb.js"><\/script>');
    </script>
	
	<script>
		scrollback({
			room:"your-room-name",
			form:"canvas",
			jws: <?php
					$key = "secret-key";
					$token = array(
						"iss" => "your-domain",
						"aud" => "scrollback.io",
						"sub" => "email-id",
						"iat" => time(),
						"exp" => time() + 300
					);

					$jwt = JWT::encode($token, $key, "HS512");
					echo "\"".$jwt."\"";
				?>
		});
	</script>
	</body>
</html>