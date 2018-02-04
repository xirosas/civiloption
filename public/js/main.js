function upperCaseF(a){
    setTimeout(function(){
        a.value = a.value.toUpperCase();
    }, 1);
}

$('#cedula').blur(function(){
    var cedula = $('#cedula').val();
    var token = $('input[name="_token"]').val();
    $.ajax({
        type: "POST",
        url: "{{url('checkcedulavotante')}}",
        data: {cedula:cedula , _token:token},
        dataType: "json",
        success: function(res,status) {
            alert('respuesta:' + res + ' status: ' + status);
            if(res.exists){
                alert('true');
            }else{
                alert('false');
            }
        },
        error: function (data) {
            console.log(data);
        }
    });
});



function duplicateCedulaLider(element){
        var cedula = $(element).val();
        $.ajax({
            type: "POST",
            url: "{{url('checkcedulalider')}}",
            data: {cedula:cedula},
            dataType: "json",
            success: function(res) {
                if(res.exists){
                    alert('true');
                }else{
                    alert('false');
                }
            },
            error: function (jqXHR, exception) {
            }
        });
    }

function duplicateCedulaCoordinador(element){
        var cedula = $(element).val();
        $.ajax({
            type: "POST",
            url: "{{url('checkcedulacoordinador')}}",
            data: {cedula:cedula},
            dataType: "json",
            success: function(res) {
                if(res.exists){
                    console.log('true');
                }else{
                    console.log('false');
                }
            },
            error: function (jqXHR, exception) {
            }
        });
    }