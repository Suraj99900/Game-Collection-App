// Register User

$("#idRegister").click(function() {
    var sStaffName = $("#staffuserNameId").val();
    var sStaffKey = $("#staffSecretkeyId").val();
    var sStaffPassword = $("#staffuserPasswordId").val();

    // Prepare the data to send to the server
    var userData = {
        userName: sStaffName,
        secretkey: sStaffKey,
        password: sStaffPassword
    };

    // Make an Ajax request
    $.ajax({
        url: API_URL + "/register", // URL to your server-side script
        method: "POST", // HTTP method (POST for user registration)
        data: userData, // Data to send to the server
        dataType: "json", // Expected data type (e.g., JSON)
        success: function(data) {
            if (data.status_code === 200) {
                // Registration was successful
                alert(data.message);
                // Redirect to another page
                window.location.href = "loginScreen.php?staffAccess=1";
            }
        },
        error: function(data) {
            // Handle Ajax error
            var $aData = data.responseJSON;
            alert($aData.message);
        }
    });
});
