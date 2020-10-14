function admin( x)
{
    var about= new XMLHttpRequest();
    about.onreadystatechange=function()
    {
        if(this.readyState==4&&this.status==200)
            {
                document.getElementById("about").innerHTML=this.responseText;
            }
    };

    if(x===1){
        about.open("Get","contuctUs.php",true);
        about.send();
    }
   else if(x===2){
        about.open("Get","adminOption.php",true);
        about.send();
        }
        else {
            about.open("Get","logOut.php",true);
            about.send();  
        }

}