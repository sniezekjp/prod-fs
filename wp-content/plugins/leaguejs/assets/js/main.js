(function($) {
	//load Team Menu
    function jps_team_menu(){
        //Get the Teams submenu
        //It should already have 'Team Archives'
        //var teams = $('#menu-item-418 .sub-menu');
        var teams = $('#top-menu [href=#teams]').parent().find('.sub-menu');
        
        //Append Boys/Girls Teams Function
        function subTeams(label, links){
        	if(!links.length) { return; }

            //create a list item that will be prepended to ul.sub-menu
            var menu = $('<li></li>');
            menu.append('<a href="javascript:void(0)">'+label+'</a>');
            
            //create a submenu to hold the team links
            var sub = $('<ul class="sub-menu"></ul>'); 
            links.forEach(function(value){
                sub.append('<li><a href="'+value.link+'">'+value.team+'</a></li>');
            })
            
            //append the team links to list item
            menu.append(sub);
            
            //append the entire list item to the teams sub-menu
            teams.prepend(menu);
        }
        
        subTeams('Boys', team_menu.Boys);
        subTeams('Girls',team_menu.Girls);
    }

    function jps_menu_stick(){
        var menu = $('.site-menu'); 
        menu.wrap('<div class="stick-container"></div>');
        
        $(window).scroll(function() {    
            var scroll = $(window).scrollTop();
            if (scroll >= 180) {
                menu.addClass("stick");
            } else {
                menu.removeClass("stick");
            }
        });
    }

    function jpsPlusMinus() {
        $('.plus').click(function() {
            var previous = $(this).prev();
            previous.val(parseInt(previous.val()) + 1);
        });
        $('.minus').click(function() {
            var next = $(this).next();
            var min = parseInt(next.attr('min')) || 0;
            var decrementedValue = parseInt(next.val()) - 1;
            if(decrementedValue < min) { return; }
            next.val(decrementedValue);
        });
    }

	$(document).ready(function() {
		jps_team_menu();
        jps_menu_stick();
        jpsPlusMinus();
	});
})(jQuery)