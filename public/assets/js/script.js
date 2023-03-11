// Slug Automatic   
const title = document.querySelector("#name");
const slug = document.querySelector("#slug");

title.addEventListener("keyup", function() {
    let preslug = title.value;
    preslug = preslug.replace(/ /g,"-");
        slug.value = preslug.toLowerCase()
});

// Datatables
$(document).ready( function () {
    $('#dataTable').DataTable();
} );

