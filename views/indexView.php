<?php include("/lib/template/head.php") ?>
<div class="box">
    <div class="block1">
        <b>Врачи:</b><br>
        <div id="doctors">
            <?php foreach ($vars as $doctorItem) : ?>
                <a href="/doctors/profile/<?php echo $doctorItem['id']; ?>">
                    <?php echo $doctorItem['name'] ?>
                </a> -
                <?php echo $doctorItem['post'] ?><br>
            <?php endforeach;?>
        </div>
        <br>
        <button id='2' type="button" onclick="sort_doctors(this.id)">Изменить сортировку докторов</button>
    </div>
    <div class="block2">
        <b>Пациенты:</b><br>
        <div id="patients">
            <?php foreach ($vars2 as $patientItem): ?>
                <a href="patients/profile/<?php echo $patientItem['id']; ?>">
                    <?php echo $patientItem['name']; ?>
                </a> -
                возраст: <?php echo $patientItem['birthday']; ?><br>
            <?php endforeach; ?>
        </div>
        <br>
        <button id='4' type="button" onclick="sort_patients(this.id)">Изменить сортировку пациентов</button>
    </div>
</div>
<?php include("/lib/template/footer.php") ?>
