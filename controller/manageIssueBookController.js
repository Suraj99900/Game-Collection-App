
var currentPage = 1;
var paginationData;
// Initialize a counter for dynamic fields
let fieldCounter = 0;
// Function to add a new book
function addIssues() {
    // Get values from the form
    var bookId = $('#bookNameID').val();
    var studentId = $('#studentNameId').val();
    var userId = $('#userId').val();

    // Validate inputs
    if (!studentId || !bookId) {
        alert("Please select both a student and a book.");
        return;
    }

    // Prepare data for the Ajax request
    var requestData = {
        "book_id": bookId,
        "zprn": studentId,
        "user_name": userId,
    };

    // Make the Ajax request
    $.ajax({
        url: API_URL + "/book-issues",
        method: "POST",
        data: requestData,
        dataType: "json",
        success: handleAddSuccess,
        error: handleAddError
    });
}

function handleAddSuccess(data) {
    if (data.status_code === 200) {
        alert(data.message);
        // Hide the modal
        $('#AddBookIssuesModalId').modal('hide');
        fetchBookIssues();
        // You can optionally refresh the book list here
    }
}

function handleAddError(xhr, status, error) {
    console.error('Ajax Error:', xhr.responseText);
    alert('An error occurred');
}

// Function to fetch book issues and populate the table
function fetchBookIssues(page = 1) {

    var sSearch = $('#searchById').val() ? $('#searchById').val() : '';

    // Make the Ajax request
    $.ajax({
        url: API_URL + "/book-issues?page=" + page + '&search=' + sSearch + "&show=" + "",
        method: "GET",
        dataType: "json",
        success: function (data) {
            if (data.status_code === 200) {
                // Clear existing table rows
                $('#bookIssuesTable tbody').empty();

                // Loop through the data and populate the table
                $.each(data.data.data, function (index, item) {
                    var row = `<tr>
                        <td>${index + 1}</td>
                        <td>${item.student_info.name}</td>
                        <td>${item.student_info.zprn}</td>
                        <td>${item.book_manage.name}</td>
                        <td>${item.book_manage.isbn}</td>
                        <td>${item.issue_date}</td>
                        <td>${item.user_name}</td>
                        <td class="${item.is_return ? 'text-success-emphasis">Returned' : 'text-danger">Pending'}</td>
                        <td>
                            <!-- Add your action buttons here -->
                            <a herf="#" onclick="deleteBookIssue(${item.id})"><i class="fa-solid fa-trash"></i></a>
                        </td>
                    </tr>`;

                    // Append the row to the table body
                    $('#bookIssuesTable tbody').append(row);

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
                            fetchBookIssues(currentPage - 1);
                        } else if (page === 'Next') {
                            fetchBookIssues(currentPage + 1);
                        } else {
                            fetchBookIssues(page);
                        }
                    });
                });
            }
        },
        error: function (xhr, status, error) {
            console.error('Ajax Error:', xhr.responseText);
            alert('An error occurred while fetching book issues');
        }
    });
}

// Function to delete a book issue by ID
function deleteBookIssue(issueId) {
    // Make the Ajax request to delete the issue
    $.ajax({
        url: API_URL + "/book-issues/" + issueId,
        method: "DELETE",
        dataType: "json",
        success: function (data) {
            if (data.status_code === 200) {
                alert(data.message);
                // Fetch updated book issues after deletion
                fetchBookIssues();
            }
        },
        error: function (xhr, status, error) {
            console.error('Ajax Error:', xhr.responseText);
            alert('An error occurred while deleting the book issue');
        }
    });
}


// Function to Fetch Return book 
function fetchPenddingToReturn(page = 1, iShow = 0) {
    var sSearch = $('#searchReturnById').val();

    // Make the Ajax request
    $.ajax({
        url: `${API_URL}/book-issues?page=${page}&search=${sSearch}&show=${iShow}`,
        method: "GET",
        dataType: "json",
        success: function (data) {
            if (data.status_code === 200) {
                // Clear existing table rows
                $('#returnTableId tbody').empty();

                // Loop through the data and populate the table
                $.each(data.data.data, function (index, item) {
                    var statusClass = item.is_return ? 'text-success-emphasis' : 'text-danger';
                    var actionButton = !item.is_return
                        ? `<a href="#" onclick="returnBookById(${item.id})"><i class="fa-solid fa-arrow-right-arrow-left"></i></a>`
                        : '-';

                    var row = `<tr>
                        <td>${index + 1}</td>
                        <td>${item.student_info.name}</td>
                        <td>${item.student_info.zprn}</td>
                        <td>${item.book_manage.name}</td>
                        <td>${item.book_manage.isbn}</td>
                        <td>${item.issue_date}</td>
                        <td class="${statusClass}">${item.is_return ? 'Returned' : 'Pending'}</td>
                        <td>${actionButton}</td>
                    </tr>`;

                    // Append the row to the table body
                    $('#returnTableId tbody').append(row);
                });

                // Handle pagination
                const currentPage = data.data.current_page;
                const lastPage = data.data.last_page;

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
                    const clickedPage = $(this).text();
                    fetchPenddingToReturn(clickedPage, iShow);
                });
            }
        },
        error: function (xhr, status, error) {
            console.error('Ajax Error:', xhr.responseText);
            alert('An error occurred while fetching book issues');
        }
    });
}



// function to Return Book By Id 

function returnBookById(issueId) {
    $.ajax({
        url: API_URL + "/book-return/" + issueId,
        method: "PUT",
        data: { "is_return": 1 },
        dataType: "json",
        success: function (data) {
            if (data.status_code === 200) {
                alert(data.message);
                // Fetch updated book issues after deletion
                fetchPenddingToReturn(1, iShow);
            }
        },
        error: function (xhr, status, error) {
            console.error('Ajax Error:', xhr.responseText);
            alert('An error occurred while deleting the book issue');
        }
    });
}

$(document).ready(function () {

    // Click Event to call add function
    $('#idAddIssues').click(addIssues);

    $('#searchById').on('input', function () {
        // Call fetchBookIssues function with the updated search value
        fetchBookIssues();
    });

    fetchBookIssues();

    // !Select2 to fetch Student Info
    // Initialize Select2 for student selection
    $('#studentNameId').select2({
        dropdownParent: $('#AddBookIssuesModalId'),
        placeholder: 'Select a student',
        ajax: {
            url: API_URL + '/student-info', // Replace with your API endpoint for fetching students
            dataType: 'json',
            data: function (params) {
                var query = {
                    search: params.term,
                    type: 'public'
                }

                // Query parameters will be ?search=[term]&type=public
                return query;
            },
            processResults: function (data) {
                return {
                    results: $.map(data.students, function (item) {
                        return {
                            id: item.zprn,
                            text: item.name + "(" + item.zprn + ")"
                        };
                    })
                };
            }
        }
    });

    // Initialize Select2 for book selection
    $('#bookNameID').select2({
        dropdownParent: $('#AddBookIssuesModalId'),
        placeholder: 'Select a book',
        ajax: {
            url: API_URL + '/fetch/book', // Replace with your API endpoint for fetching students
            dataType: 'json',
            data: function (params) {
                var query = {
                    search: params.term,
                    type: 'public'
                }

                // Query parameters will be ?search=[term]&type=public
                return query;
            },
            processResults: function (data) {
                return {
                    results: $.map(data.body.data, function (item) {
                        if (item.file_type == 1) {
                            return {
                                id: item.id,
                                text: item.name + "(" + item.isbn + ")"
                            };
                        }
                    })
                };
            }
        }
    });
});