$(document).ready(function () {

    $("#name").focusout(function () {
        var name = $("#name");
        var div = $("#divUserName");
        if (!(name.val().length > 0)) {
            div.text("You can't leave this empty.");
            name.css('border-color', "red");
        } else {
            div.text("");
            name.css('border-color', "#cccccc");
        }

    });

    $("#name").focusin(function () {
        $("#divUserName").text("");
        $("#name").css('border-color', "#3399FF");
    });
    
    $("#txtpassword").focusout(function () {
        var name = $("#txtpassword");
        var div = $("#divPassword");
        if (!(name.val().length > 0)) {
            div.text("You can't leave this empty.");
            name.css('border-color', "red");
        } else {
            div.text("");
            name.css('border-color', "#cccccc");
        }

    });

    $("#name").focusin(function () {
        $("#divPassword").text("");
        $("#txtpassword").css('border-color', "#3399FF");
    });
    });
