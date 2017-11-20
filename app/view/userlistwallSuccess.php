<!--Fait par Dimitri Hueber-->
<style type="text/css">
    .image-circle {
        float: none;
        margin: 0 auto;
        width: 15%;
        height: 8%;
        -webkit-border-radius: 50% !important;
        -moz-border-radius: 50% !important;
        border-radius: 50% !important;
    }
    .image-circle-user {
        float: none;
        margin: 0 auto;
        width: 40%;
       /*height: 20%; bug de taille */
        -webkit-border-radius: 50% !important;
        -moz-border-radius: 50% !important;
        border-radius: 50% !important;
    }
    .row-padding {
    margin-top: 25px;
    margin-bottom: 25px;
    }
    .scroll{
        overflow-y: scroll;
        max-height: 50%;
        width: 100%;
    }
</style>
<script type="text/javascript">
    $(function () {
    $( '#table' ).searchable({
        striped: true,
        oddRow: { 'background-color': '#f5f5f5' },
        evenRow: { 'background-color': '#fff' },
        searchType: 'fuzzy'
    })
});
</script>
<div class="row">
            <div class="col-lg-8 col-lg-offset-2">
                <input type="search" id="search" value="" class="form-control" placeholder="Search user">
            </div>
        </div>
        </br>
    <div class="scroll">
        
        <div class="row">
            <div class="col-lg-12" style="max-height: 500px;">
                <table class="table" id="table">
                        <?php foreach($context->users as $data ){ ?>
                        <?php 
                        if ($data->nom!=context::getSessionAttribute('nom') && $data->prenom!=context::getSessionAttribute('prenom') && $data->identifiant!=context::getSessionAttribute('identifiant')){
                        ?>
                        <tr>
                            <td><a href="BlackManba.php?action=showmessage&id=<?php echo $data->id ?>"><img class="image-circle-user" src="<?php echo (!empty($data->avatar)?$data->avatar:'images/no-avatar.png') ?>"></a></td>
                            <td><?php echo $data->prenom ?></td>
                            <td><a href="BlackManba.php?action=showmessage&id=<?php echo $data->id ?>"><?php echo $data->nom ?></a></td>
                        </tr>
                        <?php }} ?>
                </table>
            </div>
        </div>
    </div>

