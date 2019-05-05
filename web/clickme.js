document.getElementById("myButton").onclick = function(){
    window.alert("Clicked!");
};

$("#colorButton1").click(function(){
    var newColor = $("#colorInput1").val();
    $("#div1").css("color", newColor);
});
$("#colorButton3").click(function(){
    var newColor = $("#colorInput3").val();
    $("#div3").css("color", newColor);
});
$("#colorButton6").click(function(){
    var newColor = $("#colorInput6").val();
    $("#div6").css("color", newColor);
});

$("#colorButton").click(function(){
    var newColor = $("#colorInput").val();
    $("#container div").css("color", newColor);
});