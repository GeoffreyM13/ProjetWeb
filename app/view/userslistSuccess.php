<!--Fait par Dimitri Hueber-->
<style type="text/css">
    .image-circle {
        float: none;
        margin: 0 auto;
        width: 8%;
        height: 8%;
        -webkit-border-radius: 50% !important;
        -moz-border-radius: 50% !important;
        border-radius: 50% !important;
    }
</style>
<script type="text/javascript">
    $(document).ready(function() {
        $('#list_users').DataTable();
        } );
</script>
    <!--Affiche un tableau avec les utilisateurs
        le tableau peut être trier 
        une fonction de recherche y est intégré aussi avec le js-->
    <table id="list_users" class="display" width="100%" cellspacing="0">
        <thead>
            <tr>
                <th>Nom</th>
                <th>Prenom</th>
                <th>Identifiant</th>
                <th>Avatar</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($context->users as $data ){ ?>
            <?php 
            if ($data->nom!=context::getSessionAttribute('nom') && $data->prenom!=context::getSessionAttribute('prenom') && $data->identifiant!=context::getSessionAttribute('identifiant')){
                ?>
                <tr>
                    <td><a href="BlackManba.php?action=showmessage&id=<?php echo $data->id ?>"><?php echo $data->nom ?></a></td>
                    <td><?php echo $data->prenom ?></td>
                    <td><?php echo $data->identifiant ?></td>
                    <td><a href="BlackManba.php?action=showmessage&id=<?php echo $data->id ?>"><img class="image-circle" src="<?php echo (!empty($data->avatar)?$data->avatar:'images/no-avatar.png') ?>"></a></td>
                </tr>
            <?php } ?>
            <?php } ?>
        </tbody>
    </table>
