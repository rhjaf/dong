$(document).ready(function() {
    $('[data-toggle="tooltip"]').tooltip();



    // auto hide alert messages
    $(".alert").fadeTo(2000, 500).slideUp(500, function(){
        $(".alert").slideUp(500);
    });
});
