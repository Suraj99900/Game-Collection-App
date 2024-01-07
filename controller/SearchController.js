

// Function to handle the file search
function searchBooks(page = 1) {
    var bookName = $("#searchBookByNameId").val();
    var bookISBN = $("#searchBookByISBNId").val();
    var typeId = $("#typeId").val();
    var semesterId = $("#semesterId").val() !== '0' ? $("#semesterId").val() : '';
    var dFromDate = $("#searchBookByFromDateId").val();
    var dToDate = $("#searchBookByToDateId").val();
    // Make an AJAX request using $.get method

    $.ajax({
        url: `${API_URL}/fetch/book?name=` + bookName + `&isbn=` + bookISBN + `&limit=` + 9 + `&page=` + page + `&typeId=` + typeId + `&semester=` + semesterId + `&fromDate=` + dFromDate + `&dToDate=` + dToDate,
        method: 'get',
        success: function (data) {
            handleSearchSuccess(data);
        },
        error: function (data) {
            // Handle Ajax error
            handleSearchError(data);
        }
    });
}

// Function to handle a successful search
function handleSearchSuccess(data) {
    if (data.status_code === 200) {
        $('#showBookId').html(""); // Clear the existing content
        var sTemplate = "";

        const books = data.body.data;
        if(books.length == 0){
            sTemplate +=" <h3 class='contact-title padd-15 typing'>No Found Record.</h3>";
        }
        books.forEach((book, index) => {
            var sType = "";
            var color = "";
            if (book['file_type'] == 1) {
                sType = "Book";
                color = "rgba(0,0,0,0.0);"
            } else if (book['file_type'] == 2) {
                sType = "Notes";
                color = "rgba(0,0,0,0.28);"
            } else {
                sType = "Assignment";
                color = "rgba(0,0,0,0.48);"
            }
            sTemplate += "<div class='card col-sm-12 col-md-6 col-lg-4 p-5 ' style='background:" + color + "'>";
            sTemplate += "<div class='card-body'>";
            sTemplate += "<h4 class='card-title '>" + book['name'].toUpperCase() + "</h4>";
            sTemplate += "<p class='card-text' ><small class='text-muted'> <b>ISBN/RELEATED : </b> " + book['isbn'] + "</small></p>";
            sTemplate += "<p class='card-text' ><small class='text-muted'> <b>Semester : </b> " + book['sem'] + "</small></p>";
            sTemplate += "<p class='card-text' ><small class='text-muted'> <b>Type : </b> " + sType + "</small></p>";
            sTemplate +=  book['submission_date'] ? "<p class='card-text' ><small class='text-muted'> <b>Submission Date : </b> " + (book['submission_date'] ? book['submission_date'] :'') + "</small></p>" : "";
            sTemplate += "<p class='card-text'><small class='text-muted'> <b>Desciption : </b> " + book['description'] + "</small></p>";
            sTemplate += "<p class='card-text'><small class='text-muted'> <b>Added On : </b> " + book['added_on'] + "</small></p>";
            sTemplate += "</div>";
            sTemplate += "<div class='flex' style='align-items: center;display: flex;justify-content: center;'><button style='width: 50%;' class='btn download' data-url='" + book.file_name + "' data-index='" + index + "'><i class='fa-solid fa-circle-arrow-down'></i></button></div>";
            sTemplate += "</div>";
        });
        $('#showBookId').append(sTemplate);

        // Handle pagination
        const currentPage = data.body.current_page;
        const lastPage = data.body.last_page;

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
                searchBooks(currentPage - 1);
            } else if (page === 'Next') {
                searchBooks(currentPage + 1);
            } else {
                searchBooks(page);
            }
        });
    }
}



// Function to handle AJAX error
function handleSearchError(xhr, status, error) {
    console.error('Ajax Error:', error);
    const errorMessage = xhr.responseJSON && xhr.responseJSON.message ? xhr.responseJSON.message : 'An error occurred';
    alert(errorMessage);
}

// Event delegation to handle download button clicks
$(document).on('click', '.download', function () {
    const url = $(this).data('url');
    const index = $(this).data('index');
    downloadFile(url, index);
});

// Function to handle a successful download
function downloadFile(url, index) {
    // Make an AJAX request to download the file
    $.ajax({
        url: `${API_URL}/download`,
        method: 'POST',
        data: { url: url },
        xhrFields: {
            responseType: 'blob' // Set the response type to 'blob' to handle binary data
        },
        success: function (data, status, xhr) {
            if (data) {
                const contentDisposition = xhr.getResponseHeader('Content-Disposition');
                const fileName = contentDisposition.match(/filename="(.+)"/)[1];

                // Create a Blob object from the downloaded data
                const blob = new Blob([data], { type: 'application/octet-stream' });

                // Create a URL for the Blob object
                const url = window.URL.createObjectURL(blob);

                // Create an anchor element to trigger the download
                const a = document.createElement('a');
                a.href = url;
                a.download = fileName;
                a.style.display = 'none';
                document.body.appendChild(a);

                a.click();

                // Clean up
                window.URL.revokeObjectURL(url);
                document.body.removeChild(a);

                alert('File downloaded successfully for ' + fileName);
            } else {
                alert('No data received for download.');
            }
        },
        error: function (xhr, status, error) {
            console.log('Download Error:', error);
            const errorMessage = xhr.responseJSON && xhr.responseJSON.message ? xhr.responseJSON.message : 'An error occurred during download';
            alert(errorMessage);
        }
    });
}


// Initial search when the document is ready
$(document).ready(() => {
    $('.d-none-custom').css('display', 'none');
    // Attach the click event handler to the search button
    $("#idSearch").click(searchBooks);

    var semesterId = $("#semesterId");

    $.ajax({
        url: `${API_URL}/semester`,
        type: 'GET',
        success: function (response) {
            var aData = response.data; // Assuming response is an array of semester data

            // Clear existing options
            semesterId.empty();

            // Add default option
            semesterId.append($('<option>', {
                value: '0',
                text: 'Select Any'
            }));

            // Add semester options
            $.each(aData, function (index, semester) {
                semesterId.append($('<option>', {
                    value: semester.id, // Adjust the property based on your response structure
                    text: semester.semester // Adjust the property based on your response structure
                }));
            });

            searchBooks();

        },
        error: function (xhr, status, error) {
            // Handle errors here
            console.error(xhr.responseText);
        }
    });



    // change evenet handel for Assignment
    $('#typeId').change(function() {
        var iTypeId =  $('#typeId').val();

        if(iTypeId == 3){
            $('.d-none-custom').css('display', 'block');
        }else{
            $('.d-none-custom').css('display', 'none');
        }
    });


});

