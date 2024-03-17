
const fetchActiveWinRecord = () => {
    $.ajax({
        url: API_URL + "/games/admin/win-game/",
        method: "GET",
        dataType: "json",
        success: function (aData) {
            if (aData.status == 200) {
                console.log(aData);
                populateDataTable('allWinGameTableId', aData.body);
            } else {
                responsePop('Error', 'Server Error', 'error', 'ok');
            }
        },
        error: function (error) {
            // Handle Ajax error for session.php
            responsePop('Error', 'Server Error', 'error', 'ok');
        }
    });
};


function populateDataTable(tableId, data) {
    console.log(data);
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
                data: 'type',
                render: function (data, type, row, meta) {
                    return `<span class="center-flex admin-text" style='font-size: 18px; color: ${row.color};'>${data}</span>`;
                }
            },
            {
                data: 'color',
                render: function (data, type, row, meta) {
                    return `<span class="center-flex admin-text" style='font-size: 18px; color: ${data};'>${data}</span>`;
                }
            },
            {
                data: 'number',
                render: function (data, type, row, meta) {
                    return `<span class="center-flex admin-text" style='font-size: 18px; color: ${row.color};'>${data}</span>`;
                }
            },
            {
                data: null,
                render: function (data, type, row, meta) {
                    console.log(data.aUserBetRecord);
                    var iUserCount = data.aUserBetRecord.length;
                    return `<span class="center-flex admin-text" style='font-size: 18px; color: ${row.color};'>${iUserCount}</span>`;
                }
            },
            {
                data: 'amounts',
                render: function (data, type, row, meta) {
                    return `<span class="center-flex admin-text" style='font-size: 18px; color: ${row.color};'>${data}</span>`;
                }
            },
            {
                data: null,
                render: function (data, type, row, meta) {
                    var iColorAmount =0 ;
                    if(data.color == "red"){
                        iColorAmount = data.matchedColorAmount * 2
                    }
                    if(data.color == "green"){
                        iColorAmount = data.matchedColorAmount * 2;
                    }
                    if(data.color == "violet"){
                        iColorAmount = data.matchedColorAmount * 4.5;
                    }
                    return `<span class="center-flex admin-text" style="font-size: 18px; color: ${row.color};">${iColorAmount}</span>`;
                }
            },
            {
                data: null,
                render: function (data, type, row, meta) {
                        var iMatchAmount = data.matchedNumberAndColorAmount * 9;
                    return `<span class="center-flex admin-text" style="font-size: 18px; color: ${row.color};">${iMatchAmount}</span>`;
                }
            },
            {
                data: 'status',
                render: function (data, type, row, meta) {
                    if (data == 'active') {
                        return `<div class="center-flex">
                                    <span class="${row._id}-text updateStaff btn " style=' font-size: 15px; cursor: pointer;'><i class="${row._id}-text fa-solid fa-pen"></i> update</span>
                                </div>`;
                    }
                }
            }
        ]
    });
}




$(document).ready(()=>{
    fetchActiveWinRecord();
});