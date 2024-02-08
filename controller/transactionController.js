function getTransaction(typeId = 1) {
    $.ajax({
        url: API_URL + "/transactions/transaction/" + iUserID + "?resouresType=" + typeId,
        method: "GET",
        contentType: "application/json",
        success: function (data) {
            console.log(data);
            if (data.status === 200) {
                console.log(data);
                if (typeId == 1) {
                    populateDataTable('allTransactionTable', data.body);
                } else if (typeId == 2) {
                    populateDataTable('successfulTransactionTable', data.body);
                } else if (typeId == 3) {
                    populateDataTable('failTransactionTable', data.body);
                }
            }
            console.log(data);
        },
        error: function (xhr, status, error) {
            console.log('Ajax Error:', xhr.responseJSON.message);
            responsePop('Error',  xhr.responseJSON.message, 'error', 'ok');
        }
    });
}

function populateDataTable(tableId, data) {
    console.log(data);
    $(`#${tableId}`).DataTable({
        data: data,
        destroy: true,
        columns: [
            { data: 'user_id' },
            { data: 'order_id' },
            { data: 'amount' },
            {
                data: 'status',
                render: function (data, type, row, meta) {
                    // Add a class based on the status for styling
                    console.log(data);
                    if (data == 'fail') {
                        return `<span class="${data.toLowerCase()}-text" style='color: red; font-size: 15px;'>${data.toUpperCase()}</span>`;
                    }
                    if (data == 'success') {
                        return `<span class="${data.toLowerCase()}-text" style='color: gray; font-size: 15px;'>${data.toUpperCase()}</span>`;
                    }
                }
            }
        ]
    });
}

$(document).ready(() => {


    // On start init phase
    getTransaction(1);

    $('#allOrderID').on('click', () => {
        getTransaction(1);
    })
    $('#successOrderfulId').on('click', () => {
        getTransaction(2);
    })
    $('#failOrderId').on('click', () => {
        getTransaction(3);
    })

});
