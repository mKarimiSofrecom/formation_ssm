
// this script is about displaying the medical accessories only if in the type we select 'medical'

let amb_type = $("#ambulance_type");

if(amb_type.val() == 'simple'){
    $("#ambulance_new_accessory").hide();
}

amb_type.change(function (){

    if($( this ).val() == 'medical'){
        $("#ambulance_new_accessory").show();
    } else {
        $("#ambulance_new_accessory").hide();
    }
});