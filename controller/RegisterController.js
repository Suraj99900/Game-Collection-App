// Register User
document.getElementById('idRegister').addEventListener('click', async () => {
    const sUserName = document.getElementById('userNameId').value;
    const sPhoneNumber = '+91' + document.getElementById('phoneNumberId').value;
    const sPassword = document.getElementById('userPasswordId').value;
    const sOTP = document.getElementById('otpId').value;
    const otpBoxElement = document.getElementById('otpBoxId');

    if (sOTP === '') {
        try {
            const response = await fetch(API_URL + '/users/getOTP', {
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
                responsePop('Success',data.message,'success','ok');
                otpBoxElement.classList.add('show');
                otpBoxElement.classList.remove('hide');
            } else {
                responsePop('Error',data.message,'error','ok');
            }
        } catch (error) {
            console.log('Fetch error:', error);
            responsePop('Error','An error occurred while making the request.','error','ok');
        }
    } else {
        try {
            const response = await fetch(API_URL + '/users', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                },
                body: JSON.stringify({
                    username: sUserName,
                    phoneNumber: sPhoneNumber,
                    otp: sOTP,
                    password: sPassword,
                }),
            });

            const data = await response.json();

            if (data.status == 200) {
                responsePop('Success',data.message,'success','ok');
                otpBoxElement.classList.add('show');
                otpBoxElement.classList.remove('hide');
                window.location.href = "../view/loginScreen.php";
            } else {
                responsePop('Error',data.message,'error','ok');
            }
        } catch (error) {
            console.log('Fetch error:', error);
            esponsePop('Error','An error occurred while making the request.','error','ok');
        }
    }
});
