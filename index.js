function data( x)
{
    var about= new XMLHttpRequest();
    about.onreadystatechange=function()
    {
        if(this.readyState==4&&this.status==200)
            {
                document.getElementById("about").innerHTML = this.responseText;
            }
    };
   if(x===1){
    about.open("Get","contuctUs.php",true);
    about.send();
    }
    else if(x===2){
        about.open("Get","register.php",true);
        about.send();  
    }
    else if(x===3) {
        about.open("Get","login.php",true);
        about.send();  
    }
    else if(x===4){
        about.open("Get","Web Design.php",true);
        about.send();  
    }
    else if(x===5){
        about.open("Get","Data Structure.php",true);
        about.send();  
    }
    else if(x===6){
        about.open("Get","Database.php",true);
        about.send();  
    }
    else if(x===7){
        about.open("Get","Information System.php",true);
        about.send();  
    }
    else if(x===8){
        about.open("Get","Math.php",true);
        about.send();  
    }
    else if(x===9){
        about.open("Get","Physics.php",true);
        about.send();  
    }
    else if(x===10){
        about.open("Get","Statistics.php",true);
        about.send();  
    }
    else if(x===11){
        about.open("Get","Other.php",true);
        about.send();
    }
    else if(x===13){
        about.open("Get","Add Book.php",true);
        about.send();
    }
   else if(x===14){
        about.open("Get","updateBook.php",true);
        about.send();
    }
    else if(x===15) {
        about.open("Get","Search.php",true);
        about.send();  
    }
    else{
        about.open("Get","UpdateUserDetails.php",true);
        about.send();
    }
}




