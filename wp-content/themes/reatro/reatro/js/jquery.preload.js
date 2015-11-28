/*Image Preload*/
jQuery(function() {
    jQuery.fn.image_preload = function(a) {
        function i(d) {
            if (f[d] == false) {
                g++;
                a.oneachload(b[d]);
                f[d] = true
            }
            if (a.imagedelay == 0 && a.delay == 0) jQuery(b[d]).css("visibility", "visible").animate({
                opacity: 1
            },
            700);
            else if (a.delay == 0) {
                h(b[d], e);
                e += a.imagedelay
            } else if (a.imagedelay == 0) h(b[d], a.delay);
            else {
                h(b[d], a.delay + e);
                e += a.imagedelay
            }
        }
        a = jQuery.extend({
            delay: 0,
            imagedelay: 0,
            mode: "parallel",
            preload_parent: "a",
            check_timer: 100,
            ondone: function() {},
            oneachload: function() {},
            fadein: 700
        },
        a);
        var k = jQuery(this),
        j,
        c = 0,
        e = a.imagedelay,
        g = 0,
        b = k.find("img").css({
            display: "block",
            visibility: "hidden",
            opacity: 0
        }),
        f = [],
        h = function(d, l) {
            jQuery(d).css("visibility", "visible").delay(l).animate({
                opacity: 1
            },
            a.fadein)
        };
        b.each(function() {
            jQuery(this).parent(a.preload_parent).length == 0 ? jQuery(this).wrap("<a class='preloader' />") : jQuery(this).parent().addClass("preloader");
            f[c++] = false
        });
        b = jQuery.makeArray(b);
        c = g = 0;
        e = a.imagedelay;
        j = setInterval(function() {
            if (g >= f.length) {
                clearInterval(j);
                a.ondone()
            } else if (a.mode == "parallel") for (c = 0; c < b.length; c++) b[c].complete == true && i(c);
            else if (b[c].complete == true) {
                i(c);
                c++
            }
        },
        a.check_timer)
    }
});