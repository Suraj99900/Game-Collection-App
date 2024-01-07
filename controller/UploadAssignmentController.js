

// Function to handle the file upload
function uploadFile() {
    const sBookName = $("#assignmentNameId").val();
    const sBookISBN = $("#assignmentRelatedToSubjectId").val();
    const iSemester = $("#semesterId").val();
    const sBookDescription = $("#assignmentDescriptionId").val();
    const fileInput = $('#assignmentFileId')[0];
    const UserName = $('#userId').val();
    var dSubmissionDate = $('#submissionDateId').val();

    // Create a FormData object
    const formData = new FormData();
    formData.append('name', sBookName);
    formData.append('isbn', sBookISBN);
    formData.append('semester', iSemester);
    formData.append('description', sBookDescription);
    formData.append('file', fileInput.files[0]);
    formData.append('file_type', 3);
    formData.append('user_name', UserName);
    formData.append('submission_date', dSubmissionDate);

    // Make an AJAX request using FormData
    $.ajax({
        url: `${API_URL}/upload`,
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
        window.location.href = "uploadScreen.php?staffAccess=1";
    }
}

// Function to handle AJAX error
function handleUploadError(data) {
    console.error('Ajax Error:', data);
    const errorMessage = data.responseJSON && data.responseJSON.message ? data.responseJSON.message : 'An error occurred';
    alert(errorMessage);
}

// Attach the click event handler to the button
$("#uploadAssId").click(uploadFile);


$(document).ready(function () {
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
                value: '',
                text: 'Select Any'
            }));

            // Add semester options
            $.each(aData, function (index, semester) {
                semesterId.append($('<option>', {
                    value: semester.id, // Adjust the property based on your response structure
                    text: semester.semester // Adjust the property based on your response structure
                }));
            });

        },
        error: function (xhr, status, error) {
            // Handle errors here
            console.error(xhr.responseText);
        }
    });

});
