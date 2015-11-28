(function($) {
    $.fn.countdown = function(options, callback) {
        $thisEl = $(this);
        var settings = {
            'date' : null,
            'format' : null
        };
        if(options) {
            $.extend(settings, options);
        };
        
        function countdown_proc() {
            var eventDate = Date.parse(settings['date']) / 1000;
            var currentDate = Math.floor($.now() / 1000);
            var seconds = eventDate - currentDate;
            
            
            var days = Math.floor( seconds / (60 * 60 * 24));
            seconds -= days * 60 * 60 *24;
            
            var hours = Math.floor( seconds / ( 60 * 60));
            seconds -= hours * 60 * 60;
            
            var minutes = Math.floor( seconds / 60);
            seconds -= minutes * 60;
            
            if(settings['format'] == "on") {
                days = (String(days).length >= 2) ? days : "0" + days;
                hours = (String(hours).length >= 2) ? hours : "0" + hours;
                minutes = (String(minutes).length >= 2) ? minutes : "0" + minutes;
                seconds = (String(seconds).length >= 2) ? seconds : "0" + seconds;
            }
            
            if (days == 1) { $thisEl.find(".days .text").text("day"); } else { $thisEl.find(".days .text").text("days"); }
            if (hours == 1) { $thisEl.find(".hours .text").text("hour"); } else { $thisEl.find(".hours .text").text("hours"); }
            if (minutes == 1) { $thisEl.find(".minutes .text").text("minute"); } else { $thisEl.find(".minutes .text").text("minutes"); }
            if (seconds == 1) { $thisEl.find(".seconds .text").text("second"); } else { $thisEl.find(".seconds .text").text("seconds"); }

            if(!isNaN(eventDate)) {
                $thisEl.find('.days .time').text(days);
                $thisEl.find('.hours .time').text(hours);
                $thisEl.find('.minutes .time').text(minutes);
                $thisEl.find('.seconds .time').text(seconds);
            } else {
                alert("Date format is wrong! Please use date format like 25 december 2013 23:23:59");
                clearInterval(interval);
            }
            if(eventDate <= currentDate) {
                callback.call(this);
                clearInterval(interval);
            }
            
        };
        countdown_proc();
        interval = setInterval(countdown_proc, 1000);
    };
})(jQuery);

