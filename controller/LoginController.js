$("#idLogin").click(function () {
    var sPhoneNumber = $("#phoneNumberId").val();
    var sPassword = $("#userPasswordId").val();

    // Make an Ajax request
    $.ajax({
        url: API_URL + "/users/login",
        method: "POST",
        headers: {
            'Content-Type': 'application/json',
        },
        data: JSON.stringify({
            phoneNumber: sPhoneNumber,
            password: sPassword,
        }),
        success: function (data) {
            try {
                console.log(data);
                const aData = data;

                if (aData.status === 200) {
                    responsePop('Success', aData.message, 'success', 'ok');

                    // Make another Ajax request for session.php
                    $.ajax({
                        url: ABS_URL + "ajaxSession.php?sFlag=setSessionData",
                        method: "POST",
                        data: {
                            "id":aData.body._id,
                            "username": aData.body.username,
                            "phoneNumber": aData.body.phoneNumber,
                            "password": sPassword,  // Assuming password is needed for session.php
                            "login": 1,
                        },
                        dataType: "json",
                        success: function (sessionData) {
                            if (sessionData.iUserID != '') {
                                window.location.href = "../view/Dashboard.php";
                            } else {
                                responsePop('Error', 'Failed to log in', 'error', 'ok');
                            }
                        },
                        error: function (error) {
                            // Handle Ajax error for session.php
                            responsePop('Error', 'Failed to log in', 'error', 'ok');
                        }
                    });
                } else {
                    responsePop('Error', aData.message, 'error', 'ok');
                }
            } catch (error) {
                console.log(error);
                responsePop('Error', 'Invalid response from the server', 'error', 'ok');
            }
        },
        error: function (error) {
            // Handle Ajax error for /users/login
            var $aData = error.responseJSON;
            responsePop('Error', $aData.message, 'error', 'ok');
        }
    });
});
