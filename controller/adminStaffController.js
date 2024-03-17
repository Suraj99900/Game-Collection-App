let staffId = 0;

const fetchAllStaff = () => {
    $.ajax({
        url: API_URL + "/staff",
        method: "GET",
        dataType: "json",
        success: function (aData) {
            if (aData.status == 200) {
                populateDataTable('allStaffTableId', aData.body);
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
                data: 'staffname',
                render: function (data, type, row, meta) {
                    return `<span class="center-flex admin-text" style='font-size: 18px;'>${data.toUpperCase()}</span>`;
                }
            },
            {
                data: 'phoneNumber',
                render: function (data, type, row, meta) {
                    return `<span class="center-flex admin-text" style='font-size: 18px;'>${data.toUpperCase()}</span>`;
                }
            },
            {
                data: 'status',
                render: function (data, type, row, meta) {
                    if (data == 'active') {
                        return `<div class="center-flex"> 
                                    <span class="${row._id}-text updateStaff p-2" style='color: red; font-size: 15px; cursor: pointer;'><i class="${row._id}-text fa-solid fa-trash"></i></span>
                                    <span class="${row._id}-text updateStaff p-2" style='color: gray; font-size: 15px; cursor: pointer;'><i class="${row._id}-text fa-solid fa-pen"></i></span>
                                </div>`;
                    }
                }
            }
        ]
    });
}

const clickEvent = () => {
    $(document).on('click', '.updateStaff', (e) => {
        const classList = e.target.classList;
        for (let className of classList) {
            if (className.endsWith("-text")) {
                staffId = className.split("-")[0];
                break;
            }
        }

        if (staffId) {
            const action = e.target.classList[2];
            if (action === 'fa-trash') {

                if(iStaffID == staffId){
                    responsePop('Error', 'Cannot delete this Staff', 'error', 'ok');
                    return;
                }else{
                    deleteRecord(staffId);
                }
            } else if (action === 'fa-pen') {
                // Handle update action
                getStaffRecordByID(staffId);
            }
        }
    });

    $(document).on('click',"#idUpdateAdmin",()=>{
        console.log(staffId);
        updateRecord(staffId);
    });
}


function deleteRecord(staffId) {
    $.ajax({
        url: API_URL + "/staff/" + staffId,
        method: "DELETE",
        dataType: "json",
        success: function (aData) {

            if (aData.status == 200) {
                fetchAllStaff();
                responsePop('Success',aData.body.message,'success','ok');
            } else {
                responsePop('Error', 'Server Error', 'error', 'ok');
            }
        },
        error: function (error) {
            // Handle Ajax error for session.php
            responsePop('Error', 'Server Error', 'error', 'ok');
        }
    });
}

function getStaffRecordByID(staffId) {
    $('#offcanvasUpdateStaff').offcanvas('show');
    $.ajax({
        url: API_URL + "/staff/" + staffId,
        method: "GET",
        dataType: "json",
        success: function (aData) {

            if (aData.status == 200) {
                var aData = aData.body;
                staffId = aData._id;
                $('#UpdateStaffNameId').val(aData.staffname);
            } else {
                responsePop('Error', 'Server Error', 'error', 'ok');
            }
        },
        error: function (error) {
            // Handle Ajax error for session.php
            responsePop('Error', 'Server Error', 'error', 'ok');
        }
    });
}

function updateRecord(staffId) {
    const sStaffName =  $('#UpdateStaffNameId').val();
    console.log(sStaffName);
    $.ajax({
        url: API_URL + "/staff/" + staffId,
        method: "PUT",
        headers: {
            'Content-Type': 'application/json',
        },
        data:JSON.stringify ({
            staffname: sStaffName,
        }),
        success: function (aData) {
            if (aData.status == 200) {
                fetchAllStaff();
                responsePop('Success',aData.body.message,'success','ok');
                $('#offcanvasUpdateStaff').offcanvas('hide');
            } else {
                responsePop('Error', 'Server Error', 'error', 'ok');
            }
        },
        error: function (error) {
            // Handle Ajax error for session.php
            responsePop('Error', 'Server Error', 'error', 'ok');
        }
    });
}

$(document).ready(() => {
    fetchAllStaff();
    clickEvent();
});
