<?php
/*
 * Created by PhpStorm.
 * User: geoffrey
 * Date: 09/10/2017
 * Time: 18:28
 */
 ?>
<!-- Martinez Geoffrey -->
<!-- page qui affiche un formulaire pour ce connecté au site -->

<div class = "container">
    <div class="wrapper">
        <form method="post" name="Login_Form" action="BlackManba.php?action=login" class="form-signin">

            <h3 class="form-signin-heading">Please Sign In !</h3>
            <hr class="colorgraph"><br>

            <input type="text" class="form-control" name="username" placeholder="Username" required="" autofocus="" />
            <input type="password" class="form-control" name="password" placeholder="Password" required=""/>

            <button class="btn btn-lg btn-primary btn-block"  name="Submit" value="Login" type="Submit">Login</button>
        </form>
    </div>
</div>

<script>

</script>


