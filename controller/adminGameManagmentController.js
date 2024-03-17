function getCurrentPeriodNumber(params) {
    $.ajax({
        url: `${API_URL}/games/win-game/period`,
        type: 'GET',
        success: function (response) {
            aData = response.data;
            if (aData) {
                iPeriod = aData;
                $('#currentPeroidId').text(aData);
            } else {
                aData = "00-00-00";
                $('#currentPeroidId').text(aData);
            }
        },
        error: function (xhr, status, error) {
            // Handle errors here
        }
    });
}

function fetchCountDown() {
    // ajax request for count down 
    $.ajax({
        url: `${API_URL}/games/countdown`,
        type: 'GET',
        success: function (response) {

           var distance = response.countdownTimer;
            var i = distance / 60,
                n = distance % 60,
                o = n / 10,
                s = n % 10;
            var minutes = Math.floor(i);
            var seconds = ('0' + Math.floor(n)).slice(-2);
            console.log();
            $('#timeId').text(minutes +":"+seconds);
        },
        error: function (xhr, status, error) {
            // Handle errors here
        }
    });
}

$(document).ready(() => {
    getCurrentPeriodNumber();

    setInterval(() => {
        getCurrentPeriodNumber(),
            fetchCountDown()
    }, 1000);
});