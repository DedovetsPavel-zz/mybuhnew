/* C H E C K B O X */
function changeCheck(el) {

	var el = el,
		input = el.find("input").eq(0);
	if(el.attr("class").indexOf("niceCheckDisabled")==-1) {	
   		if(!input.attr("checked")) {
			el.addClass("niceChecked");
			input.attr("checked", true);
		} else {
			el.removeClass("niceChecked");
			input.attr("checked", false).focus();
		}
	}
    return true;
};

function changeVisualCheck(input) {
	var wrapInput = input.parent();
	if(!input.attr("checked")) {
		wrapInput.removeClass("niceChecked");
		input.attr("checked", false).focus();
	} else {
		wrapInput.addClass("niceChecked");
		input.attr("checked", true);
	}
	
}

function changeCheckStart(el) {

try
{
	var el = el,
		checkName = el.attr("name"),
		checkId = el.attr("id"),
		checkChecked = el.attr("checked"),
		checkDisabled = el.attr("disabled"),
		checkValue = el.attr("value"),
		checkClass = el.attr("class"),
		checkTab = el.attr("tabindex");
	if(checkChecked)
		el.after("<span class='"+checkClass+" niceChecked'>"+
			"<input type='checkbox'"+
			"name='"+checkName+"'"+
			"id='"+checkId+"'"+
			"checked='"+checkChecked+"'"+
			"value='"+checkValue+"'"+
			"class='"+checkClass+"'"+
			"tabindex='"+checkTab+"' /></span>");
	else
		el.after("<span class='"+checkClass+"'>"+
			"<input type='checkbox'"+
			"name='"+checkName+"'"+
			"id='"+checkId+"'"+
			"value='"+checkValue+"'"+
			"class='"+checkClass+"'"+
			"tabindex='"+checkTab+"' /></span>");
	
	el.next().find("input").removeClass('niceCheck');
	if(checkDisabled)
	{
		el.next().addClass("niceCheckDisabled");
		el.next().find("input").eq(0).attr("disabled","disabled");
	}
	
	el.next().bind("mousedown", function(e) { changeCheck(jQuery(this)) });
	el.next().find("input").eq(0).bind("change", function(e) { changeVisualCheck(jQuery(this)) });
	if(jQuery.browser.msie)
	{
		el.next().find("input").eq(0).bind("click", function(e) { changeVisualCheck(jQuery(this)) });	
	}
	el.remove();
}
catch(e)
{
	// РµСЃР»Рё РѕС€РёР±РєР°, РЅРёС‡РµРіРѕ РЅРµ РґРµР»Р°РµРј	
}
    return true;
};

$(document).ready(function(){
	jQuery(".niceCheck").each(
		function() {
			 changeCheckStart(jQuery(this));
		});
});