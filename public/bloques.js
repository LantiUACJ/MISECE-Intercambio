provider = new ethers.providers.JsonRpcProvider(rpc);

(async  function () {
    // Obtener número de bloque actual en la red
    var total  = await provider.getBlockNumber();
    var per_page = 25;
    var current = ((page-1) * per_page);

    for(var i = page-5; i < page+5 && i <= Math.ceil(total/per_page); i++){
        if(i > 0){
            page_template = $("#template_page").html();
            $("#pages").append(page_template.replace("__URL__",url+"?page="+i).replace("__NUMBER__", i).replace("__ACTIVE__", i == page?"active":""));
        }
    }

    template_last = $("#template_last").html();
    $("#pages").append(template_last.replace("__URL__",url+"?page="+Math.ceil(total/per_page)).replace("__NUMBER__", "Last"));

    template_next = $("#template_next").html();
    $("#pages").append(template_next.replace("__URL__",url+"?page="+(page+1)));

    for (var i=0; i< 25; i++){
        var element = total-i-current;
        if(element > 0){
            var bloque = await provider.getBlockWithTransactions(element);
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
    }
})();

