<?php require('caesar.php'); ?>
<?php require('vigenere.php'); ?>
<?php require('parameters.php'); ?>
<?php include_once('sanitize.php'); ?>


<!DOCTYPE html>
<html lang="en">
<head>

	<title>My Encryption Super System</title>
	<meta charset='utf-8'>

    <link href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css' rel='stylesheet'>
    <link href='https://maxcdn.bootstrapcdn.com/bootswatch/3.3.7/flatly/bootstrap.min.css' rel='stylesheet'>
    <link href='css/styles.css' rel='stylesheet'>

</head>
<body>

	<div class="container">

		<h1>My Encryption Super System</h1>

			<div class="quote">
				<p>If MESS is the future of encryption, better clean out your closet!</p>
				<br>
			</div>

			<form method='POST' action='index.php'>

				<fieldset class='radios'>
		            <legend>Select your cipher</legend>
		            <label><input type='radio' name='cipher' value='caesar' id = 'caesar'> Hail, Caesar!</label>
		            <label><input type='radio' name='cipher' value='vigenere' id = 'vigenere'> Vigenere, si'l vouz plait!</label>
        		</fieldset>

				<br>
				<label for='plaintext'>Message to be encrypted</label>
				<input type='text' name='plaintext' id='plaintext'>

				<label for='key'>Encryption Key</label>
				<input type='text' name='key' id='key'>

				<br>
				<input type='checkbox' name='obfuscate' id='obfuscate'>
				<label for='obfuscate'>Obfuscate display of encrypted message</label>

				<br><br>
				<input type='submit' class='btn btn-primary btn-small'>

			</form>

			<?php if(!$obfuscate): ?>
				<div class='alert alert-info'>Ciphertext: <?= $ciphertext?></div>
				<?php else: ?>
					<div class='alert alert-success'><?= $ciphertext?></div>
			<?php endif; ?>



	</div>

</body>
</html>
