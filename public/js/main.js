// select2
$(document).ready(function() {
    $('.select2').select2(
    );
});


//collapse sidenavbar
function collapseSidebar() {
    $('#sidebar').hide();
    $('#show-sidebar-btn').show();
};

function showSidebar() {
    $('#sidebar').show();
    $('#show-sidebar-btn').hide();
};

if ($(window).width() < 960) {
    console.log("sdasdasda");
    collapseSidebar();
}

