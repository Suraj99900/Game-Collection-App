// Function to handle a successful download
function downloadExcel() {
    // Make an AJAX request to download the file
    $.ajax({
        url: `${API_URL}/export-students`,
        method: 'POST',
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

                // Display a success message
                alert('File downloaded successfully for ' + fileName);
            } else {
                // Display an error message if no data is received
                alert('No data received for download.');
            }
        },
        error: function (xhr, status, error) {
            console.log('Download Error:', error);
            
            // Display an error message with details if available
            const errorMessage = xhr.responseJSON && xhr.responseJSON.message ? xhr.responseJSON.message : 'An error occurred during download';
            alert(errorMessage);
        }
    });
}

$(document).ready(() => {
    // Event delegation to handle download button clicks
    $(document).on('click', '#BulkUploadStudentId', function () {
        downloadExcel();
    });

    $(document).on('click', '#idUploadSubmit', function () {
        uploadFile();
    });

});


// Function to handle the file upload
function uploadFile() {
    const fileInput = $('#studentUploadId')[0];

    // Create a FormData object
    const formData = new FormData();
    formData.append('file', fileInput.files[0]);

    // Make an AJAX request using FormData
    $.ajax({
        url: `${API_URL}/import-students`,
        method: "POST",
        data: formData,
        contentType: false, // Required for FormData
        processData: false, // Required for FormData
        success: handleUploadSuccess,
        error: handleUploadError,
    });
}

// Function to handle a successful upload
function handleUploadSuccess(data) {
    if (data.status_code === 200) {
        // Registration was successful
        alert(data.message);
        // Redirect to another page (example)
        window.location.href = "studentInfo.php?iActive=4&staffAccess=1";
    }
}

// Function to handle AJAX error
function handleUploadError(data) {
    console.error('Ajax Error:', data);
    const errorMessage = data.responseJSON && data.responseJSON.message ? data.responseJSON.message : 'An error occurred';
    alert(errorMessage);
}