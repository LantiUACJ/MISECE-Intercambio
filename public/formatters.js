// Función para convertir de hexadecimal a ASCII
function hex2a(parametroDatoHash) {
    var str = '';
    parametroDatoHash = parametroDatoHash.replace("0x", "");
    for (var i = 0; i < parametroDatoHash.length; i += 2) {
        var v = parseInt(parametroDatoHash.substr(i, 2), 16);
        if (v) str += String.fromCharCode(v);
    }
    return str;
}

function hexRemoveChars(hexData){
    var startFrom = hexData.search("7b");
    var endAt = hexData.search("7d") + 2;
    hexData = hexData.substring(startFrom, endAt);
    return hexData;
}

function convertTimestamp(time) {
    var d = new Date(time * 1000), // Convert the passed timestamp to milliseconds
    yyyy = d.getFullYear(),
    mm = ('0' + (d.getMonth() + 1)).slice(-2),  // Months are zero based. Add leading 0.
    dd = ('0' + d.getDate()).slice(-2),         // Add leading 0.
    hh = d.getHours(),
    h = hh,
    min = ('0' + d.getMinutes()).slice(-2),     // Add leading 0.
    ampm = 'AM',
    time;

    if (hh > 12) {
        h = hh - 12;
        ampm = 'PM';
    } else if (hh === 12) {
        h = 12;
        ampm = 'PM';
    } else if (hh == 0) {
        h = 12;
    }

    // ie: 2014-03-24, 3:00 PM
    time1 = yyyy + '-' + mm + '-' + dd + ', ' + h + ':' + min + ' ' + ampm;
    return time1;
}