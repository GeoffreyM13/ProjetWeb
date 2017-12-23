<!--
    Fait par Dimitri
-->


        <div class="container">
            <div class="row profile">
                <div class="col-lg-offset">
                    <div class="profile-sidebar">
                        <div class="profile-userpic-profil" id="profile-userpic-profil">
                            <img src="<?php echo htmlspecialchars(!empty($context->profil->avatar)?$context->profil->avatar:'images/no-avatar.png') ?>" class="img-responsive" alt="">
                        </div>
                        <?php
                              if($context->profil->id==$_SESSION['id']){?>
                        <div class="update_profil_avatar">
                            <form method="POST" id="update_avatar" action="BlackManba.php?action=profil">
                                <input type="text" name="modif_avatar" id="modif_avatar" class="avatar" placeholder="Entrez l'url de votre avatar">
                                <button type="submit" class="change_avatar"><span class="glyphicon glyphicon-pencil" ></span></button>
                            </form> 
                        </div>
                        <?php }?>
                        <div class="profile-usertitle">
                            <div class="profile-usertitle-name">
                                <?php echo htmlspecialchars($context->profil->prenom)." " ?><?php echo htmlspecialchars($context->profil->nom) ?>
                            </div>
                            <div class="profile-usertitle-job">
                                <?php echo htmlspecialchars($context->profil->getDate())?>
                            </div>
                            <div class="profile-statut" id="profile-statut">
                                <?php echo (!empty(strip_tags($context->profil->statut))?$context->profil->statut:"Pas de statut") ?>
                            </div>
                            <?php
                              if($context->profil->id==$_SESSION['id']){?>
                            <div>
                              <form method="POST" id="update_statut" action="BlackManba.php?action=profil">
                                <input type="text" name="modif_statut" id="modif_statut" placeholder="Nouveu Statut">
                                <button type="submit" class="change_statut"><span class="glyphicon glyphicon-pencil" ></span></button>
                              </form>
                            </div>
                            <?php }?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
<!-- Fait par Dimitri HUEBER -->
<script>
    $(function() {
        $('#update_statut').submit(function( event ) {
            // Stop form from submitting normally
            event.preventDefault();

            // Get some values from elements on the page:
            var $formVal = $(this).find( "input[name='modif_statut']" )
            var term = $formVal.val();

            if (term == '') {
                return;
            }

            // Send the data using post
            $.post('./BlackManbaAjax.php?action=profil', { modif_statut: term } )
            .done(function (data) {
                $('#profile-statut').text(data);
                $formVal.val('');
            })

            return false;
        });
    });
    $(function() {
        $('#update_avatar').submit(function( event ) {
            // Stop form from submitting normally
            event.preventDefault();

            // Get some values from elements on the page:
            var $formVal = $(this).find( "input[name='modif_avatar']" )
            var term = $formVal.val();

            if (term == '') {
                return;
            }
            
            // Send the data using post
            $.post('./BlackManbaAjax.php?action=profil', { modif_avatar: term } )
            .done(function (data) {
                data = JSON.parse(data);
                $formVal.val('');
                $('#profile-userpic-profil').load('./BlackManbaAjax.php?action=profil #profile-userpic-profil')
            })

            return false;
        });
    });
</script>