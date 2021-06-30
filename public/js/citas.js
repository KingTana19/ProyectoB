$(function(){
    $("#fecha").attr("min",  new moment().add(1, 'd').format('YYYY-MM-DD'))
    let c = 10;
    let s = "";
    let i = '00';

    while(c < 20){
        s += `<option>${c + ":" + i}</option>`
        i = i == "30" ? "00" : '30';
        c += i == 0 ? 1 : 0
    }

    $("#hora").html(s)
})

$("#servicio_id").change(function(){
    console.log("hola")
    $.ajax({        url: '/cita/consultar',        data: { keyword: $("#servicio_id").val()},        dataType: 'json',
    }).done(function(ser){
        $("#Costo").val(ser.precio)
    })
})

