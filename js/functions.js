function getCookie(cname) {
    var name = cname + "=";
    var ca = document.cookie.split(';');
    for(var i = 0; i <ca.length; i++) {
        var c = ca[i];
        while (c.charAt(0)==' ') {
            c = c.substring(1);
        }
        if (c.indexOf(name) == 0) {
            return c.substring(name.length,c.length);
        }
    }
    return "";
}
function showHide(id)
{
    var element = document.getElementById(id);
    if(element.style.display == "block")
    {
        element.style.display = "none";
    }
    else
    {
        element.style.display = "block";
    }
}

function hide(id)
{
    document.getElementById(id).style.display = "none";
}

function show(id)
{
    document.getElementById(id).style.display = "block";
}
function resize(option)
{
    if(option == 0)
    {
        document.getElementById("navigation").style.width = "100%";
        document.getElementById("menu").style.width = "14%";
        document.getElementById("content").style.width = "80%";
    }
    else if(option == 1)
    {
        document.getElementById("navigation").style.width = "75%";
        document.getElementById("menu").style.width = "24%";
        document.getElementById("content").style.width = "70%";
    }
}