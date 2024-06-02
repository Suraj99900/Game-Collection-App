const AdminRegistration = async () => {
    const sUserName = document.getElementById('StaffNameId').value;
    const sPhoneNumber = '+91' + document.getElementById('phoneNumberId').value;
    const sPassword = document.getElementById('StaffPasswordId').value;
    const sKey = document.getElementById('StaffKeyId').value;
    const sOTP = document.getElementById('otpId').value;
    const otpBoxElement = document.getElementById('otpBoxId');
    var selectedOption = $('#staffTypeId option:selected');
    const sStaffTypeName =  selectedOption.text();
    const iStaffType = selectedOption.val();

    if (sOTP === '') {
        try {
            const response = await fetch(API_URL + '/staff/otp', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                },
                body: JSON.stringify({
                    phone_number: sPhoneNumber,
                }),
            });

            const data = await response.json();

            if (data.status == 200) {
                responsePop('Success', data.message, 'success', 'ok');
                otpBoxElement.classList.add('show');
                otpBoxElement.classList.remove('hide');
            } else {
                responsePop('Error', data.message, 'error', 'ok');
            }
        } catch (error) {
            console.log('Fetch error:', error);
            responsePop('Error', 'An error occurred while making the request.', 'error', 'ok');
        }
    } else {
        try {
            const response = await fetch(API_URL + '/staff', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                },
                body: JSON.stringify({
                    staffname: sUserName,
                    phoneNumber: sPhoneNumber,
                    otp: sOTP,
                    key: sKey,
                    staffType:iStaffType,
                    staffTypeName:sStaffTypeName,
                    password: sPassword,
                }),
            });

            const data = await response.json();

            if (data.status == 200) {
                responsePop('Success', data.message, 'success', 'ok');
                otpBoxElement.classList.add('show');
                otpBoxElement.classList.remove('hide');
                window.location.href = "../admin/adminLoginScreen.php";
            } else {
                responsePop('Error', data.message, 'error', 'ok');
            }
        } catch (error) {
            console.log('Fetch error:', error);
            responsePop('Error', 'An error occurred while making the request.', 'error', 'ok');
        }
    }
}



$(document).ready(() => {
    $('#idRegisterAdmin').on('click', () => {
        AdminRegistration();
    });
});