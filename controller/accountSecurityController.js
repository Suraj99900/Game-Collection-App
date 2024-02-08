function genrateOtp() {
    const sPhoneNumber = $('#phoneNoId').val();
    $.ajax({
        url: API_URL + "/users/reset-genrate-otp",
        method: "POST",
        data: JSON.stringify({
            "phone_number": sPhoneNumber
        }),
        contentType: "application/json",
        success: function (data) {
            if (data.status === 200) {
                responsePop('Success',data.message,'success','ok');
            }
        },
        error: function (xhr, status, error) {
            console.log('Ajax Error:', xhr.responseJSON.message);
            responsePop('Error', xhr.responseJSON.message, 'error', 'ok');
        }
    });
};

function resetFunction(){
    const sPhoneNumber = $('#phoneNoId').val();
    var iNewPassword = $('#newPasswordId').val();
    var otp = $('#verifyCodeId').val();
    if(otp == ""){
        responsePop('Error', "Please Enter the OTP", 'error', 'ok');
    }
    $.ajax({
        url: API_URL + "/users/reset-password",
        method: "POST",
        data: JSON.stringify({
            "phone_number": sPhoneNumber,
            "new_password":iNewPassword,
            "otp":otp
        }),
        contentType: "application/json",
        success: function (data) {
            if (data.status === 200) {
                responsePop('Success',data.message,'success','ok');
                window.location = "accountSecurity.php?iActive=3";
            }
        },
        error: function (xhr, status, error) {
            console.log('Ajax Error:', xhr.responseJSON.message);
            responsePop('Error', xhr.responseJSON.message, 'error', 'ok');
        }
    });
}



$(document).ready(() => {
    $('#otpGenrateId').on('click', () => {
        genrateOtp()
    });
    $('#idResetButton').on('click', () => {
        resetFunction()
    });
});