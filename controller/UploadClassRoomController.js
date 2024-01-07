

// Function to handle the file upload
function uploadFile() {
    const sName = $("#fileNameId").val();
    const iSubFolder = $("#SubFolderId").val();
    const sFileDescription = $("#FileDcriptionId").val();
    const fileInput = $('#FileId')[0];
    const UserName = $('#userId').val();

    // Create a FormData object
    const formData = new FormData();
    formData.append('name', sName);
    formData.append('sub_folder_id', iSubFolder);
    formData.append('description', sFileDescription);
    formData.append('file', fileInput.files[0]);
    formData.append('file_type', 5);
    formData.append('user_name', UserName);

    // Make an AJAX request using FormData
    $.ajax({
        url: `${API_URL}/upload-data`,
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
        window.location.href = "uploadScreen.php?iActive=2&staffAccess=1";
    }
}

// Function to handle AJAX error
function handleUploadError(data) {
    console.error('Ajax Error:', data);
    const errorMessage = data.responseJSON && data.responseJSON.message ? data.responseJSON.message : 'An error occurred';
    alert(errorMessage);
}

// Attach the click event handler to the button
$("#uploadClassRoomId").click(uploadFile);


$(document).ready(function () {
    var SubFileId = $("#SubFolderId");

    $.ajax({
        url: `${API_URL}/subfolders`,
        type: 'GET',
        success: function (response) {
            var aData = response.data; // Assuming response is an array of File data

            // Clear existing options
            SubFileId.empty();

            // Add default option
            SubFileId.append($('<option>', {
                value: '',
                text: 'Select Any'
            }));

            // Add File options
            $.each(aData, function (index, subFolder) {
                SubFileId.append($('<option>', {
                    value: subFolder.id, // Adjust the property based on your response structure
                    text: subFolder.sub_folder // Adjust the property based on your response structure
                }));
            });

        },
        error: function (xhr, status, error) {
            // Handle errors here
            console.error(xhr.responseText);
        }
    });

});
