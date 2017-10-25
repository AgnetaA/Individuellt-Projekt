//---------------------------EXPANDERA------------------------



$(document).ready(function(){
    $("#info1").click(function(){
        $("#info1").hide();
    });
    $('#visa1').click(function()){
        $('#info1').show();
    });
});



//hämta de rubriker som skall klickas på
//arbete
//var visa1 = document.getElementById("visa1");
var visa2 = document.getElementById("visa2");
var visa3 = document.getElementById("visa3");
var visa4 = document.getElementById("visa4");
var visa5 = document.getElementById("visa5");

//utbildning
var show1 = document.getElementById("show1");
var show2 = document.getElementById("show2");
var show3 = document.getElementById("show3");
var show4 = document.getElementById("show4");


//var visa = document.getElementsByClassName("cvpunkt");

//hämta paragrafer som ska poppa upp
//arbete
//var info1 = document.getElementById("info1");
var info2 = document.getElementById("info2");
var info3 = document.getElementById("info3");
var info4 = document.getElementById("info4");
var info5 = document.getElementById("info5");

//utbildning
var showinfo1 = document.getElementById("showinfo1");
var showinfo2 = document.getElementById("showinfo2");
var showinfo3 = document.getElementById("showinfo3");
var showinfo4 = document.getElementById("showinfo4");

//var info = document.getElementsByClassName("info");

//lyssna efter klick, starta funktion expand
visa1.addEventListener("click", expand);
visa2.addEventListener("click", expand);
visa3.addEventListener("click", expand);
visa4.addEventListener("click", expand);
visa5.addEventListener("click", expand);
show1.addEventListener("click", expand);
show2.addEventListener("click", expand);
show3.addEventListener("click", expand);
show4.addEventListener("click", expand);

//visa.addEventListener("click", expand);


function expand() {

    if (this.id == "visa1")       //alla ev klickade h4:or skickas till funktionen show()
    { show(document.getElementById("info1")); }
    else if (this.id == "visa2")
    { show(document.getElementById("info2")); }
    else if (this.id == "visa3")
    { show(document.getElementById("info3")); }
    else if (this.id == "visa4")
    { show(document.getElementById("info4")); }
    else if (this.id == "visa5")
    { show(document.getElementById("info5")); }


    else if (this.id == "show1")
    { show(document.getElementById("showinfo1")); }
    else if (this.id == "show2")
    { show(document.getElementById("showinfo2")); }
    else if (this.id == "show3")
    { show(document.getElementById("showinfo3")); }
    else if (this.id == "show4")
    { show(document.getElementById("showinfo4")); }


    function show(info) {         //nyckeln till att visa och inte visa material vid klick
        if (info.style.display == "block") {
            info.style.display = "none";
        }
        else {
            info.style.display = "block";
        }
    }
}
