// Get the offcanvas element
var offcanvas = new bootstrap.Offcanvas(document.getElementById('addAmountId'));
let currentValue = 1;
var distance = 0;
var iPeriod;
var gNumber;
var gcolor;
var gType = "parity";
$(document).ready(function () {
    fetchWinRecordData("parity");
    fetchUserWinRecord("parity");
    fetchUserLossRecord("parity");
    fetchUserPersonalDetails();
    fetchCountDown();
    $('#loader').modal({ backdrop: 'static', keyboard: false })
    $('#loader').modal('show');
    setInterval(() => {
        $('#loader').modal('hide');
    }, 1000);
    var x = setInterval(function () {
        start_count_down();
        $('#closbtnloader').click();
    }, 1e3);

    // Variable to track the currently active tab
    var activeTab = 'Parity';

    // Add click event listeners to the tabs
    $('.tabs .tab').on('click', function () {
        var tabName = $(this).text();
        openTab(tabName);
        activeTab = tabName;
    });

    // Add click event listeners to the buttons
    $('.color-modal .btn').on('click', function () {
        var type = $(this).text();
        gcolor = type;
        gNumber = '';
        var color = $(this).css('background-color');
        openOffcanvas(type, color, activeTab);
    });

    // Add click event listeners to number buttons
    $('.number-selection .btn').on('click', function () {
        var number = $(this).text();
        gNumber = number;
        gcolor = '';
        openOffcanvas('Number ' + number, 'gray', activeTab);
    });

});

function activatClickEvent() {
    // Event handler for the plus button
    $('.plus').on('click', function () {
        // Get the current value of the input
        currentValue = parseInt($('.number-input').val());

        // Increase the value by 1
        currentValue++;
        var iActiveAmount = $('.btn-active').text();

        var iNewAmount = iActiveAmount * currentValue;
        $('#amountSelectedID').val(iNewAmount);

        // Update the input with the new value
        $('.number-input').val(currentValue);
    });

    // Event handler for the minus button
    $('.minus').on('click', function () {
        // Get the current value of the input
        currentValue = parseInt($('.number-input').val());

        // Decrease the value by 1, but make sure it doesn't go below 0
        currentValue = Math.max(0, currentValue - 1);

        var iActiveAmount = $('.btn-active').text();

        var iNewAmount = iActiveAmount * currentValue;

        $('#amountSelectedID').val(iNewAmount);

        // Update the input with the new value
        $('.number-input').val(currentValue);
    });

    // Event handler for amount buttons
    $('.amountBtn').on('click', function () {
        // Remove the 'btn-active' class from all buttons
        $('.btn').removeClass('btn-active');

        // Add the 'btn-active' class to the clicked button
        $(this).addClass('btn-active');

        // Get the selected amount from the clicked button
        var selectedAmount = $(this).text();
        selectedAmount = currentValue * selectedAmount;

        // Update the text in the selected amount div
        $('#amountSelectedID').val(selectedAmount);
    });

    $('#submiteWinGameId').on('click', () => {
        var tabType = $('#typeID').val();
        var buttonType = $('#typeBtnID').val();
        var iAmount = $('#amountSelectedID').val();
        tabType = tabType.toLowerCase();
        var number;
        var color;

        // Check buttonType and update color
        if (['1', '3', '7', '9'].includes(gNumber)) {
            color = "green";
            number = gNumber;
        } else if (['2', '4', '6', '8'].includes(gNumber)) {
            color = "red";
            number = gNumber;
        } else if (['0', '5'].includes(gNumber)) {
            color = "violet";
            number = gNumber;
        } else {
            // Handle the case when buttonType is a color string
            color = gcolor.replace(/\s/g, '').toLowerCase(); // Assuming the color string is in lowercase
            number = "";//generateRandomNumber(color);
        }

        $.ajax({
            url: `${API_URL}/games/win-game/userbet`,
            type: 'POST',
            contentType: "application/json",
            data: JSON.stringify({
                user_id: iUserID,
                period: iPeriod,
                color: color,
                number: number,
                amount: iAmount,
                type: tabType,
            }),
            success: function (response) {
                console.log(response);
                var data = response;
                if (data.status == 201) {
                    responsePop('Success', data.message, 'success', 'ok');
                } else {
                    responsePop('Error', data.message, 'error', 'ok');
                }
                fetchUserPersonalDetails();
                $('#addAmountId').offcanvas('hide');
            },
            error: function (xhr, status, error) {
                console.log('Fetch error:', error);
                responsePop('Error', 'An error occurred while making the request.', 'error', 'ok');
            }
        });
    });
}

