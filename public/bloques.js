provider = new ethers.providers.JsonRpcProvider(rpc);

(async  function () {
    // Obtener número de bloque actual en la red
    var latestBlock  = await provider.getBlockNumber();

    for (var i=0; i< 200; i++){
        var bloque = await provider.getBlockWithTransactions(latestBlock-i);
        // var txhash = bloque.transactions[0].hash;
        var blockHash = bloque.hash;
        var blockNumber = bloque.number;
        var time = convertTimestamp(bloque.timestamp);
        var gas = bloque.gasUsed;
        // var gas = hex2a(bloque.transactions[0].data);

        $('tbody').append(
            "<tr><td>"
            + "<a href='"+url_template+"?block=" + blockNumber + "'>"
            + blockHash + "<a>"
            + "</td><td>" 
            + blockNumber 
            + "</td><td>" 
            + time
            + "</td><td>" 
            + gas
            + "</tr>");
    }
})();

