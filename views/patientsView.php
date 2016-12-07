<?php foreach ($vars as $patientItem): ?>
    <a href="patients/profile/<?php echo $patientItem['id']; ?>">
        <?php echo $patientItem['name']; ?>
    </a>
    - возраст: <?php echo $patientItem['birthday']; ?><br>
<?php endforeach; ?>