// Function to open tab content
function openTab(tabName) {
    fetchCountDown();
    var i, tabContent;
    tabContent = document.getElementsByClassName("tab-content");
    for (i = 0; i < tabContent.length; i++) {
        tabContent[i].style.display = "none";
        tabContent[i].classList.remove('active');
    }
    gType = tabName.toLowerCase();
    if ((gType == "sapre" || gType == "sapreId") || (gType == "parityId" || gType == "parity") || (gType == "bconeId" || gType == "bcone") || (gType == "emerd" && gType || "emerdId")) {
        if (gType == "sapre") {
            fetchWinRecordData("sapre");
            fetchUserWinRecord("sapre");
            fetchUserLossRecord('sapre')
        }
        if (gType == "parity") {
            fetchWinRecordData("parity");
            fetchUserWinRecord("parity");
            fetchUserLossRecord("parity");
        }
        if (gType == "bcone") {
            fetchWinRecordData("bcone");
            fetchUserWinRecord("bcone");
            fetchUserLossRecord("bcone");
        }
        if (gType == "emerd") {
            fetchWinRecordData("emerd");
            fetchUserWinRecord("emerd");
            fetchUserLossRecord("emerd");
        }
    }
    document.getElementById(tabName.toLowerCase() + 'Id').style.display = "block";
    var oTab = document.getElementById(tabName.toLowerCase() + 'Id');
    oTab.classList.add('active');
}


// Function to open offcanvas and attach values
function openOffcanvas(type, color, tab) {
    // Get the elements inside the offcanvas body
    var offcanvasBody = $('#addAmountId .offcanvas-body');

    // Attach the values to the offcanvas body
    var tempBody = `
        
            <div class="alert alert-dark c-text" role="alert" style="background: ${color};" ><b>Selected <span class="badge bg-primary c-text">${tab}</span>- ${type}</b></div>
                <div class="card shadow tab-amount">
                    <div class="row justify-content-center">
                        <h3 class="text-center c-text">Select amount</h3>
                        <button class="col-2 col-sm-2 col-md-2 col-lg-2 btn-active btn amountBtn m-2">10</button>
                        <button class="col-2 col-sm-2 col-md-2 col-lg-2 btn m-2 amountBtn">100</button>
                        <button class="col-2 col-sm-2 col-md-2 col-lg-2 btn m-2 amountBtn">1000</button>
                        <button class="col-2 col-sm-2 col-md-2 col-lg-2 btn m-2 amountBtn">10000</button>
                    </div>
                    <div>
                        <input id="colorID" class="form-control custom-control c-text-vl text-center" value="${color}" disabled type="hidden">
                        <input id="typeID" class="form-control custom-control c-text-vl text-center" value="${tab}" disabled type="hidden">
                        <input id="typeBtnID" class="form-control custom-control c-text-vl text-center" value="${type}" disabled type="hidden">
                    </div>
                    <div class="number-selection mt-5 p-5">
                        <h3 class="text-center c-text mb-5">Number</h3>
                        <div class="row" style="justify-content: space-around;">
                            <button class="col-1 col-sm-1 col-md-1 col-lg-1 btn mt-1 minus">
                                <i class=" fa-solid fa-minus "></i>
                            </button>

                            <input type="number" class="col-1 col-sm-1 col-md-1 col-lg-1 number-input" value="1" disabled>
                            <button class="col-1 col-sm-1 col-md-1 col-lg-1 btn mt-1 plus">
                                <i class=" fa-solid fa-plus "></i>
                            </button>
                        </div>
                    </div>

                    <div class="alert alert-dark label-amount-selected m-5 text-center" id="selectedId" role="alert">
                    Total Amount : <input id="amountSelectedID" class="form-control custom-control c-text-vl text-center" value="10" disabled type="number"> 
                    </div>
                    <div class="row justify-content-center">
                        <button class="col-2 col-sm-2 col-md-2 col-lg-2 btn m-2" id="submiteWinGameId">Confirm</button>
                    </div>
                </div>
            
        `;

    offcanvasBody.html(tempBody);

    // Open the offcanvas
    offcanvas.show();
    activatClickEvent();

}

