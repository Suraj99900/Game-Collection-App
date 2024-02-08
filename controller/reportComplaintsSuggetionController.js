function insertReportOperation() {
    const typeValue = $('#typeId').val();
    const orderIdValue = $('#orderId').val();
    const emailValue = $('#email').val();
    const phoneNumberValue = $('#phoneNumberId').val();
    const descirpptionValue = $('#description').val();
    const fileInput = $('#FileId')[0].files[0];  // Get the file input

    const formData = new FormData();
    formData.append("user_id", iUserID);
    formData.append("type", typeValue);
    formData.append("order_id", orderIdValue);
    formData.append("email", emailValue);
    formData.append("phone_number", phoneNumberValue);
    formData.append("description", descirpptionValue);
    formData.append("file", fileInput);

    $.ajax({
        url: API_URL + "/users/report-complain",
        method: "post",
        contentType: false, // Important: Set to false when sending FormData
        processData: false, // Important: Set to false when sending FormData
        data: formData,
        success: function (data) {
            if (data.status === 200) {
                responsePop('Success', data.message, 'success', 'ok');
                window.location = "ReportComplaintsSuggetion.php";
            }
        },
        error: function (xhr, status, error) {
            console.log('Ajax Error:', xhr.responseJSON.message);
            responsePop('Error', xhr.responseJSON.message, 'error', 'ok');
        }
    });
}


function getReportComplaints(typeId = 1) {
    $.ajax({
        url: API_URL + "/users/report-complain/" + iUserID + "?iFlag=" + typeId,
        method: "GET",
        contentType: "application/json",
        success: function (data) {
            if (data.status === 200) {

                if (typeId == 2) {
                    populateDataTable('PendingReportId', data.body);
                } else if (typeId == 1) {
                    populateDataTable('complitedReportId', data.body);
                }
            }
        },
        error: function (xhr, status, error) {
            console.log('Ajax Error:', xhr.responseJSON.message);
            responsePop('Error',  xhr.responseJSON.message, 'error', 'ok');
        }
    });
}

function populateDataTable(tableId, data) {

    $(`#${tableId}`).DataTable({
        data: data,
        destroy: true,
        columns: [
            { data: 'type' },
            { data: 'order_id' },
            { data: 'description' },
            { data: 'email' },
            { data: 'phone_number' },
            {
                data: 'status',
                render: function (data, type, row, meta) {
                    // Add a class based on the status for styling
                    if (data == 'active') {
                        return `<span class="${data.toLowerCase()}-text" style='color: red;'>${data.toUpperCase()}</span>`;
                    }
                    if (data == 'complited') {
                        return `<span class="${data.toLowerCase()}-text" style='color: gray;'>${data.toUpperCase()}</span>`;
                    }
                }
            }
        ]
    });
}

$(document).ready(() => {

     // On start init phase
     getReportComplaints(1);

     $('#complitedReportDataId').on('click', () => {
         getReportComplaints(1);
     })
     $('#penddiongDataReportId').on('click', () => {
         getReportComplaints(2);
     })
    $('#idSubmitForm').on('click', () => {
        insertReportOperation();
    });
});
