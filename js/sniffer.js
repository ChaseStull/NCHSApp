window.window.onload = function setUI()
{
    if(navigator.userAgent.match(/iPad/i))
    {
        if (window.navigator.standalone == false) {
            document.getElementById("promote").style.display = "block";
        }
        document.getElementById("css").setAttribute("href", "css/TStyle.css");
    }
    if(navigator.userAgent.match(/iPhone/i))
    {
        if (window.navigator.standalone == false) {
            document.getElementById("promote").style.display = "block";
        }
        document.getElementById("css").setAttribute("href", "css/MStyle.css");
    }
    if(navigator.userAgent.match(/Android/i))
    {
        //code for Android here 
    }
    if(navigator.userAgent.match(/BlackBerry/i)){
        //code for BlackBerry here 
    }
    if(navigator.userAgent.match(/webOS/i))
    {
        //code for webOS here 
    }
}