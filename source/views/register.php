<form method=post action="/register">
    <h1>Register</h1>
    <?php if(@$this->error) { ?>
        <h2 style="color: red"> <?= $this->error ?> </h2>
    <?php } ?>
    <input type="text" name="username" placeholder="username">
    <br>
    <input type="password" name="password" placeholder="password">
    <br>
    <input type="submit">
</form>