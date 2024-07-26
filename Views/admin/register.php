<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrace</title>
</head>
<body>

<h2>Registrace</h2>

<form action="/admin/registrace" method="post">
    <!-- user_id není uvedeno, protože se obvykle automaticky generuje (např. auto-increment) -->

    <label for="username">Uživatelské jméno:</label>
    <input type="text" id="username" name="username" required>

    <label for="password">Heslo:</label>
    <input type="password" id="password" name="password" required>

    <label for="email">Email:</label>
    <input type="email" id="email" name="email" required>

    <label for="first_name">Jméno:</label>
    <input type="text" id="first_name" name="first_name" required>

    <label for="last_name">Příjmení:</label>
    <input type="text" id="last_name" name="last_name" required>

    <label for="is_admin">Je admin:</label>
    <input type="checkbox" id="is_admin" name="is_admin">

    <button type="submit">Registrovat</button>
</form>

</body>
</html>
