<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="/Assets/css/LoginStyle.css">
    <title>Knihovna Bolatice</title>
</head>

<body>

    <div class="container" id="container">
        <div class="form-container sign-in">
            <form method="post" action="/admin/login">
                <h1>Přihlášení</h1>
               
                <span> <br></span>
                <input name="username" type="text" placeholder="Uživatelské jméno">
                <input name="password" type="password" placeholder="Heslo">
                <a href="#">Zapomenuté heslo?</a>
                <button type="submit">Přihlásit se</button>
            </form>
        </div>
        <div class="toggle-container">
            <div class="toggle">
                <div class="toggle-panel toggle-right">
                    <a href="/"><img src="/Assets/img/ZLUTA_MKB_RGB.png" alt="Logo" width="80%"></a>
                    <p>{zde info}</p>

                </div>
            </div>
        </div>
    </div>

</body>

</html>
