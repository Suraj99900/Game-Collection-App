// !function to fetch Dashboard Total Record 
const fTotalRecord = () => {
    // ! For Total User
    $.ajax({
        url: API_URL + "/users/user-count",
        method: "GET",
        dataType: "json",
        success: function (aData) {
            console.log(aData);
            if (aData.status == 200) {
                $('#idUserCount').text(aData.body);
            } else {
                responsePop('Error', 'Server Error', 'error', 'ok');
            }
        },
        error: function (error) {
            // Handle Ajax error for session.php
            responsePop('Error', 'Server Error', 'error', 'ok');
        }
    });


    // !For Pending Recharge 
}



$(document).ready(() => {
    fTotalRecord();
});