// お決まり
$(document).ready(function() {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    
    // submitボタン押すイベント発火
    $("#submit").click( function() {
        const url = "/admin/chat/chat";
        $.ajax({
            url: url,
            type: "POST",
            data: {
                chat_id: chat_id,
                user_id: user_id,
                message: $('#messageInput').val(),
            },
        });
        return false;
    });

    // 表示させる処理
    window.Echo.channel('chatRoomChannel').listen('ChatPusher', (e) => {
        console.log(e, e.message.user_id);
        if(e.message.user_id === user_id){
            console.log(true);
            $('.messages').append(
                '<div class="message justify-content-end row"><div class="text-right"><span>' + current_user_name + '</span><small> now</small><p>' +e.message.message + '</p></div></div>'
                );
        } else {
            console.log(false);
            $('.messages').append(
                '<div class="message justify-content-start row"><div class="text-left"><span>' + chat_room_user_name + '</span><small> now</small><p>' + e.message.message + '</p></div></div>'
                );    
        }
    });
});
