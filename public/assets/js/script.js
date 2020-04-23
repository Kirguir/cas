$(document).ready(function () {
    console.log("ready!");
    $('#subscriber').autocomplete({
        source: function (request, response) {
            $.post("/subscribers", request, response);
        },
        minLength: 3
    });
    $('#magazine').autocomplete({
        source: function (request, response) {
            $.post("/magazines", request, response);
        },
        minLength: 3
    });
});
