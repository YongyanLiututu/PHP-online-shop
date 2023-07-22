$(document).ready(function () {
    // Listen for the search button click event
    $("#searchBtn").click(function () {
        // Display search popover

        $("#searchModal").fadeIn();
    });

    // Listen for popover close button click event
    $(".close").click(function () {
        // Hide the search popover
        $("#searchModal").fadeOut();
    });
});
