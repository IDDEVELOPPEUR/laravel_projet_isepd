<!doctype html>
<html lang="fr">
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Inscription</title>
</head>
<body>

<div class="container">

    @if(session('status'))
    <div>{{session('status')}}</div>
    @endif
<ul>

    @foreach($errors->all() as $error)
        <li>{{$error}} </li>

    @endforeach
</ul>
    <form action ="/inscrire" method="post">
        @csrf

        <div class="form-group">
            <label for="prenom">Prénom</label>
            <input type="text" class="form-control" id="prenom" name="prenom" placeholder="Mettez votre prénom !">
        </div>

        <div class="form-group">
            <label for="nom">Nom</label>
            <input type="text" class="form-control" id="nom" name="nom" placeholder="Mettez votre nom !">
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="form-control" id="email" name="email" placeholder="monEmail@exemple.com">
        </div>

        <div class="form-group">
            <label for="telephone">Téléphone</label>
            <input type="tel" class="form-control" id="telephone" name="telephone" placeholder="771234567">
        </div>
             <div class="form-group">
            <label for="adresse">Adresse</label>
            <input type="text" class="form-control" id="adresse" name="adresse" placeholder="">
        </div>

        <div class="form-group">
            <label for="password">Mot de passe</label>
            <input type="password" class="form-control" id="password" name="password" placeholder="**************">
        </div>
        <div class="form-group">
            <label for="password_confirmation">Confirmer mot de passe</label>
            <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="**************">
        </div>
        <input type="submit" value="Inscrire" name="inscrire" class="btn btn-primary my-2">

    </form>
</div>
</body>
</html>
