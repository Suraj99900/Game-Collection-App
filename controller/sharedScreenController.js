
const fetchReferCode = async (user_id)=>{
    $.ajax({
        url: API_URL + "/refer/"+user_id,
        method: "get",
        success: function (data) {
            if (data.status === 200) {
                var referralLink = ABS_URL + "view/registrationForm.php?code=" + data.body[0].refer_code;
                $('#referralLinkId').val(referralLink);
                $('#facebookShareId').attr("href", "https://www.facebook.com/sharer/sharer.php?u=" + encodeURIComponent(referralLink));
                $('#whatsAppShareId').attr("href", "https://web.whatsapp.com/send?text=" + encodeURIComponent("Check this out: " + referralLink));
                $('#emailShareId').attr("href", "mailto:?subject=Check%20this%20out&body=" + encodeURIComponent("Check this out: " + referralLink));
            }
        },
        error: function (xhr, status, error) {
            console.log('Ajax Error:', xhr.responseJSON.message);
            responsePop('Error', xhr.responseJSON.message, 'error', 'ok');
        }
    });
}


$(document).ready(async () => {
   await fetchReferCode(iUserID);
});