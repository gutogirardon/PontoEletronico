function clock() {
    var data = Date()
    var separator = data.split(" ")
    document.getElementById('timer').innerHTML = separator[4]
}

setInterval(clock, 0);