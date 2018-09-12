
function startTime() {
    var today = new Date();
    var h = today.getHours();
    var m = today.getMinutes();
    var s = today.getSeconds();
    m = checkTime(m);
    s = checkTime(s);
    M = checkAMPM(h);
            h = checkHour(h);
    document.getElementById('time').innerHTML = h + ":" + m + ":" + s + " " + M;
    var t = setTimeout(startTime, 500);
}
function checkTime(i) {
    if (i < 10) {
    i = "0" + i
    };  
    return i;
}
function checkAMPM(j){
if (j>=12){
    M = "PM"
}else{
    M = "AM"
};
return M;
}
    function checkHour(k){
        if (k>12){
            k = k - 12
        }else{
            k = k
        };
        if (k < 10) {
                k = "0" + k
        };
        return k;
    }

var check = function() {
    if (document.getElementById('password').value == document.getElementById('repassword').value) {
        document.getElementById('message').style.color = 'green';
        document.getElementById('message').innerHTML = 'Password confirmed!';
    } else {
        document.getElementById('message').style.color = 'red';
        document.getElementById('message').innerHTML = 'Not matching';
    }
}