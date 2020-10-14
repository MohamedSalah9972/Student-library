function getExtending()
{
    var about= new XMLHttpRequest();
    about.onreadystatechange=function()
    {
        if(this.readyState==4&&this.status==200)
            {
                document.getElementById("about").innerHTML=this.responseText;
            }
    };

    
    about.open("Get","extendingPeriod.php",true);
    about.send();
   

}