$(function() {
    $('#dates-field2').multiselect({
    	//alert("Hii");
    	//console.log("hiiiiiiiiiii");
        includeSelectAllOption: true,
        onChange: function(element, checked) {
        var brands = $('#multiselect1 option:selected');
        var selected = [];
        $(brands).each(function(index, brand){
            selected.push([$(this).val()]);
        });

        console.log(selected);
    	}
    });
});