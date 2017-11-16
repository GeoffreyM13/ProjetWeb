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
    .row-padding {
    margin-top: 25px;
    margin-bottom: 25px;
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
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-lg-offset-4">
                <input type="search" id="search" value="" class="form-control" placeholder="Search user">
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <table class="table" id="table">
                    <thead>
                        <tr>
                            <th>Avatar</th>
                            <th>Prenom</th>
                            <th>Nom</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($context->users as $data ){ ?>
                        <?php 
                        if ($data->nom!=context::getSessionAttribute('nom') && $data->prenom!=context::getSessionAttribute('prenom') && $data->identifiant!=context::getSessionAttribute('identifiant')){
                        ?>
                        <tr>
                            <td><a href="BlackManba.php?action=showmessage&id=<?php echo $data->id ?>"><img class="image-circle" src="<?php echo (!empty($data->avatar)?$data->avatar:'images/no-avatar.png') ?>"></a></td>
                            <td><?php echo $data->prenom ?></td>
                            <td><a href="BlackManba.php?action=showmessage&id=<?php echo $data->id ?>"><?php echo $data->nom ?></a></td>
                        </tr>
                        <?php }} ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

