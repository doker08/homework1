    <?php foreach ($vars as $doctorItem) : ?>
        <a href="/doctors/profile/<?php echo $doctorItem['id']; ?>">
            <?php echo $doctorItem['name'] ?>
        </a> -
        <?php echo $doctorItem['post'] ?><br>
    <?php endforeach;?>

