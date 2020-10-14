function getResults() {
	var about= new XMLHttpRequest();
    about.onreadystatechange=function()
    {
        if(this.readyState==4&&this.status==200)
            {
                document.getElementById("about").innerHTML=this.responseText;
            }
    };
	about.open("GET","printResults.php",true);
	about.send();
}