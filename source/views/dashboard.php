<h1>Hello, <?= $this->user['name'] ?> ! </h1>
<h2>Here are your subs</h2>
<?php 

    if(!$this->subs) {
?>
    <h3>You have no subscriptions</h3>
<?php } else {
    foreach($this->subs as $row) {
        $s = json_decode($row['payload']);
?>
    <li style="border:1px solid red; display: block">
        <?= $s->name?> <br><?= $s->description ?>
        <br>
        <a href="<?= $s->url ?>"> <?= $s->url ?> </a>
        <form method=post action="/removelib">
                <input type=hidden name=libid value="<?= $row['id'] ?>">
                <input type=submit value="Remove this lib">
            </form>
    </li>
<?php
    }
}    
?>