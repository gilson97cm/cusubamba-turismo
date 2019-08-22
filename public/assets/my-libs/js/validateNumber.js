const campoNumerico = document.getElementById('stock_p');

campoNumerico.addEventListener('keydown', function(evento) {
    const teclaPresionada = evento.key;
    const teclaPresionadaEsUnNumero =
        Number.isInteger(parseInt(teclaPresionada));

    const sePresionoUnaTeclaNoAdmitida =
        teclaPresionada != 'ArrowDown' &&
        teclaPresionada != 'ArrowUp' &&
        teclaPresionada != 'ArrowLeft' &&
        teclaPresionada != 'ArrowRight' &&
        teclaPresionada != 'Backspace' &&
        teclaPresionada != 'Delete' &&
        teclaPresionada != 'Enter' &&
        !teclaPresionadaEsUnNumero;
    const comienzaPorCero =
        campoNumerico.value.length === 0 &&
        teclaPresionada == 0;

    if (sePresionoUnaTeclaNoAdmitida || comienzaPorCero) {
        evento.preventDefault();
    }

});
const campoNumerico1 = document.getElementById('stock_e');

campoNumerico1.addEventListener('keydown', function(evento) {
    const teclaPresionada = evento.key;
    const teclaPresionadaEsUnNumero =
        Number.isInteger(parseInt(teclaPresionada));

    const sePresionoUnaTeclaNoAdmitida =
        teclaPresionada != 'ArrowDown' &&
        teclaPresionada != 'ArrowUp' &&
        teclaPresionada != 'ArrowLeft' &&
        teclaPresionada != 'ArrowRight' &&
        teclaPresionada != 'Backspace' &&
        teclaPresionada != 'Delete' &&
        teclaPresionada != 'Enter' &&
        !teclaPresionadaEsUnNumero;
    const comienzaPorCero =
        campoNumerico1.value.length === 0 &&
        teclaPresionada == 0;

    if (sePresionoUnaTeclaNoAdmitida || comienzaPorCero) {
        evento.preventDefault();
    }

});

///NUMEROS DECIMALES

   function filterFloat(evt,input){
        // Backspace = 8, Enter = 13, ‘0′ = 48, ‘9′ = 57, ‘.’ = 46, ‘-’ = 43
        var key = window.Event ? evt.which : evt.keyCode;
        var chark = String.fromCharCode(key);
        var tempValue = input.value+chark;
        if(key >= 48 && key <= 57){
            if(filter(tempValue)=== false){
                return false;
            }else{
                return true;
            }
        }else{
            if(key == 8 || key == 13 || key == 0) {
                return true;
            }else if(key == 46){
                if(filter(tempValue)=== false){
                    return false;
                }else{
                    return true;
                }
            }else{
                return false;
            }
        }
    }
function filter(__val__){
    var preg = /^([0-9]+\.?[0-9]{0,2})$/;
    if(preg.test(__val__) === true){
        return true;
    }else{
        return false;
    }

}

