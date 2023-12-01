<h2>Login</h2>

<?php echo getFlash('message'); ?>

<form action="/login" method="post" id="box-login">
    <input type="text" name="email" placeholder="Seu Email">
    <input type="password" name="password" placeholder="Sua senha">
    <button type="submit">Login</button>
</form>