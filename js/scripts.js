
var mainCat=document.getElementById("mainCat");

mainCat.addEventListener("change",updateSub,true);

function updateSub(e)
{
    var id=e.currentTarget.value;
    ajaxRequest(id);
    e.preventDefault();
    console.log("change");
}

function ajaxRequest(id)
{
    var ajax2=new XMLHttpRequest();
    ajax2.onreadystatechange=function (){
        if(ajax2.readyState==4)
        {
            var sub=document.getElementById("subSelect");
            sub.innerHTML=ajax2.responseText;
            console.log("done");
        }
    };
    var str="../includes/subCat.php?id="+id;
    ajax2.open("GET",str,true);
    ajax2.send(null);
}