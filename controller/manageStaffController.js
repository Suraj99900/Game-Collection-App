
var currentPage = 1;
var paginationData;
// Initialize a counter for dynamic fields
let fieldCounter = 0;

// Function to fetch Staff and populate the table
function fetchUser(page = 1,show=0) {

    var sSearch = $('#searchUserId').val();

    // Make the Ajax request
    $.ajax({
        url: API_URL + "/user?page=" + page + '&search=' + sSearch + "&show=" + show,
        method: "GET",
        dataType: "json",
        success: function (data) {
            if (data.status_code === 200) {
                // Clear existing table rows
                $('#userTableId tbody').empty();



                // Loop through the data and populate the table
                $.each(data.data.data, function (index, item) {
                    var sAction = item.status == 1 ? `<a herf="#" onclick="freezeUnFreezeById(${item.id})"><i class="fa-solid fa-person-circle-check fa-i"></i></a><a herf="#" data-id-data="${item.id}" data-bs-toggle="modal" data-bs-target="#changePasswordModalId"><i class="mx-4 fa-solid fa-arrow-right-arrow-left"></i></a>`
                        :
                        `<a herf="#" onclick="freezeUnFreezeById(${item.id})"><i style='background:var(--third-color);' class="fa-solid fa-person-circle-exclamation fa-i"></i></a>`;
                    var row = `<tr>
                        <td>${index + 1}</td>
                        <td>${item.user_name}</td>
                        <td>${item.created_at}</td>
                        <td>
                            <!-- Add your action buttons here -->
                            ${sAction}
                        </td>
                    </tr>`;

                    // Append the row to the table body
                    $('#userTableId tbody').append(row);

                    paginationData = data.data;
                    // Handle pagination
                    const currentPage = paginationData.current_page;
                    const lastPage = paginationData.last_page;

                    // Update pagination controls based on the response data
                    const pagination = $('<div class="pagination"></div>');

                    if (currentPage > 1) {
                        pagination.append('<button class="btn prev-page">Previous</button>');
                    }

                    for (let page = 1; page <= lastPage; page++) {
                        const pageButton = `<button class="btn page${page === currentPage ? ' active' : ''}">${page}</button>`;
                        pagination.append(pageButton);
                    }

                    if (currentPage < lastPage) {
                        pagination.append('<button class="btn next-page">Next</button>');
                    }

                    $('#paginationContainer').html(pagination);

                    // Attach click handlers for pagination
                    $('.pagination button').click(function () {
                        const page = $(this).text();
                        if (page === 'Previous') {
                            fetchUser(currentPage - 1);
                        } else if (page === 'Next') {
                            fetchUser(currentPage + 1);
                        } else {
                            fetchUser(page);
                        }
                    });
                });
            }
        },
        error: function (xhr, status, error) {
            console.log('Ajax Error:', xhr.responseText);
            alert('An error occurred while fetching Staff');
        }
    });
}


function freezeUnFreezeById(id) {
    $.ajax({
        url: `${API_URL + "/user"}/${id}`,
        method: "DELETE",
        success: ((data) => {
            if (data.status_code === 200) {
                alert(data.message)
            }
            // You can optionally refresh the book list here
            fetchUser();
        }),
        error: ((xhr, status, error) => {
            console.log('Ajax Error:', xhr.responseText);
            alert('An error occurred');
        })
    })
}

function changePassword() {
    var id = $('#userID').val();
    var sOldPassword = $('#oldPasswordId').val();
    var sNewPassword = $('#NewPasswordId').val();
    if(sOldPassword == '' | sNewPassword == ''){
        alert('Filed can not be empty');
        return false;
    }
    $.ajax({
        url: `${API_URL + "/change-pass"}/${id}`,
        method: "put",
        data: {
            'oldPass': sOldPassword,
            'newPass': sNewPassword
        },
        success: ((data) => {
            if (data.status_code === 200) {
                alert(data.message)
                // Hide the modal
                $('#changePasswordModalId').modal('hide');
            }
            // You can optionally refresh the book list here
            fetchUser();
        }),
        error: ((data) => {
            console.log('Ajax Error:', data);
            var $aData = data.responseJSON;
            console.log($aData);
            alert($aData.message);
        })
    })
}


$(document).ready(() => {

    $('#changePasswordModalId').on('show.bs.modal', function (event) {
        $('#oldPasswordId').val('');
        $('#NewPasswordId').val('');
        var button = $(event.relatedTarget); // Button that triggered the modal
        var dataIdData = button.data('id-data'); // Extract value from data-id-data attribute
        $('#userID').val(dataIdData); // Set the value of the input field
    });

    var iShow = 1;
    $('#toggleShowFreezeUser').change(function () {
        iShow = $(this).prop('checked') ? 0 : 1;
        console.log(iShow);
        fetchUser(1, iShow);
    });
    fetchUser(1, iShow);

    $('#updatePasswordId').click(() => {
        changePassword();
    });

    $('#searchUserId').on('input', function () {
        // Call fetchBookIssues function with the updated search value
        fetchUser(currentPage);
    });
});