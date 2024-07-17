
// Function to fetch User Personal Details
function fetchUserPersonalDetails() {


    // Make the Ajax request
    $.ajax({
        url: "../ajaxFile/ajaxuserManage.php?sFlag=fetchById&id="+iUserID,
        method: "GET",
        dataType: "json",
        success: function (data) {
            if (data.status === 200) {
                var aData = data;
                $('#userID').val(iUserID);
                $('#mobileNumberID').val("-");
                $('#userNameId').val(aData.name);
                $('#balanceID').val(aData.type == 1? "Admin" :"Normal" );
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