function fetchBankDetails() {
    $.ajax({
        url: API_URL + "/users/persnoal-info/bank/" + iUserID,
        method: "GET",
        contentType: "application/json",
        success: function (data) {

            if (data.status === 200) {
                var aData = data.body;
                console.log(aData.actual_name);
                $('#userNameID').val(aData.actual_name);
                $('#accountNumberId').val(aData.account_number);
                $('#detailEmptyAlertId').addClass('hide');
                console.log(aData.actual_name);
                $('#actualName').val(aData.actual_name);
                $('#ifscCode').val(aData.ifsc_code);
                $('#accountNumber').val(aData.account_number);
                $('#bankName').val(aData.bank_name);
                $('#city').val(aData.city);
                $('#state').val(aData.state);
                $('#address').val(aData.address);
                $('#mobileNumber').val(aData.mobile_no);
                $('#email').val(aData.email);
                $('#upiId').val(aData.upi_id);
            }else{

                // ! Set the feild to empty
                $('#userNameID').val('');
                $('#accountNumberId').val('');
                $('#detailEmptyAlertId').removeClass('hide');
                $('#actualName').val('');
                $('#ifscCode').val('');
                $('#accountNumber').val('');
                $('#bankName').val('');
                $('#city').val('');
                $('#state').val('');
                $('#address').val('');
                $('#mobileNumber').val('');
                $('#email').val('');
                $('#upiId').val('');
            }

        },
        error: function (xhr, status, error) {
            console.log('Ajax Error:', xhr.responseJSON);
            responsePop('Error', xhr.responseJSON.message, 'error', 'ok');
        }
    });
}

const deleteBanksDetails = async () => {
    $.ajax({
        url: API_URL + "/users/persnoal-info/bank/" + iUserID,
        method: "DELETE",
        contentType: "application/json",
        success: function (data) {

            if (data.status === 200) {
                var aData = data.body;
                responsePop('Success', aData.message, 'success', 'ok');
                fetchBankDetails();
            }

        },
        error: function (xhr, status, error) {
            console.log('Ajax Error:',  xhr.responseJSON.message);
            responsePop('Error',  xhr.responseJSON.message, 'error', 'ok');
        }
    });
}

const updateBankDetails = async () => {

    var userId = iUserID
    var actual_name = $('#actualName').val();
    var ifsc_code = $('#ifscCode').val();
    var account_number = $('#accountNumber').val();
    var bank_name = $('#bankName').val();
    var city = $('#city').val();
    var state = $('#state').val();
    var address = $('#address').val();
    var mobile_no = $('#mobileNumber').val();
    var email = $('#email').val();
    var upiId = $('#upiId').val();
    var sOTP = $('#verificationCode').val();
    if (sOTP == '') {
        responsePop('Error', 'Please Genrate OTP', 'error', 'ok');
    } else {
        $.ajax({
            url: API_URL + "/users/persnoal-info/bank",
            method: "POST",
            contentType: "application/json",
            data: JSON.stringify({
                "user_id": userId,
                "actual_name": actual_name,
                "ifsc_code": ifsc_code,
                "account_number": account_number,
                "bank_name": bank_name,
                "state": state,
                "city": city,
                "address": address,
                "mobile_no": mobile_no,
                "email": email,
                "upi_id": upiId,
                "OTP": sOTP,
            }),
            success: function (data) {

                if (data.status === 200) {
                    var aData = data.body;
                    responsePop('Success', aData.message, 'success', 'ok');
                    fetchBankDetails();
                }

            },
            error: function (xhr, status, error) {
                console.log('Ajax Error:',  xhr.responseJSON.message);
                responsePop('Error',  xhr.responseJSON.message, 'error', 'ok');
            }
        });
    }
}

const genrateBankOTP = async () => {
    try {
        const response = await fetch(API_URL + '/users/persnoal-info/bank/bankOTP', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
            },
            body: JSON.stringify({
                user_id: iUserID,
            }),
        });

        const data = await response.json();

        if (data.status == 200) {
            responsePop('Success', data.message, 'success', 'ok');
        } else {
            responsePop('Error', data.message, 'error', 'ok');
        }
    } catch (error) {
        console.log('Fetch error:', error);
        responsePop('Error', 'An error occurred while making the request.', 'error', 'ok');
    }
}

$(document).ready(() => {
    fetchBankDetails();

    $('#genrateOTPID').on('click', () => {
        genrateBankOTP();
    });
    $('#bankDetailsSubmitId').on('click', () => {
        updateBankDetails();
    });

    // Onclick Event on delete
    $('#deleteBankDetailsId').on('click', () => {
        deleteBanksDetails();
    });
});