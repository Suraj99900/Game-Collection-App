// Get the offcanvas element
var offcanvas = new bootstrap.Offcanvas(document.getElementById('addAmountId'));
let currentValue = 1;
$(document).ready(function () {
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
        var color = $(this).css('background-color');
        openOffcanvas(type, color, activeTab);
    });

    // Add click event listeners to number buttons
    $('.number-selection .btn').on('click', function () {
        var number = $(this).text();
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
}

// Function to open tab content
function openTab(tabName) {
    var i, tabContent;
    tabContent = document.getElementsByClassName("tab-content");
    for (i = 0; i < tabContent.length; i++) {
        tabContent[i].style.display = "none";
        tabContent[i].classList.remove('active');
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
                        <button class="col-2 col-sm-2 col-md-2 col-lg-2 btn m-2">Confirm</button>
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
    var countDownDate = Date.parse(new Date) / 1e3;
    var now = new Date().getTime();
    var distance = 180 - countDownDate % 180;
    //alert(distance);
    var i = distance / 60,
        n = distance % 60,
        o = n / 10,
        s = n % 10;
    var minutes = Math.floor(i);
    var seconds = ('0' + Math.floor(n)).slice(-2);
    document.getElementById("parityCount").innerHTML = "<span class='timer'>0" + Math.floor(minutes) + "</span>" + "<span>:</span>" + "<span class='timer'>" + seconds + "</span>";
    document.getElementById("sapreCount").innerHTML = "<span class='timer'>0" + Math.floor(minutes) + "</span>" + "<span>:</span>" + "<span class='timer'>" + seconds + "</span>";
    document.getElementById("bconeCount").innerHTML = "<span class='timer'>0" + Math.floor(minutes) + "</span>" + "<span>:</span>" + "<span class='timer'>" + seconds + "</span>";
    document.getElementById("emerdCount").innerHTML = "<span class='timer'>0" + Math.floor(minutes) + "</span>" + "<span>:</span>" + "<span class='timer'>" + seconds + "</span>";
    // document.getElementById("counter").value = distance;
    if (distance == 180 || distance == 175 || distance == 170 || distance == 165 || distance == 160) {
        // generateGameid();
        // getResultbyCategory('parity', 'parity');
        // getResultbyCategory('sapre', 'sapre');
        // getResultbyCategory('bcone', 'bcone');
        // getResultbyCategory('emerd', 'emerd');
    }
    if (distance <= 30) {
        $(".color-modal .btn").prop('disabled', true);
    } else {
        $(".color-modal .btn").prop('disabled', false);
    }
    if (distance >= 180) {
        $(".gbutton2").prop('hidden', true);
        $(".gbutton1").prop('hidden', false);
    } else {
        $(".gbutton2").prop('hidden', false);
        $(".gbutton1").prop('hidden', true);
    }
}