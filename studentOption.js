function StudentOption(x)
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
        about.open("Get","Borrow.php",true);
        about.send();
    }
    else if(x===2){
        about.open("Get","Return.php",true);
        about.send();
    }
    else if(x===3) {
        about.open("Get","Search.php",true);
        about.send();  
    }
    else{
        about.open("Get","UpdateUserDetails.php",true);
        about.send();
    }

}