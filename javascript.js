/* PING */

var ping_timeout;

function ping ()
{
    $.ajax({
        async : false,
        type: "GET",
        url: "./ajax.php",
        data: "block=ping",
        success: function(html){
            $("#ping").html(html);
        }
    });

    ping_timeout = setTimeout("ping()", 30000);
}