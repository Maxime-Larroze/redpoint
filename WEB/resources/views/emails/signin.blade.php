<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <title>Création de votre compte Redpoint</title>  
</head>
    <body>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="jumbotron jumbotron-fluid">
                        <div class="container">
                            <h1>Création de votre compte Redpoint</h1>      
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <p>Voici vos informations de connexion :</p>
    <ul>
      <li><strong>Nom</strong> : {{ $user['nom'] }}</li>
      <li><strong>Prénom</strong> : {{ $user['prenom'] }}</li>
      <li><strong>Identifiant</strong> : {{ $user['identifiant_unique'] }}</li>
      <li><strong>Mot de passe provisoir</strong> : {{ $tmp_password }}</li>
    </ul>
  </body>
</html>