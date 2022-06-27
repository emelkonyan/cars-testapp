<h1>Welcome!</h1>
<form method="get" action="/">
    <input name="search[keyword]" value="<?= @$this->search['keyword'] ?>" plceholder='search text'>
    Platform: <?= $this->platformHtml ?>
    <input type="submit" value="search">
</form>

<?php 
    foreach($this->libs as $l) {
?>
    <li style="border:1px solid red; display: block; margin-bottom:5px">
        <?= $l->name?> <br><?= $l->description ?>
        <br>
        <a href="<?= $l->repository_url ?>"> <?= $l->repository_url ?> </a>
        <?php if(UserModel::isLogged()) { ?>
            <form method=post action="/addlib">
                <input type=hidden name=lib[name] value="<?= $l->name ?>">
                <input type=hidden name=lib[description] value="<?= $l->description ?>">
                <input type=hidden name=lib[url] value="<?= $l->repository_url ?>">
                <?php if(in_array($l->name, $this->userSubs)) {  ?>
                    --- You are already subscribed to this lib ---
                <?php } else { ?>
                    <input type=submit value="Add this lib">
                <?php } ?>
            </form>
        <?php } else { ?>
            <p>Log in to subscribe to this lib</p>
        <?php } ?>
    </li>
<?php
    }
?>