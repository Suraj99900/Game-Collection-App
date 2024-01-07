

// Function to handle the Add Student Info
function addStudent() {
    const sName = $("#studentuserNameId").val();
    const sZPRN = $("#ZPRNid").val();
    const sEmail = $("#emailId").val();
    const iPhoneNumber = $("#phoneId").val();
    const iSemesterID = $('#semesterId').val();
    const sAddress = $('#addressid').val();

    const studentData = {
        name: sName,
        zprn: sZPRN,
        semester: iSemesterID,
        address: sAddress,
        email: sEmail,
        phone_no: iPhoneNumber,
    };

    // Make an AJAX request to add a student
    $.ajax({
        url: `${API_URL}/student-info`,
        method: "POST",
        data: studentData,
        success: handleAddSuccess,
        error: handleAddError,
    });
}

// Function to handle a successful add
function handleAddSuccess(data) {
    if (data.status_code === 201) {
        alert(data.message);
        // You can optionally refresh the student list here
        window.location.href = "studentInfo.php?iActive=4";
    }
}

// Function to handle AJAX error for adding a student
function handleAddError(data) {
    console.error('Ajax Error:', data);
    const errorMessage = data.responseJSON && data.responseJSON.message ? data.responseJSON.message : 'An error occurred';
    alert(errorMessage);
}

// Function to get students and populate the DataTable
function getStudents() {
    $.ajax({
        url: `${API_URL}/student-info`,
        type: 'GET',
        success: function (response) {
            const students = response.students;

            // Clear and re-populate the DataTable with student data
            const studentTable = $('#studentTableId').DataTable();
            studentTable.clear();

            students.forEach((student, index) => {
                // Assuming that the 'students' array contains data in the format you provided
                studentTable.row.add([
                    index + 1, // Sr no
                    student.name, // Name
                    student.zprn, // Name
                    // Action column with links
                    `<a href="viewStudentInfo.php?ZPRN=`+ student.zprn +`&iActive=4&staffAccess=1"><i class="fa-solid fa-eye"></i></a> <a href="updateStudentInfo.php?ZPRN=` + student.zprn + `&iActive=4&staffAccess=1"><i class="fa-solid fa-pencil"></i></a>`
                ]);
            });

            studentTable.draw();
        },
        error: function (xhr, status, error) {
            console.error(xhr.responseText);
        }
    });
}


// Function to get a student by ZPRN
function getStudentByZPRN(zprn) {
    $.ajax({
        url: `${API_URL}/student-info/zprn`,
        type: 'GET',
        data: { zprn: zprn },
        success: function (data) {
            if (data.status_code === 200) {
                // Handle the retrieved student data
                const student = data.student;
                // You can display or process the student data as needed
            } else {
                alert(data.message);
            }
        },
        error: function (xhr, status, error) {
            console.error(xhr.responseText);
        }
    });
}

// Function to get student info by ZPRN and populate the update form
function getStudentInfoAndPopulateForm(zprn) {
    $.ajax({
        url: `${API_URL}/student-info/zprn?zprn=` + zprn,
        type: 'GET',
        success: function (data) {
            if (data.status_code === 200) {
                const student = data.student;
                // Populate the update form fields with student information
                $("#studentuserNameId").val(student.name);
                $("#ZPRNid").val(student.zprn);
                $("#emailId").val(student.email);
                $("#phoneId").val(student.phone_no);
                $("#semesterId").val(student.semester);
                $("#addressid").val(student.address);

            } else {
                alert(data.message);
            }
        },
        error: function (xhr, status, error) {
            console.error(xhr.responseText);
        }
    });
}

// Function to update a student by ZPRN
function updateStudentByZPRN() {
    var zprn = sZPRN;
    var name = $("#studentuserNameId").val();
    var zprn = $("#ZPRNid").val();
    var email = $("#emailId").val();
    var phone_no = $("#phoneId").val();
    var semester = $("#semesterId").val();
    var address = $("#addressid").val();

    $.ajax({
        url: `${API_URL}/student-info`,
        method: "PUT",
        data: { zprn: zprn,
            name :name,
            email:email,
            phone_no: phone_no,
            semester:semester,
            address:address
         },
        success: handleUpdateSuccess,
        error: handleUpdateError,
    });
}

// Function to handle a successful update
function handleUpdateSuccess(data) {
    if (data.status_code === 200) {
        alert(data.message);
        // You can optionally refresh the student list here
        window.location.href = "studentInfo.php?iActive=4";

    }
}

// Function to handle AJAX error for updating a student
function handleUpdateError(data) {
    console.error('Ajax Error:', data);
    const errorMessage = data.responseJSON && data.responseJSON.message ? data.responseJSON.message : 'An error occurred';
    alert(errorMessage);
}

// Function to freeze a student by ZPRN
function freezeStudent(zprn) {
    $.ajax({
        url: `${API_URL}/student-info/zprn`,
        method: "DELETE",
        data: { zprn: zprn },
        success: handleFreezeSuccess,
        error: handleFreezeError,
    });
}

// Function to handle a successful freeze
function handleFreezeSuccess(data) {
    if (data.status_code === 200) {
        alert(data.message);
        // You can optionally refresh the student list here
    }
}

// Function to handle AJAX error for freezing a student
function handleFreezeError(data) {
    console.error('Ajax Error:', data);
    const errorMessage = data.responseJSON && data.responseJSON.message ? data.responseJSON.message : 'An error occurred';
    alert(errorMessage);
}

// fetch semester 

function semester() {
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
}

$(document).ready(function () {
    // call semester function on load document...
    semester();

    // Attach the click event handler to the button for adding a student
    $("#idAddSubmit").click(addStudent);
    // Attach the click event handler to the button for updateing a student
    $("#idUpdateSubmit").click(updateStudentByZPRN);

    // Initialize the student table
    studentTableInit();

    // Load students when the page loads
    getStudents();
});

function studentTableInit() {
    $('#studentTableId').DataTable({
        "paging": true,
        "searching": true,
    });
}
