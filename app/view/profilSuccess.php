<!--
    Fait par Dimitri
-->


        <div class="container">
            <div class="row profile">
                <div class="col-lg-offset">
                    <div class="profile-sidebar">
                        <div class="profile-userpic">
                            <img src="<?php echo (!empty($context->profil->avatar)?$context->profil->avatar:'images/no-avatar.png') ?>" class="img-responsive" alt="">
                        </div>
                        <div class="profile-usertitle">
                            <div class="profile-usertitle-name">
                                <?php echo htmlspecialchars($context->profil->prenom)." " ?><?php echo htmlspecialchars($context->profil->nom) ?>
                            </div>
                            <div class="profile-usertitle-job">
                                <?php echo htmlspecialchars($context->profil->getDate())?>
                            </div>
                            <div class="profile-statut">
                                <?php echo (!empty(strip_tags($context->profil->statut))?$context->profil->statut:"Pas de statut") ?>
                            </div>
                            <?php
                              if($context->profil->id==$_SESSION['id']){?>
                            <div>
                              <form method="POST" action="BlackManba.php?action=profil">
                                <input type="text" name="modif_statut" placeholder="Nouveu Statut">
                                <button type="submit"><span class="glyphicon glyphicon-pencil" ></span></button>
                              </form>
                            </div>
                            <?php }?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
