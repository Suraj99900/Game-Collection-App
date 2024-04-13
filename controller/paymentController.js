

function fetchUserDebitRecord() {
    $.ajax({
        url: API_URL + "/transactions/debit-staff",
        method: "get",
        headers: {
            'Content-Type': 'application/json',
        },
        success: function (data) {
            try {

                if (data.status === 200) {
                    const aData = data.body;
                    console.log(aData);
                    populateDataTable('allDebitRecordId', aData)
                } else {
                    responsePop('Error', aData.message, 'error', 'ok');
                }
            } catch (error) {
                console.log(error);
                responsePop('Error', 'Invalid response from the server', 'error', 'ok');
            }
        },
        error: function (xhr, status, error) {
            console.log('Ajax Error:', JSON.parse(xhr.responseText).message);
            responsePop('Error', JSON.parse(xhr.responseText).message, 'error', 'ok');
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
                    return `<span class="center-flex admin-text" style='font-size: 18px;'>${meta.row + meta.settings._iDisplayStart + 1}</span>`;
                }
            },
            {
                data: 'userData',
                render: function (data, type, row, meta) {
                    return `<span class="center-flex admin-text" style='font-size: 18px;'>${data.username}</span>`;
                }
            },
            {
                data: 'userData',
                render: function (data, type, row, meta) {
                    return `<span class="center-flex admin-text" style='font-size: 18px;'>${data.phoneNumber}</span>`;
                }
            },
            {
                data: 'value',
                render: function (data, type, row, meta) {
                    return `<span class="center-flex admin-text" style='font-size: 18px;'>${data}</span>`;
                }
            },
            {
                data: 'addedOn',
                render: function (data, type, row, meta) {
                    var dDate = new Date(data); // Corrected here
                    // Format the date as per your requirement
                    var formattedDate = `${dDate.getFullYear()}-${(dDate.getMonth() + 1).toString().padStart(2, '0')}-${dDate.getDate().toString().padStart(2, '0')}`;
                    return `<span class="center-flex admin-text" style='font-size: 18px;'>${formattedDate}</span>`;
                }
            },
            {
                data: 'status',
                render: function (data, type, row, meta) {
                    return `<div class="center-flex"> 
                                    <span class="${row._id}-text update-debit p-2" style='color: gray; font-size: 15px; cursor: pointer;'><i class="${row._id}-text fa-solid fa-pen"></i></span>
                                </div>`;

                }
            }
        ]
    });
}

// update Debit record for Complition
function updateDebitRecord(iId) {
    $.ajax({
        url: API_URL + "/transactions/debit/" + iId,
        method: "put",
        async: false,
        headers: {
            'Content-Type': 'application/json',
        },
        success: function (data) {
            try {
                const aData = data;
                if (data.status === 200) {
                    responsePop('Success', aData.message, 'success', 'ok');
                    $('#offcanvasUpdateDebitRecordId').offcanvas('hide');
                    fetchUserDebitRecord();
                } else {
                    responsePop('Error', aData.message, 'error', 'ok');
                }
            } catch (error) {
                console.log(error);
                responsePop('Error', 'Invalid response from the server', 'error', 'ok');
            }
        },
        error: function (xhr, status, error) {
            console.log('Ajax Error:', JSON.parse(xhr.responseText).message);
            responsePop('Error', JSON.parse(xhr.responseText).message, 'error', 'ok');
        }
    });
}
// fetch fetchDebitRecordById for Complition
function fetchDebitRecordById(iId) {
    $.ajax({
        url: API_URL + "/transactions/debit-staff-bank/" + iId,
        method: "get",
        headers: {
            'Content-Type': 'application/json',
        },
        success: function (data) {
            try {
                var aData = data;
                if (data.status === 200) {
                    aData = aData.body[0];
                    console.log(aData.userData.username);
                    $('#rowId').val(aData._id);
                    $('#userNameId').text(aData.userData.username);
                    $('#phoneNumberId').text(aData.userData.phoneNumber);
                    $('#actualNameId').text(aData.bankDetails.actual_name);
                    $('#ifscCodeId').text(aData.bankDetails.ifsc_code);
                    $('#accountNumberId').text(aData.bankDetails.account_number);
                    $('#bankNameId').text(aData.bankDetails.bank_name);
                    $('#stateId').text(aData.bankDetails.state);
                    $('#cityId').text(aData.bankDetails.city);
                    $('#addressId').text(aData.bankDetails.address);
                    $('#mobileNumberId').text(aData.bankDetails.mobile_no);
                    $('#emailId').text(aData.bankDetails.email);
                    $('#upiId').text(aData.bankDetails.upi_id);
                    $('#valueId').text(aData.value);

                } else {
                    responsePop('Error', aData.message, 'error', 'ok');
                }
            } catch (error) {
                console.log(error);
                responsePop('Error', 'Invalid response from the server', 'error', 'ok');
            }
        },
        error: function (xhr, status, error) {
            console.log(xhr.responseText);
            console.log('Ajax Error:', JSON.parse(xhr.responseText).message);
            responsePop('Error', JSON.parse(xhr.responseText).message, 'error', 'ok');
        }
    });
}


$(document).ready(() => {
    fetchUserDebitRecord();

    $(document).on('click', '.update-debit', (e) => {
        const classList = e.target.classList;
        for (let className of classList) {
            if (className.endsWith("-text")) {
                staffId = className.split("-")[0];
                break;
            }
        }

        if (staffId) {
            fetchDebitRecordById(staffId);
            $('#offcanvasUpdateDebitRecordId').offcanvas('show');
        }
    });
    $(document).on('click', '#updateRecordBtn', (e) => {
        $("#updateRecordBtn").on("click", function() {
            var isChecked = $("#idCheckboxCompleted").prop("checked");
            var rowId = $("#rowId").val();
            if (isChecked) {
                updateDebitRecord(rowId);
            }else{
                responsePop('Error', "Please Check The Check Box", 'error', 'ok');
            }
        });
    });

});