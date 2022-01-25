 <!DOCTYPE html>
<!-- code by webdevtrick ( https://webdevtrick.com) -->
<html>
	<head>
		<title>Simple Calculator In PHP | Webdevtrick.com</title>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">

		<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" rel="stylesheet">
	</head>
	<body>

		<div class="container" style="margin-top: 50px">

			<?php

				// If the submit button has been pressed
				if(isset($_POST['submit']))
				{
					// Check number values
					if(is_numeric($_POST['number1']) && is_numeric($_POST['number2']) && is_numeric($_POST['number3']))
					{
						// Calculate total
							$total = $_POST['number1'] - $_POST['number2'] - $_POST['number3'];
							$percent = $total / 100 * 20;
						// Print total to the browser
						echo "<h1>{$_POST['number1']} - {$_POST['number2']} - {$_POST['number3']} equals {$total}</h1>";
						//Print 20% to screen
						echo "20% is $percent";

					} else {

						// Print error message to the browser
						echo 'Numeric values are required';

					}
				}
			// end PHP. Code by webdevtrick.com
			?>

		    <!-- Calculator form by webdevtrick.com -->
		    <form method="post" action="calculate.php">
		        <input name="number1" type="text" class="form-control" style="width: 150px; display: inline" />
		        <input name="number2" type="text" class="form-control" style="width: 150px; display: inline" />
                        <input name="number3" type="test" class="form-control" style="width: 150px; display: inline" />
			<input name="submit" type="submit" value="Calculate" class="btn btn-primary" />
		    </form>
		</div>

	</body>
</html>
