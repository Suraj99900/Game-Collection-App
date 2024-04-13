var orderId;

function orderTheCoin(coine) {
    // Example usage:
    const generatedCode = generateRandomCode();
    var amountData = coine * 100;
    var option = {
        amount: amountData,
        currency: "INR",
        receipt: generatedCode,
        notes: {
            notes_key_1: " " + coine + " Deposit in g-project"
        },
       
    }
    $.ajax({
        url: API_URL + "/razorpay/order",
        method: "POST",
        data: JSON.stringify(
            {
                'userId':iUserID,
                'option':option,
            }
        ),
        contentType: "application/json",
        success: function (data) {
            if (data.status === 200) {
                var aData = data.body;
                orderId = aData.id;
                var userAmount = aData.amount / 100;
                checkout(aData)
            }
            console.log(data);
        },
        error: function (xhr, status, error) {
            console.log('Ajax Error:', xhr.responseText);
            responsePop('Error', error, 'error', 'ok');
        }
    });
}

function cancelOrder(iUserID,orderId) {
    $.ajax({
        url: API_URL + "/razorpay/cancel-order",
        method: "POST",
        data: JSON.stringify(
            {
                'userId':iUserID,
                'orderId':orderId,
            }
        ),
        contentType: "application/json",
        success: function (data) {
            console.log(data);
            if (data.status === 200) {
  
            }
            console.log(data);
        },
        error: function (xhr, status, error) {
            console.log('Ajax Error:', xhr.responseText);
            responsePop('Error', error, 'error', 'ok');
        }
    });
}


function failOrder(oFailOrder) {
    $.ajax({
        url: API_URL + "/razorpay/fail-order",
        method: "POST",
        data: JSON.stringify(
            {
                'user_id':iUserID,
                'order_id':oFailOrder.metadata.order_id,
                'payment_id':oFailOrder.metadata.order_id,
                'code':oFailOrder.code,
                'reason':oFailOrder.reason,
                'description':oFailOrder.description,
                'source':oFailOrder.source,
                'step':oFailOrder.step
            }
        ),
        contentType: "application/json",
        success: function (data) {
            console.log(data);
            if (data.status === 201) {
                responsePop('Error',oFailOrder.description,'error','ok');
            }
            console.log(data);
        },
        error: function (xhr, status, error) {
            console.log('Ajax Error:', xhr.responseText);
            responsePop('Error', error, 'error', 'ok');
        }
    });
}

function validateOrder(aResponse){
    $.ajax({
        url: API_URL + "/razorpay/validate",
        method: "POST",
        data: JSON.stringify({
            "razorpay_payment_id":aResponse.razorpay_payment_id,
            "razorpay_order_id":aResponse.razorpay_order_id,
            "razorpay_signature":aResponse.razorpay_signature,
            "userId":iUserID,
        }),
        contentType: "application/json",
        success: function (data) {
            if (data.status === 200) {
                responsePop('Success',data.message,'success','ok');
                var aData = data.body;
                fetchUserPersonalDetails();
            }
            console.log(data);
        },
        error: function (xhr, status, error) {
            console.log('Ajax Error:', xhr.responseText);
            responsePop('Error', xhr.response.message, 'error', 'ok');
        }
    });
}

// Function to fetch User Personal Details
function fetchUserPersonalDetails() {


    // Make the Ajax request
    $.ajax({
        url: API_URL + "/users/personal-info/"+iUserID,
        method: "GET",
        dataType: "json",
        success: function (data) {
            if (data.status === 200) {
                var aData = data.body;
                var userAmount = aData.userAmount.available_amount;
                $('#walletBalanceID').val('$'+userAmount);
            }
        },
        error: function (xhr, status, error) {
            console.log('Ajax Error:', xhr.responseText);
            responsePop('Error', error, 'error', 'ok');
        }
    });
}

$(document).ready(() => {
    fetchUserPersonalDetails();
    $('.creditCoinId').on('click', function (e) {
        var clickedElement = $(this);

        var textValue = clickedElement.text();
        var valueWithoutSymbol = textValue.replace('$', '');

        orderTheCoin(valueWithoutSymbol);
    });

    $('.debitAmount').on('click',function(e){
        var clickedElement = $(this);

        var textValue = clickedElement.text();
        var valueWithoutSymbol = textValue.replace('$', '');
        insertDebitAmount(valueWithoutSymbol,iUserID);
    });


    $('#userDebitRecordId').on('click',function(e) {
        fetchUserDebotRecord(iUserID);
    })
});


function insertDebitAmount(value,user_id) {
    $.ajax({
        url: API_URL + "/transactions/debit",
        method: "POST",
        data: JSON.stringify(
            {
                'user_id':user_id,
                'value':value,
            }
        ),
        contentType: "application/json",
        success: function (data) {
            if (data.status === 200) {
                var aData = data.body;
                responsePop('Success',aData.message,'success','ok');
                fetchUserPersonalDetails();
            }
            console.log(data);
        },
        error: function (xhr, status, error) {
            console.log('Ajax Error:', JSON.parse(xhr.responseText).message);
            responsePop('Error', JSON.parse(xhr.responseText).message, 'error', 'ok');
        }
    });
}

