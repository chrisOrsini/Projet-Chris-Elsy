<?php
include 'functions.php';
// Your PHP code here.

// Home Page template below.
?>

<?=template_header('Home')?>

<div class="content">
	<h2>Chris & Elsie vous présente leur projet</h2>
	
</div>
<div class="container">
        <h1>Inscription</h1><br><br>
        <form class="row g-3 needs-validation" action="" method="post">
            <div class="col-md-4">
                <label for="validationCustom01" class="form-label">First name</label>
                <input type="text" name="nom" class="form-control" id="validationCustom01" placeholder="Mark" required maxlength="25">
                <div class="valid-feedback">
                    Looks good!
                </div>
            </div>
            <div class="col-md-4">
                <label for="validationCustom02" class="form-label">Last name</label>
                <input type="text" name="prenom" class="form-control" id="validationCustom02" placeholder="Otto" required maxlength="25">
                <div class="valid-feedback">
                    Looks good!
                </div>
            </div>
            <div class="col-md-4">
                <label for="validationCustomUsername" class="form-label">Username</label>
                <div class="input-group has-validation">
                    <span class="input-group-text" id="inputGroupPrepend">@</span>
                    <input type="email" name="mail" class="form-control" id="validationCustomUsername" placeholder="example@gmail.com" aria-describedby="inputGroupPrepend" required maxlength="35">
                    <div class="invalid-feedback">
                        Please choose a username.
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <label for="validationCustom05" class="form-label">Password</label>
                <input type="password" name="mdp" class="form-control" placeholder="......" id="validationCustom05" maxlength="500" required>
            </div>
            <div class="col-md-6">
                <label for="validationCustom03" class="form-label">City</label>
                <input type="text" name="city" class="form-control" placeholder="France" id="validationCustom03" required maxlength="25">
            </div>
            <div class="col-md-3">
                <label for="validationCustom04" class="form-label">Contry</label>
                <select class="form-select" name="contry" id="validationCustom04" required>
                    <option>Paris</option>
                    <option>Marseille</option>
                    <option>Bordeau</option>
                    <option>Orleans</option>
                </select>
            </div>
            <div class="col-md-3">
                <label for="validationCustom05" class="form-label">Code Postal</label>
                <input type="text" name="postal" class="form-control" placeholder="92000" id="validationCustom05" required maxlength="05">
                <div class="invalid-feedback">
                    Please provide a valid zip.
                </div>
            </div>
            <div class="col-12">
                <div class="form-check">
                    <input class="form-check-input" name="accepte" type="checkbox" id="invalidCheck">
                    <label class="form-check-label" for="invalidCheck">
                        Agree to terms and conditions
                    </label>
                </div>
            </div>
            <div class="col-12">
                <input class="btn btn-primary" name="envoie" type="submit" value="Submit form">
            </div>
        </form>
    </div>

<?=template_footer()?>