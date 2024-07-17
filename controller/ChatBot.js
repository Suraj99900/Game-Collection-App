let send = document.getElementById('send');
let msg = document.getElementById('usermsg');
let chat = document.getElementById('chatbot');
var iii = 0;

function requestSelli() {
    if (msg.value != "") {
        var user = document.createElement('div');
        var div_box_user = document.createElement('div');
        div_box_user.setAttribute('class', 'usermsg');
        div_box_user.setAttribute('id', 'u' + iii);
        var div_box_selli = document.createElement('div');
        user.setAttribute('class', 'alert alert-primary user_msg');
        user.innerHTML = "<img src='../res/img/icons8-user-100.png' alt='user img' style='width:50px;'>" + msg.value;
        div_box_user.append(user);
        chat.append(div_box_user);

        var selli = document.createElement('div');
        selli.setAttribute('class', 'alert alert-info selli_msg');

        var ajax = new XMLHttpRequest();
        ajax.open("GET", "../ajaxFile/ajaxChatBot.php?req=" + msg.value, true);

        ajax.onload = () => {
            div_box_selli.setAttribute('id', 's' + iii);
            div_box_selli.setAttribute('class', 'sellimsg');
            var selliMsg = ajax.responseText;
            if (selliMsg != "") {
                selli.innerHTML = "<img src='../res/img/icons8-girl-and-check-50.png' alt='selli img' style='width:50px !important;'>" + selliMsg;
                div_box_selli.append(selli);
                chat.append(div_box_selli);
                scrollToBottom();
                msg.value = "";
                iii++;
            }
        }
        ajax.send();
    }
}

function scrollToBottom() {
    $("#chatbot").scrollTop($("#chatbot")[0].scrollHeight);

}

send.addEventListener('click', requestSelli);