function fetchUserDebotRecord(user_id) {
    $.ajax({
        url: API_URL + "/transactions/debit/"+user_id,
        method: "get",
        contentType: "application/json",
        success: function (data) {
            if (data.status === 200) {
                var aData = data.body;
                populateDataTable('debitUserRecordTableId',aData);
            }
            console.log(data);
        },
        error: function (xhr, status, error) {
            console.log('Ajax Error:', xhr.responseText);
            responsePop('Error', error, 'error', 'ok');
        }
    });
}

function populateDataTable(tableId, data) {
    $(`#${tableId}`).DataTable({
        data: data,
        destroy: true,
        columns: [
            {
                data: null,
                render: function (data, type, row, meta) {
                    return `<span class="center-flex" style='font-size: 18px;'>${meta.row + meta.settings._iDisplayStart + 1}</span>`;
                }
            },
            {
                data: 'value',
                render: function (data, type, row, meta) {
                    return `<span class="center-flex" style='font-size: 18px;'>${data}</span>`;
                }
            },
            {
                data: 'transaction_status',
                render: function (data, type, row, meta) {
                    return `<span class="center-flex" style='font-size: 18px;'>${data}</span>`;
                }
            },
            {
                data: 'addedOn',
                render: function (data, type, row, meta) {
                    var dDate = new Date(data); // Corrected here
                    // Format the date as per your requirement
                    var formattedDate = `${dDate.getFullYear()}-${(dDate.getMonth() + 1).toString().padStart(2, '0')}-${dDate.getDate().toString().padStart(2, '0')}`;
                    return `<span class="center-flex" style='font-size: 18px;'>${formattedDate}</span>`;
                }
            }
        ]
    });
}


function generateRandomCode() {
    // Function to generate a random string of specified length
    function generateRandomString(length) {
        const characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz';
        let result = '';
        for (let i = 0; i < length; i++) {
            result += characters.charAt(Math.floor(Math.random() * characters.length));
        }
        return result;
    }

    // Generate the first four characters (letters)
    const lettersPart = generateRandomString(4);

    // Generate the last four characters (digits)
    const digitsPart = Math.floor(1000 + Math.random() * 9000).toString();

    // Combine the two parts to get the final random code
    const randomCode = lettersPart + digitsPart;

    return randomCode;
}



function checkout(aData) {
    var options = {
        "key": RAZORPAY_KEY_ID, // Enter the Key ID generated from the Dashboard
        "amount": "1000",
        "currency": "INR",
        "description": "Acme Corp",
        "image": "https://s3.amazonaws.com/rzp-mobile/images/rzp.jpg",
        "callback_url": "https://eneqd3r9zrjok.x.pipedream.net/",
        "order_id": aData.id, //This is a sample Order ID. Pass the `id` obtained in the response of Step 1
        "prefill":
        {
            "name": sUserName,
            "email": "jaiswaljesus384@gmail.com",
            "contact": sUserMobileNo,
        },
        "theme": {
            "color": "#3399cc"
        },
        config: {
            display: {
                blocks: {
                    utib: { //name for Axis block
                        name: "Pay using Axis Bank",
                        instruments: [
                            {
                                method: "card",
                                issuers: ["UTIB"]
                            },
                            {
                                method: "netbanking",
                                banks: ["UTIB"]
                            },
                        ]
                    },
                    wallets: ["olamoney", "freecharge"],
                    apps: ["google_pay", "phonepe"],
                    other: { //  name for other block
                        name: "Other Payment modes",
                        instruments: [
                            {
                                method: "card",
                                issuers: ["ICIC"]
                            },
                            {
                                method: 'netbanking',
                            },
                            {
                                method: "upi"
                            }
                        ]
                    }
                },
                sequence: ["block.utib", "block.other"],
                preferences: {
                    show_default_blocks: true // Should Checkout show its default blocks?
                }
            }
        },
        "handler": function (response) {
            validateOrder(response);
        },
        "modal": {
            "ondismiss": function () {
                if (confirm("Are you sure, you want to close the form?")) {
                    txt = "You pressed OK!";
                    cancelOrder(iUserID,orderId);
                    console.log("Checkout form closed by the user");
                } else {
                    txt = "You pressed Cancel!";
                    console.log("Complete the Payment")
                }
            }
        }
    };
    var rzp1 = new window.Razorpay(options);
    rzp1.on("payment.failed", function (response) {
        // alert(response.error.code);
        // alert(response.error.description);
        // alert(response.error.source);
        // alert(response.error.step);
        // alert(response.error.reason);
        // alert(response.error.metadata.order_id);
        // alert(response.error.metadata.payment_id);
        failOrder(response.error);
        console.log(response.error);

    });
    rzp1.open();

}