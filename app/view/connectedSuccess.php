<div class="col-md-4 col-md-offset-1" id="divconnected">
  <h1>Connected to BlackManba ! </h1>
    <button class="btn btn-lg btn-primary" id="Submit" name="Submit" value="Login" type="Submit">Deconnexion</button>
</div>

<script>

    $(function() {
      $('#Submit').click(function() {
        $.ajax({
          type: 'GET',
		      dataType: 'html',
          url: 'https://pedago.univ-avignon.fr/~uapv1302596/ProjetWeb/BlackManbaAjax.php?action=disconnected',
          success: function(data) {
   		      $('#layout').empty().prepend("Vous êtes bien deconnecté!");
		        $('#divconnected').load('app/view/loginSuccess.php .container');
          },
          error: function() {
            alert('La requête n\'a pas abouti'); }
          });
        });
      });

</script>
