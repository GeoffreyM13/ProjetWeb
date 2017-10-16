<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="utf-8">
	<title>Black Manba Face!</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/stylebis.css" rel="stylesheet" type="text/css" >

</head>
<body>
<!-- j'ai le droit de mettre des commentaires dans mon fichier HTML -->
<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>

    <div id="layout" class="div_error_layout"> <?php echo $context->data; ?> <?php echo $context->error; ?> </div>

	<?php include($template_view); ?>
</body>
</html>
