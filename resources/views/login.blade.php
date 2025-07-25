<!doctype html>
<html lang="fr">
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>connexion</title>
</head>
<body>

<div class="container">

    @if(session('status'))
    <div>{{session('status')}}</div>
    @endif

    <h1 class="text-center text-success my-3 ">CONNEXION</h1>
    <form action ="/connecter" method="post">
    @csrf

        <div class="mb-3 form-group ">
            <label for="email">Email</label>
            <input type="email" class="form-control" id="email" name="email" placeholder="monEmail@exemple.com">
        </div>

        <div class="mb-3 form-group">
            <label for="password">Mot de passe</label>
            <input type="password" class="form-control" id="password" name="password" placeholder="**************">
        </div>

        <div class="text-center">
            <input type="submit" value="Connexion"  class="btn btn-primary mt-2 text-center px-4">
        </div>
    </form>
</div>

</body>
</html>
