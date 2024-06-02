var id;
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
                    var iColorAmount = 0;
                    if (data.color == "red") {
                        iColorAmount = data.matchedColorAmount * 2
                    }
                    if (data.color == "green") {
                        iColorAmount = data.matchedColorAmount * 2;
                    }
                    if (data.color == "violet") {
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
                                    <span class="${row._id}-text updateRecord btn" style=' font-size: 15px; cursor: pointer;'><i class="${row._id}-text fa-solid fa-pen"></i> update</span>
                                </div>`;
                    }
                }
            }
        ]
    });
    // Add event listener for update buttons
    $('.updateRecord').on('click', function (e) {
        const rowData = $(this).closest('tr').data();
        var color = $('#updateColor').val(rowData.color);
        var number = $('#updateNumber').val(rowData.number);

        const classList = e.target.classList;
        for (let className of classList) {
            if (className.endsWith("-text")) {
                id = className.split("-")[0];
                break;
            }
        }

        $('#offcanvasUpdateWin').offcanvas('show');
        fetchAllColorNumber();
    });
}

function fetchAllColorNumber() {
    $.ajax({
        url: API_URL + "/games/color",
        method: "get",
        contentType: "application/json",
        success: function (response) {
            if (response.status == 200) {
                populateSelectOptions(response.body);
                console.log(response);
            } else {
                responsePop('Error', 'Server Error', 'error', 'ok');
            }
        },
        error: function (error) {
            responsePop('Error', 'Server Error', 'error', 'ok');
        }
    });
}

function populateSelectOptions(data) {
    const colorTypeSelect = $('#ColorTypeId');
    const numberSelect = $('#numberId');

    // Clear existing options
    colorTypeSelect.empty();
    numberSelect.empty();

    // Populate Color Type select options
    data.forEach(item => {
        colorTypeSelect.append(new Option(item.color, item.color));
    });

    // Populate Number select options based on the first color type
    if (data.length > 0) {
        const numbers = data[0].numbers; // Assuming each color item has a numbers array
        numbers.forEach(number => {
            numberSelect.append(new Option(number, number));
        });
    }

    // Update Number options when Color Type changes
    colorTypeSelect.on('change', function () {
        const selectedColor = $(this).val();
        const selectedItem = data.find(item => item.color === selectedColor);
        numberSelect.empty(); // Clear existing options
        if (selectedItem) {
            selectedItem.numbers.forEach(number => {
                numberSelect.append(new Option(number, number));
            });
        }
    });
}



$(document).ready(() => {
    setInterval(() => {
        getCurrentPeriodNumber(),
            fetchActiveWinRecord();
    }, 1000);


    $('#idUpdateColorNumber').on('click', function (e) {
        e.preventDefault();
        const updateData = {
            color: $('#ColorTypeId').val(),
            number: $('#numberId').val()
        };

        $.ajax({
            url: API_URL + "/games/win-game/" + id,
            method: "PUT",
            contentType: "application/json",
            data: JSON.stringify(updateData),
            success: function (response) {
                if (response.status == 200) {
                    $('#updateModal').modal('hide');
                    fetchActiveWinRecord(); // Refresh the table data
                    responsePop('Success', 'Record updated successfully', 'success', 'ok');
                } else {
                    responsePop('Error', 'Server Error', 'error', 'ok');
                }
            },
            error: function (error) {
                responsePop('Error', 'Server Error', 'error', 'ok');
            }
        });
    });
});