function start_count_down() {
    $(".showload").hide();
    $(".none").show();

    number = fetchCountDown();

    // ajax request for fetch peroid id
    $.ajax({
        url: `${API_URL}/games/win-game/period`,
        type: 'GET',
        success: function (response) {
            aData = response.data;
            if (aData) {
                iPeriod = aData;
                $('#periodParityID').text(aData);
                $('#periodSapreID').text(aData);
                $('#periodBconeID').text(aData);
                $('#periodEmerdID').text(aData);
            } else {
                aData = "00-00-00";
                $('#periodParityID').text(aData);
                $('#periodSapreID').text(aData);
                $('#periodBconeID').text(aData);
                $('#periodEmerdID').text(aData);
            }
        },
        error: function (xhr, status, error) {
            // Handle errors here
        }
    });

    var i = distance / 60,
        n = distance % 60,
        o = n / 10,
        s = n % 10;
    var minutes = Math.floor(i);
    var seconds = ('0' + Math.floor(n)).slice(-2);
    document.getElementById("parityCount").innerHTML = "<span class='timer c-text'>0" + Math.floor(minutes) + "</span>" + "<span>:</span>" + "<span class='timer c-text'>" + seconds + "</span>";
    document.getElementById("sapreCount").innerHTML = "<span class='timer c-text'>0" + Math.floor(minutes) + "</span>" + "<span>:</span>" + "<span class='timer c-text'>" + seconds + "</span>";
    document.getElementById("bconeCount").innerHTML = "<span class='timer c-text'>0" + Math.floor(minutes) + "</span>" + "<span>:</span>" + "<span class='timer c-text'>" + seconds + "</span>";
    document.getElementById("emerdCount").innerHTML = "<span class='timer c-text'>0" + Math.floor(minutes) + "</span>" + "<span>:</span>" + "<span class='timer c-text'>" + seconds + "</span>";
    if (distance == 179) {
        console.log(gType);
        fetchWinRecordData(gType);
        fetchUserWinRecord(gType);
        fetchUserLossRecord(gType);
    }
    if (distance <= 30) {
        $(".gameBox").css('display', 'none');
        $(".box-alert").removeClass('hide');
    } else {
        $(".gameBox").css('display', 'flex');
        $(".box-alert").addClass('hide');
    }
    if (distance >= 180) {
        $(".gbutton2").prop('hidden', true);
        $(".gbutton1").prop('hidden', false);
    } else {
        $(".gbutton2").prop('hidden', false);
        $(".gbutton1").prop('hidden', true);
    }
}

// Function to generate a random number based on the color
function generateRandomNumber(color) {
    switch (color) {
        case "green":

            return getRandomFromArray([1, 3, 7, 9]);
        case "red":

            return getRandomFromArray([2, 4, 6, 8]);
        case "violet":

            var valNumber = getRandomFromArray([0, 5]);
            return "" + valNumber + "";
        default:

            return '';
    }
}

// Helper function to get a random element from an array
function getRandomFromArray(arr) {
    return arr[Math.floor(Math.random() * arr.length)];
}

// Function to fetch User Personal Details
function fetchUserPersonalDetails() {


    // Make the Ajax request
    $.ajax({
        url: API_URL + "/users/personal-info/" + iUserID,
        method: "GET",
        dataType: "json",
        success: function (data) {
            if (data.status === 200) {
                var aData = data.body;
                var userAmount = aData.userAmount.available_amount;
                $('#balance').text('$' + userAmount);
            }
        },
        error: function (xhr, status, error) {
            console.log('Ajax Error:', xhr.responseText);
            responsePop('Error', error, 'error', 'ok');
        }
    });
}


