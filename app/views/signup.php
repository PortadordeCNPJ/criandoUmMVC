<?php echo Flash('created');?>

<form method="post" action="signup/store">
    <input type="text" name="firstName" placeholder="Seu nome" class="form-control" value="<?php echo old('firstName'); ?>">
    <?php echo flash('firstName'); ?>


    <input type="text" name="lastName" placeholder="Seu sobrenome" class="form-control" value="<?php echo old('lastName'); ?>">
    <?php echo flash('lastName'); ?>


    <input type="text" name="email" placeholder="Seu email" class="form-control" value="<?php echo old('email'); ?>">
    <?php echo flash('email'); ?>


    <input type="text" name="password" placeholder="Seu senha" class="form-control" value="<?php echo old('password'); ?>">
    <?php echo flash('password'); ?>


    <button type="sumit">Signup</button>
</form>