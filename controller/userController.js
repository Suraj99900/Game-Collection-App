
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
                $('#userID').val(aData.userId);
                $('#mobileNumberID').val(aData.phoneNumber);
                $('#userNameId').val(aData.username);
                $('#balanceID').val('$'+userAmount);
            }
        },
        error: function (xhr, status, error) {
            console.log('Ajax Error:', xhr.responseText);
            responsePop('Error', error, 'error', 'ok');
        }
    });
}


$(document).ready(function () {


    fetchUserPersonalDetails();

});