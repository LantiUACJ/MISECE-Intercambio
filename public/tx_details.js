
function getParameter(parameterName){
    let parameters = new URLSearchParams(window.location.search);
    return parseInt(parameters.get(parameterName));
}

provider = new ethers.providers.JsonRpcProvider(rpc);

// bloques LANTI con info en Smart Contract 18001, 18002, 18003, 18004, 18005, 18006, 18007, 

(async  function () {
    var bloque = await provider.getBlockWithTransactions(getParameter("block"));
    $("#blockHash").html(bloque.hash);
    if(bloque.transactions.length != 0){
        for(var i=0; i<bloque.transactions.length;i++){
            $("#blockNumber").text(bloque.number);
            var obj = JSON.parse(hex2a(hexRemoveChars(bloque.transactions[i].data)));                
            $("#txData").html(
                $("#txData").html()+
                $("#template").html()
                    .replace("__transaction__", bloque.transactions.indexOf(bloque.transactions[i])+1 )
                    .replace("__t_hash__", bloque.transactions[i].hash )
                    .replace("__consultor__", obj.consultor)
                    .replace("__fecha__", obj.fecha)
                    .replace("__hospital__", obj.hospital)
                    .replace("__paciente__", obj.paciente)
                    .replace("__respuesta__", obj.respuestas)
            );
        }
    }
    else{
        $("#blockNumber").text(bloque.number);
    }
    
})();