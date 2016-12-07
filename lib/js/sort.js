function sort_doctors(id)
{
    if(id == 1){
        document.getElementById(id).id = 2;
        var sort = "ASC";
    }else if(id == 2){
        document.getElementById(id).id = 1;
        sort = "DESC";
    }

    var xmlhttp;
    if (window.XMLHttpRequest)
    {// код для IE7+, Firefox, Chrome, Opera, Safari
        xmlhttp=new XMLHttpRequest();
    }
    xmlhttp.onreadystatechange=function()
    {
        if (xmlhttp.readyState==4 && xmlhttp.status==200)
        {
            document.getElementById("doctors").innerHTML=xmlhttp.responseText;
        }
    }
    xmlhttp.open("GET","/doctors/index/" + sort,true);
    xmlhttp.send();
}

function sort_patients(id)
{
    if(id == 3){
        document.getElementById(id).id = 4;
        var sort = "ASC";
    }else if(id == 4){
        document.getElementById(id).id = 3;
        sort = "DESC";
    }

    var xmlhttp;
    if (window.XMLHttpRequest)
    {// код для IE7+, Firefox, Chrome, Opera, Safari
        xmlhttp=new XMLHttpRequest();
    }
    xmlhttp.onreadystatechange=function()
    {
        if (xmlhttp.readyState==4 && xmlhttp.status==200)
        {
            document.getElementById("patients").innerHTML=xmlhttp.responseText;
        }
    }
    xmlhttp.open("GET","/patients/index/" + sort,true);
    xmlhttp.send();
}