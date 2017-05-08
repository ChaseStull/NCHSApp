function isOnline(id)
{
    if(!navigator.onLine)
    {
        document.getElementById(id).style.display = "block";
    }
}