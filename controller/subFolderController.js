$(document).ready(() => {

    $('#masterFolderId').select2({
        dropdownParent: $('#idSubFolder'),
        placeholder: 'Select Master Sub Folder',
        width: '100%',
        ajax: {
            url: API_URL + '/folders', // Replace with your API endpoint for fetching students
            dataType: 'json',
            data: function (params) {
                var query = {
                    search: params.term
                }

                // Query parameters will be ?search=[term]&type=public
                return query;
            },
            processResults: function (data) {
                return {
                    results: $.map(data.data, function (item) {
                        return {
                            id: item.id,
                            text: item.folder_name
                        };
                    })
                };
            }
        }
    });


    $('#idSubmitSubFolder').on('click', function () {
        var folderName = $('#subFolderId').val();
        var userName = $('#userId').val();
        var masterFolder = $('#masterFolderId').val();

        $.ajax({
            url: `${API_URL}/subfolders`,
            method: 'POST',
            data: {
                sub_folder: folderName,
                user_name: userName,
                master_folder_id: masterFolder
            },
            success: function (response) {
                console.log('Folder added successfully', response);
                alert('Folder added successfully');

                // Destroy the existing DataTable
                $('#idFolderManagement').DataTable().destroy();

                // Reinitialize DataTable after adding a folder
                dataTableInitialization();
                $('#subFolderId').val('');
                $('#idSubFolder').modal('hide');
            },
            error: function (error) {
                console.log('Error adding folder', error);
                alert('Error adding folder', error);
                // Add any error handling logic
            },
        });
    });

});