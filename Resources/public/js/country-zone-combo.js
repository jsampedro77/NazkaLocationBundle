$(document).ready(function(){

    var parent = $('select[name*="[country]"]');
    var child = $('select[name*="[zone]"]');

    var route_name = 'nazka_location_get_zones_from_country';

    var childId = child.val();
    parent.change(updateChildren()); // Bind the function to update
    parent.change(); // Manual trigger to update categories in Document load.

    function updateChildren(){
        return function () {
            var parentId = parent.val();

            if (parentId){
                child.empty();
                child.select2("val", ""); //only if using select2 plugin
                
                var url = Routing.generate(route_name, {
                    'countryId': parentId
                });
                $.post(url, {} , function(data){
                    child.empty();
                    child.append(new Option());
                    $.each(jQuery.parseJSON(data), function(index, value) {
                        child.append(new Option(value.name, value.id));
                    });
                    $("option[value='"+childId+"']", child).attr("selected",true);
                    child.select2("val", childId);
                },"text");
            }
        };
    }
});
