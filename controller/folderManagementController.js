function dataTableInitialization() {
    $('#idFolderManagement').DataTable({
        ajax: {
            url: `${API_URL}/folders`,
            type: 'GET',
            dataType: 'json',
            data: function (d) {
                d.show = d.length;
                d.page = (d.start / d.length) + 1;
                d.limit = 7;
            },
            dataSrc: 'data.data',
        },
        processing: true,
        serverSide: true,
        paginate: true,
        lengthMenu: [5, 10, 25, 50], // Set page size options
        pageLength: 7, // Initial page size
        columns: [
            {
                data: null, title: 'Sr No', render: function (data, type, row, meta) {
                    return meta.row + meta.settings._iDisplayStart + 1; // Calculate the serial number
                }
            },
            { data: 'folder_name', title: 'Folder Name' },
            { data: 'user_name', title: 'Added By' },
            { data: 'creation_on', title: 'Creation Date' },
            {
                data: 'status',
                title: 'Action',
                render: function (data, type, row) {
                    var freezeIconClass = data == 1 ? 'fa-pause' : 'fa-play';
                    var freezeButton = '<button class="btn btn-warning freeze-button" data-status="' + (data == 1 ? 0 : 1) + '" data-id="' + row.id + '"><i class="fas ' + freezeIconClass + '"></i> ' + '</button>';
                    var deleteButton = '<button class="btn btn-danger delete-button" data-id="' + row.id + '"><i class="fas fa-trash-alt"></i></button>';
                    var viewSubFolder = '<button class="btn btn-danger view-button" data-id="' + row.id + '"><i class="fa-solid fa-eye"></i></button>';
                    return viewSubFolder + ' ' + freezeButton + ' ' + deleteButton;
                }


            },
        ],
        pagingType: 'full_numbers',
        language: {
            paginate: {
                first: '&laquo;&laquo;',
                previous: '&laquo;',
                next: '&raquo;',
                last: '&raquo;&raquo;',
            },
        },
    });
}




$(document).ready(function () {
    dataTableInitialization();

    $('#idCreate').on('click', function () {
        var folderName = $('#folderId').val();
        var userName = $('#userId').val();

        $.ajax({
            url: `${API_URL}/folders`,
            method: 'POST',
            data: {
                folder_name: folderName,
                user_name: userName
            },
            success: function (response) {
                console.log('Folder added successfully', response);
                alert('Folder added successfully');

                // Destroy the existing DataTable
                $('#idFolderManagement').DataTable().destroy();

                // Reinitialize DataTable after adding a folder
                dataTableInitialization();
                $('#folderId').val('');
                $('#idAddFolderMaster').modal('hide');
            },
            error: function (error) {
                console.error('Error adding folder', error);
                // Add any error handling logic
            },
        });
    });


    // click event for freeze or unfreeze
    $('#idFolderManagement').on('click', '.freeze-button', function () {
        var folderId = $(this).data('id');
        var status = $(this).data('status');

        $.ajax({
            url: `${API_URL}/folders/${folderId}/freeze`,
            method: 'PUT',
            data: {
                status: status
            },
            success: function (response) {
                alert(response.message);
                // Destroy the existing DataTable
                $('#idFolderManagement').DataTable().destroy();

                // Reinitialize DataTable after adding a folder
                dataTableInitialization();
            },
            error: function (error) {
                console.log('Error freezing folder', error);
                alert(error);
            },
        });
    });

    // click event for delete the record
    $('#idFolderManagement').on('click', '.delete-button', function () {
        var folderId = $(this).data('id');
        var deleteFlag = 1; // Set the desired flag for deletion

        $.ajax({
            url: `${API_URL}/folders/${folderId}`,
            method: 'DELETE',
            data: {
                delete: deleteFlag
            },
            success: function (response) {
                alert('Folder deleted successfully', response);
                // Destroy the existing DataTable
                $('#idFolderManagement').DataTable().destroy();

                // Reinitialize DataTable after adding a folder
                dataTableInitialization();
            },
            error: function (error) {
                console.log('Error deleting folder', error);
                alert(error);
            },
        });
    });

    $('#idviewModal').on('click', '.delete-sub-button', function () {
        var folderId = $(this).data('subfolder-id');
        var deleteFlag = 1; // Set the desired flag for deletion

        $.ajax({
            url: `${API_URL}/subfolders/${folderId}`,
            method: 'DELETE',
            success: function (response) {
                alert(response.message);
                $('#idviewModal').modal('hide');
            },
            error: function (error) {
                console.log('Error deleting folder', error);
                alert(error.message);
                $('#idviewModal').modal('hide');
            },
        });
    });

    $('#idFolderManagement').on('click', '.view-button', function () {
        var masterFolderId = $(this).data('id');
    
        $.ajax({
            url: `${API_URL}/subfolders/master/${masterFolderId}`,
            method: 'GET',
            success: function (data) {
                var aData = data.data;
                $('#idviewModal').modal('show');
    
                var sTemplate = ""; // Initialize the variable outside the loop
    
                aData.forEach((ele, index) => {
                    sTemplate += "<tr>";
                    sTemplate += "<td>" + (index + 1) + "</td>";
                    sTemplate += "<td>" + ele.sub_folder + "</td>";
                    sTemplate += "<td><button class='btn btn-danger delete-sub-button' data-subfolder-id='" + ele.id + "'><i class='fa-solid fa-trash-alt'></i></button></td>";

                    sTemplate += "</tr>";
                });
    
                // Destroy existing DataTable, if any
                if ($.fn.DataTable.isDataTable('#idSubFolderManagement')) {
                    $('#idSubFolderManagement').DataTable().destroy();
                }
    
                // Set the HTML content and initialize DataTable
                $('#idSubFolderBody').html(sTemplate);
                $('#idSubFolderManagement').DataTable({
                    paging: true, // Enable paging
                    lengthMenu: [5, 10, 25, 50], // Set custom page lengths
                    pageLength: 5, // Set default page length
                    searching: false, // Disable searching
                    ordering: false // Disable sorting
                });
            },
            error: function (error) {
                console.log('Error retrieving subfolders', error);
                alert(error);
            },
        });
    });
    
});

