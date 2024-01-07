var searchTimeout;

$(document).ready(() => {

    fetchFolder();

    $('#searchFolderById').on('input', function () {
        var searchValue = $(this).val().toLowerCase();

        // Clear the previous timeout
        clearTimeout(searchTimeout);

        // Set a new timeout
        searchTimeout = setTimeout(function () {
            // Call fetchFolder after a brief delay
            fetchFolder(searchValue);
        }, 1000); // Adjust the delay time as needed (in milliseconds)
    });

});


function fetchFolder(search = '') {
    $('#idMasterFolder').empty();
    $.ajax({
        url: `${API_URL}/folders`,
        type: 'GET',
        data: {
            'search': search,
        },
        success: function (response) {
            var aData = response.data; // Assuming response is an array of semester data
            if (aData.length > 0) {
                $.each(aData, function (index, folder) {
                    // Assuming folderName is a property of each folder
                    if (folder.status == 1) {
                        var folderName = folder.folder_name;

                        // Generate a unique id for each folder
                        var folderId = 'folder_' + index;

                        // Append a folder icon with improved style, id, and a link to idMasterFolder div for each folder
                        $('#idMasterFolder').append(
                            '<div class="col-lg-3 col-md-4 col-sm-12 folder">' +
                            '<div class="folder-card" id="' + folderId + '">' +
                            '<a href="subFolder.php?masterFolderId=' + folder.id + '&masterFolderName=' + folderName + '&iActive=6" class="folder-link">' +
                            '<div class="folder-icon">' +
                            '<i class="fa-solid fa-folder-open"></i>' + // You can use an appropriate icon class
                            '</div>' +
                            '<p class="folder-name">' + folderName + '</p>' +
                            '</a>' +
                            '</div>' +
                            '</div>'
                        );
                    }
                });
            } else {
                $('#idMasterFolder').append(
                    '<div class="col-lg-12 col-md-12 col-sm-12 folder">' +
                    '<h3 class="error-msg">No folder found</h3>' +
                    '</div>'
                );
            }

        },
        error: function (xhr, status, error) {
            // Handle errors here
            console.log(xhr.responseText);
        }
    });
}

function fetchSubFolder(id, search = '') {
    $('#idsubFolder').empty();
    $.ajax({
        url: `${API_URL}/subfolders/master/` + id,
        type: 'GET',
        data: {
            'search': search,
        },
        success: function (response) {
            var aData = response.data; // Assuming response is an array of semester data
            if (aData.length > 0) {
                $.each(aData, function (index, folder) {
                    // Assuming folderName is a property of each folder
                    var folderName = folder.sub_folder;

                    // Generate a unique id for each folder
                    var folderId = 'folder_' + index;

                    // Append a folder icon with improved style, id, and a link to idsubFolder div for each folder
                    $('#idsubFolder').append(
                        '<div class="col-lg-3 col-md-4 col-sm-12 folder">' +
                        '<div class="folder-card" id="' + folderId + '">' +
                        '<a href="classRoomData.php?SubFolderId=' + folder.id + '&SubFolderName=' + folderName + '&iActive=6" class="folder-link">' +
                        '<div class="folder-icon">' +
                        '<i class="fa-solid fa-folder-open"></i>' + // You can use an appropriate icon class
                        '</div>' +
                        '<p class="folder-name">' + folderName + '</p>' +
                        '</a>' +
                        '</div>' +
                        '</div>'
                    );
                });
            } else {
                $('#idsubFolder').append(
                    '<div class="col-lg-12 col-md-12 col-sm-12 folder">' +
                    '<h3 class="error-msg">No folder found</h3>' +
                    '</div>'
                );
            }

        },
        error: function (xhr, status, error) {
            // Handle errors here
            console.log(xhr.responseText);
        }
    });
}


function fetchFolderData(id, search = '') {
    $('#idFolderData').empty();
    $.ajax({
        url: `${API_URL}/upload-data`,
        type: 'GET',
        data: {
            'search': search,
            'sub_folder_id': id,
        },
        success: function (response) {
            var aData = response.data; // Assuming response is an array of semester data

            if (aData.data.length > 0) {
                $.each(aData.data, function (index, afile) {
                    console.log(afile);
                    // Assuming folderName is a property of each folder
                    var sFileName = afile.file.toLowerCase();

                    // Generate a unique id for each folder
                    var sPath = afile.file_name;
                    var FileId = 'file_' + index;

                    // Append a folder icon with improved style, id, and a link to idsubFolder div for each folder
                    $('#idFolderData').append(
                        '<div class="col-lg-3 col-md-4 col-sm-12 folder">' +
                        '<div class="folder-card" id="' + FileId + '">' +
                        '<a class="download" data-url="' + sPath + '" data-index="' + index + '" >' +
                        '<div class="folder-icon">' +
                        '<i class="fa-solid fa-file-arrow-down"></i>' + // You can use an appropriate icon class
                        '</div>' +
                        '<p class="folder-name">' + sFileName + '</p>' +
                        '</a>' +
                        '</div>' +
                        '</div>'
                    );
                });
            } else {
                $('#idFolderData').append(
                    '<div class="col-lg-12 col-md-12 col-sm-12 folder">' +
                    '<h3 class="error-msg">No File found</h3>' +
                    '</div>'
                );
            }

        },
        error: function (xhr, status, error) {
            // Handle errors here
            console.log(xhr.responseText);
        }
    });
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
        url: `${API_URL}/download-file`,
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