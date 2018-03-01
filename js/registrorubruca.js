$('#myTab a').click(function (e) {
    e.preventDefault()
    $(this).tab('show')
})


function arriba() {
    obj=document.getElementById('rightValues');
    indice=obj.selectedIndex;
    if (indice>0) cambiar(obj,indice,indice-1);
}
function abajo() {
    obj=document.getElementById('rightValues');
    indice=obj.selectedIndex;
    if (indice!=-1 && indice<obj.length-1)
        cambiar(obj,indice,indice+1);
}
function cambiar(obj,num1,num2) {
    proVal=obj.options[num1].value;
    proTex=obj.options[num1].text;
    obj.options[num1].value=obj.options[num2].value;
    obj.options[num1].text=obj.options[num2].text;
    obj.options[num2].value=proVal;
    obj.options[num2].text=proTex;
    obj.selectedIndex=num2;
}


$("#btnLeft").click(function () {
    var selectedItem = $("#rightValues option:selected");
    $("#leftValues").append(selectedItem);
});
$("#btnRight").click(function () {
    var selectedItem = $("#leftValues option:selected");
    $("#rightValues").append(selectedItem);
});

$("#rightValues").change(function () {
    var selectedItem = $("#rightValues option:selected");
    $("#txtRight").val(selectedItem.text());
});

function arriba1() {
    obj=document.getElementById('rightValues1');
    indice=obj.selectedIndex;
    if (indice>0) cambiar(obj,indice,indice-1);
}
function abajo1() {
    obj=document.getElementById('rightValues1');
    indice=obj.selectedIndex;
    if (indice!=-1 && indice<obj.length-1)
        cambiar(obj,indice,indice+1);
}

$("#btnLeft1").click(function () {
    var selectedItem = $("#rightValues1 option:selected");
    $("#leftValues1").append(selectedItem);
});
$("#btnRight1").click(function () {
    var selectedItem = $("#leftValues1 option:selected");
    $("#rightValues1").append(selectedItem);
});

$("#rightValues1").change(function () {
    var selectedItem = $("#rightValues1 option:selected");
    $("#txtRight1").val(selectedItem.text());
});