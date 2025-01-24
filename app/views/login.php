<h2>Login</h2>

<form action="/login/store" method="post">
    <input type="text" name="email" placeholer="Seu email." value="john.doe@example.com">
    <input type="password" name="password" placeholer="Sua senha." value="123">
    <button type="submit">Logar</button>
</form>

<br />


<?php echo flash('login');?>