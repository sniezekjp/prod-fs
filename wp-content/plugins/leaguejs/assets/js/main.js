(function($) {
	//load Team Menu
    function jps_team_menu(){
        //Get the Teams submenu
        //It should already have 'Team Archives'
        //var teams = $('#menu-item-418 .sub-menu');
        var teams = $('#top-menu [href=#teams]').parent().find('.sub-menu');
        console.log(teams);
        
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
        console.log(team_menu);
    }

	$(document).ready(function() {
		jps_team_menu();
	});
})(jQuery)