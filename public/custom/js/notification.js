var NotificationInterval = null;
var isPausedNotifi = false;

function markNotificationReaded(element){
    var id = element.attr('data-id');
    $.ajax({
        url: '/ajax/make-notification-readed/'+id,
        method: 'POST',
        success: function(data){
            if( data == true ){
                element.removeClass('unread');
            }
        },
        error: function(error){
            console.log(error.responseText);
        }
    });
}

$(document).ready(function(){

    $('.notifi-dropdown .list-notifications').scroll( function(){
        var Height = $(this).height();
        var scrollHeight = $(this)[0].scrollHeight;
        var scrollTop = $(this).scrollTop();
        var _this = $(this);
        var not_in = [];

        _this.find('>li').each(function(index, el) {
            if( $(this).attr('data-id') != 'undefined' ){
                not_in.push($(this).attr('data-id'));
            }
        });

        if( Height + scrollTop == scrollHeight ){
            //// scroll Bottom
            isPausedNotifi = true;
            _this.parent().addClass('loading');

            //// get view load more notification
            $.ajax({
                url: '/ajax/get-notification-paginate/',
                data: {not_in: not_in},
                method: 'GET',
                success: function(data){
                    isPausedNotifi = false;
                    
                    $.each(data.data, function(index, val) {
                        if( _this.find('>li[data-id="'+val.id+'"]').length == 0 ){
                            _this.append(val.html);
                        }
                    });
                    window.setTimeout(function(){
                        _this.parent().removeClass('loading');
                    }, 500);
                },
                error: function(error){
                    isPausedNotifi = false;
                    _this.parent().removeClass('loading');
                    console.log(error.responseText);
                }
            });
        }
    })

    ////////////// click to mark read notification
    $('.notifi-dropdown .list-notifications').on('click', 'li.unread[data-id]', function(){
        markNotificationReaded($(this));
        return false;
    })

    //// make readed if hover over 400ms
    $('.notifi-dropdown .list-notifications').on('mouseenter', '>li.unread[data-id]', function(event) {
        $(this).data('inTime', new Date().getTime());
    });
    $('.notifi-dropdown .list-notifications').on('mouseleave', '>li.unread[data-id]', function(event) {
        var outTime = new Date().getTime();
        var hoverTime = (outTime - $(this).data('inTime'));
        if( hoverTime >= 400 ){
            markNotificationReaded($(this));
        }
    });
    //////////////////////////////////////////////////////////////////////////////////////////////////////

    
    NotificationInterval = setInterval(function(){
        if(isPausedNotifi){
            return;
        }
        var element = $('.navbar-custom-menu li.notifi-dropdown');
        element.find('>a>i').removeClass('swing animated');
        $.ajax({
            url: '/ajax/unread-notification',
            dataType: "json",
            method: 'POST',
            success: function(data){
                element.find('.count-unread-notifi').text(data.count);
                if( data.count > 0 ){
                    element.find('>a>i').addClass('swing animated');
                    $.each(data.data, function(index, val) {
                        if( element.find('.list-notifications>li[data-id="'+val.id+'"]').length == 0 ){
                            element.find('.list-notifications').prepend(val.html);
                        }
                    });
                }
            },
            error: function(error){
                console.log(error.responseText);
            }
        });
    }, 5000);


});