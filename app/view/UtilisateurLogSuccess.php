<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
    <div class="">
        <div class="">
            <table>
                <tr>
                    <td rowspan="3"><img src="<?php echo (!empty($context->user->avatar)?$context->user->avatar:'images/no-avatar.png') ?>">
                    </td>
                    <td>
                        <?php echo $context->profil->nom ?>
                    </td>
                </tr>
                <tr>
                    <td>
                        <?php echo $context->profil->prenom ?>
                    </td>  
                </tr>
                <tr>
                    <td>
                        <?php echo date('d m Y',$context->profil->date_de_naissance) ?>
                    </td>  
                </tr>
            </table>
        </div>
    </div>
</body>
</html>