function fetchWinRecordData(type) {
    $.ajax({
        url: `${API_URL}/games/win-game/type/` + type,
        type: 'GET',
        data: { sortOrder: 'desc' },
        success: function (response) {
            var aData = response.data;

            $(`#allTransactionTable`).DataTable({
                data: aData,
                destroy: true,
                order: [[0, 'desc']],
                columns: [
                    {
                        data: 'period',
                        className: 'text-center' // Center align the text
                    },
                    {
                        data: 'number',
                        className: 'text-center', // Center align the text
                        render: function (data, type, row) {
                            return `<span style="color: ${row.color};">${data}</span>`;
                        }
                    },
                    {
                        data: 'color',
                        className: 'text-center', // Center align the text
                        render: function (data) {
                            return `<span style="color: ${data};">${data}</span>`;
                        }
                    }
                ]
            });

            fetchUserPersonalDetails();
        },
        error: function (xhr, status, error) {
            console.log('Fetch error:', error);
            responsePop('Error', 'An error occurred while making the request.', 'error', 'ok');
        }
    });
}

function fetchUserWinRecord(sType) {
    $.ajax({
        url: API_URL + "/games/win-game/userbet/win-loss?gameType=" + sType + "&user_id=" + iUserID,
        type: 'GET',
        success: function (response) {
            var aData = response.data;

            $(`#userWinRecordTable`).DataTable({
                data: aData,
                destroy: true,
                order: [[0, 'desc']],
                columns: [
                    {
                        data: 'period',
                        className: 'text-center' // Center align the text
                    },
                    {
                        data: 'type',
                        className: 'text-center' // Center align the text
                    },
                    {
                        data: 'number',
                        className: 'text-center', // Center align the text
                        render: function (data, type, row) {
                            return `<span style="color: ${row.color};">${(data != null ? data: "-")}</span>`;
                        }
                    },
                    {
                        data: 'color',
                        className: 'text-center', // Center align the text
                        render: function (data) {
                            return `<span style="color: ${data};">${data}</span>`;
                        }
                    },
                    {
                        data: 'amount',
                        className: 'text-center' // Center align the text
                    },
                    {
                        data: 'isWinData.winAmount',
                        className: 'text-center',// Center align the text
                        render: function (data) {
                            console.log();
                            return `<span style="color: ${data == null?"red":"green"};">${data == null?"Loss":data}</span>`;
                        }
                    }
                ]
            });

        },
        error: function (xhr, status, error) {
            console.log('Fetch error:', error);
            responsePop('Error', 'An error occurred while making the request.', 'error', 'ok');
        }
    });
}

function fetchUserLossRecord(sType) {
    $.ajax({
        url: API_URL + "/games/win-game/userbet/loss?gameType=" + sType + "&user_id=" + iUserID,
        type: 'GET',
        success: function (response) {
            var aData = response.data;

            $(`#userLossRecordTable`).DataTable({
                data: aData,
                destroy: true,
                order: [[0, 'desc']],
                columns: [
                    {
                        data: 'period',
                        className: 'text-center' // Center align the text
                    },
                    {
                        data: 'type',
                        className: 'text-center' // Center align the text
                    },
                    {
                        data: 'number',
                        className: 'text-center', // Center align the text
                        render: function (data, type, row) {
                            return `<span style="color: ${row.color};">${data}</span>`;
                        }
                    },
                    {
                        data: 'color',
                        className: 'text-center', // Center align the text
                        render: function (data) {
                            return `<span style="color: ${data};">${data}</span>`;
                        }
                    },
                    {
                        data: 'amount',
                        className: 'text-center', // Center align the text
                        render: function (data,type,row) {
                            return `<span style="color: red;">${data}</span>`;
                        }
                    }
                ]
            });

        },
        error: function (xhr, status, error) {
            console.log('Fetch error:', error);
            responsePop('Error', 'An error occurred while making the request.', 'error', 'ok');
        }
    });
}


function fetchCountDown() {
    // ajax request for count down 
    $.ajax({
        url: `${API_URL}/games/countdown`,
        type: 'GET',
        success: function (response) {
            return distance = response.countdownTimer;
        },
        error: function (xhr, status, error) {
            // Handle errors here
        }
    });
}