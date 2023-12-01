<h2>Create</h2>

<form action="/user/store" method="post">
    <input type="text" name="firstName" placeholder="Seu Nome">
    <?php echo getFlash('firstName'); ?>
    <br>
    <input type="text" name="lastName" placeholder="Seu Sobrenome">
    <?php echo getFlash('lastName'); ?>
    <br>
    <input type="text" name="email" placeholder="Seu Email">
    <?php echo getFlash('email'); ?>
    <br>
    <input type="password" name="password" placeholder="Sua Senha">
    <?php echo getFlash('password'); ?>
    <br>
    <button type="submit">Create</button>
</form>