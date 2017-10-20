<?php
/*
 * Created by PhpStorm.
 * User: geoffrey
 * Date: 20/10/2017
 * Time: 11:51
 */

?>




<div class="row">

    <div class="col-md-6 col-md-offset-2">
        <h2>Liste des Utilisateurs de l'application</h2>
        <p>Vous pouvez cliquer sur un utilisateur pour voir sont profil :</p>
        <table class="table table-striped">
            <thead>
            <tr>
                <th>avatar</th>
                <th>nom</th>
                <th>prenom</th>
                <th>identifiant</th>
            </tr>
            </thead>


            <?php foreach($context->users as $data ): ?>

                <tbody>
                <tr>

                    <td><img class="image-circle" src="<?php echo $data->avatar; ?>" width="50" height="50"></td>
                    <td><?php echo $data->nom ?></td>
                    <td><?php echo $data->prenom ?></td>
                    <td><?php echo $data->identifiant ?></td>
                    <td><a type="button" class="btn btn-primary" href="petitTweet.php?action=view_profilUsers&id=<?php echo $data->id ?>">Profil</a></td>
                </tr>
                </tbody>
            <?php endforeach; ?>
        </table>
    </div>
</div>