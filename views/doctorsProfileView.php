<?php include("/lib/template/head.php") ?>
<h2><p id="name">Доктор: <?php echo $vars2['name']?></p></h2>
<a href="#" id="<?php echo $vars2['id']?>" onclick="change_name(this.id)">Изменить имя</a>

<h4>Должность: <?php echo $vars2['post']?></h4>
<b>Лечащиеся:</b><br>
<?php foreach ($vars as $doctorPatientsItem) : ?>
        <u></i><?php echo $doctorPatientsItem['name'] ?></u><br>
<?php endforeach;?>

<?php include("/lib/template/footer.php") ?>

<script>
    function change_name(id)
    {
        var name = prompt("Введите новое имя:");

        var xmlhttp;
        if (window.XMLHttpRequest)
        {// код для IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp=new XMLHttpRequest();
        }
        xmlhttp.onreadystatechange=function()
        {
            if (xmlhttp.readyState==4 && xmlhttp.status==200)
            {
                document.getElementById("name").innerHTML=xmlhttp.responseText;
            }
        }
        xmlhttp.open("GET","/doctors/set/" + id + '/' + name,true);
        xmlhttp.send();
    }
</script>