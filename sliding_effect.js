$(document).ready(function()
{
	slide("#linkovi", 25, 15, 150, .8);
});

function slide(navigation_id, pad_out, pad_in, time, multiplier)
{
	var list_elements = navigation_id + " li.link1";
	var link_elements = list_elements + " a";
	var timer = 0;
	$(list_elements).each(function(i)
	{
		$(this).css("margin-left","-180px");
		timer = (timer*multiplier + time);
		$(this).animate({ marginLeft: "0" }, timer);
		$(this).animate({ marginLeft: "15px" }, timer);
		$(this).animate({ marginLeft: "0" }, timer);
	});
	$(link_elements).each(function(i)
	{
		$(this).hover(
		function()
		{
			$(this).animate({ paddingLeft: pad_out }, 150);
		},		
		function()
		{
			$(this).animate({ paddingLeft: pad_in }, 150);
		});
	});
}