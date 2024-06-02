const insertBannerData = async () => {
    // Collect the Form Data...
    var bannerName = $("#BannerNameId").val();
    const fileInput = $('#BannerFileId')[0].files[0];  // Get the file input
    const formData = new FormData();
    formData.append("staff_id", iStaffID);
    formData.append("banner_name", bannerName);
    formData.append("file", fileInput);


    try {
        $.ajax({
            url: API_URL + "/banner",
            method: "post",
            contentType: false, // Important: Set to false when sending FormData
            processData: false, // Important: Set to false when sending FormData
            data: formData,
            success: function (data) {
                if (data.status === 200) {
                    responsePop('Success', data.message, 'success', 'ok');
                    window.location = "bannerManagement.php";
                }
            },
            error: function (xhr, status, error) {
                console.log('Ajax Error:', xhr.responseJSON.message);
                responsePop('Error', xhr.responseJSON.message, 'error', 'ok');
            }
        });
    } catch (error) {
        console.log('Fetch error:', error);
        responsePop('Error', 'An error occurred while making the request.', 'error', 'ok');
    }
}

const fetchBannerData = async()=>{
    try {
        $.ajax({
            url: API_URL + "/banner",
            method: "get",
            success: function (data) {
                if (data.status === 200) {
                    console.log(data.body);
                    populateDataTable('allBannerTableId', data.body);
                }
            },
            error: function (xhr, status, error) {
                console.log('Ajax Error:', xhr.responseJSON.message);
                responsePop('Error', xhr.responseJSON.message, 'error', 'ok');
            }
        });
    } catch (error) {
        console.log('Fetch error:', error);
        responsePop('Error', 'An error occurred while making the request.', 'error', 'ok');
    }
}

const deleteBannerData = async(id)=>{
    try {
        $.ajax({
            url: API_URL + "/banner/"+id,
            method: "delete",
            success: function (data) {
                if (data.status === 200) {
                    console.log(data.body);
                    fetchBannerData();
                }
            },
            error: function (xhr, status, error) {
                console.log('Ajax Error:', xhr.responseJSON.message);
                responsePop('Error', xhr.responseJSON.message, 'error', 'ok');
            }
        });
    } catch (error) {
        console.log('Fetch error:', error);
        responsePop('Error', 'An error occurred while making the request.', 'error', 'ok');
    }
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
                data: 'banner_name',
                render: function (data, type, row, meta) {
                    return `<span class="center-flex admin-text" style='font-size: 18px;'>${data}</span>`;
                }
            },
            {
                data: 'url',
                render: function (data, type, row, meta) {
                    return `<span class="center-flex admin-text" style='font-size: 18px;'>
                                <img src="${data}" alt="${row.banner_name}" style="width: 100px; height: auto;">
                            </span>`;
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
                    if (data == 'active') {
                        return `<div class="center-flex"> 
                                    <span class="${row._id}-text deleteBannerRecord p-2" style='color: red; font-size: 15px; cursor: pointer;'><i class="${row._id}-text fa-solid fa-trash"></i></span>
                                </div>`;
                    }
                }
            }
        ]
    });
}

$(document).ready(() => {
    fetchBannerData();
    $('#idBannerFile').on('click',()=>{
        insertBannerData();
    });

    $(document).on('click', '.deleteBannerRecord', async (e) => {
        var id;
        const classList = e.target.classList;
        for (let className of classList) {
            if (className.endsWith("-text")) {
                id = className.split("-")[0];
                break;
            }
        }

        await deleteBannerData(id);

    })
});


