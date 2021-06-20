$(function(){
    get_data();
});

function get_data(){
    $.ajax({
        url: "result/ajax/",
        dataType:"json",
        success: data => {
            // $("#comment-data")
            //     .find(".comment-visible")
            //     .remove();

            // for (var i = 0; i < data.chats.length; i++){
            //     var html = ` 
            //             <div class="media comment-visible">
            //                 <div class="media-body comment-body">
            //                     <div class="row">
            //                         <span class="comment-body-user" id="name">${data.chats[i].name}</span>
            //                         <span class="comment-body-time" id="created_at">${data.chats[i].created_at}</span>
            //                         <span class="comment-body-content" id="chat">${data.chats[i].chat}</span>
            //                     </div>
            //                 </div>
            //             </div>
            //         `;
            
            //     $("#comment-data").append(html);


            // }

            console.log(data);
        },
        error: () => {
            alert("ajax Error");
        }
    });
    setTimeout("get_data()", 5000);
}