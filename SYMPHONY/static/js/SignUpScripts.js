$(document).ready(function () {

    $("#username").focusout(function () {
        var name = $("#username");
        var div = $("#div1");
        if (!(name.val().length > 0)) {
            div.text("You can't leave this empty.");
            div.css('color', "red");
            name.css('border-color', "red");
        } else {
            div.text("");
            name.css('border-color', "#cccccc");
        }

    });

    $("#username").focusin(function () {
        $("#div1").text("");
        $("#username").css('border-color', "#3399FF");
    });

    $("#fname").focusout(function () {
        var name = $("#fname");
        var div = $("#div2");
        if (!(name.val().length > 0)) {
            div.text("You can't leave this empty.");
            div.css('color', "red");
            name.css('border-color', "red");
        } else {
            div.text("");
            name.css('border-color', "#cccccc");
        }

    });

    $("#fname").focusin(function () {
        $("#div2").text("");
        $("#fname").css('border-color', "#3399FF");
    });

    $("#lname").focusout(function () {
        var name = $("#lname");
        var div = $("#div3");
        if (!(name.val().length > 0)) {
            div.text("You can't leave this empty.");
            div.css('color', "red");
            name.css('border-color', "red");
        } else {
            div.text("");
            name.css('border-color', "#CCCCCC");
        }

    });

    $("#lname").focusin(function () {
        $("#div3").text("");
        $("#lname").css('border-color', "#3399FF");
    });
    $("#email").focusout(function () {
        var email = $("#email");
        var div = $("#div4");
        if (!(email.val().length > 0)) {
            div.text("You can't leave this empty.");
            div.css('color', "red");
            email.css('border-color', "red");
        } else {
            var pattern = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
            if (email.val().match(pattern)) {
                div.text("");
                email.css('border-color', "#CCCCCC");
            } else {
                div.text("Enter a valid email address.");
                div.css('color', "red");
                email.css('border-color', "red");

            }
        }
    });
    $("#email").focusin(function () {
        $("#div4").text("");
        $("#email").css('border-color', "#3399FF");
    });
    $("#password").focusout(function () {
        var name = $("#password");
        var div = $("#div5");
        if (!(name.val().length > 0)) {
            div.text("You can't leave this empty.");
            div.css('color', "red");
            name.css('border-color', "red");
        } else {
            div.text("");
            name.css('border-color', "#CCCCCC");
        }

    });
    $("#password").focusin(function () {
        $("#div5").text("");
        $("#password").css('border-color', "#3399FF");
    });
    $("#cnfpassword").focusout(function () {
        var name = $("#cnfpassword");
        var div = $("#div6");
        if (!(name.val().length > 0)) {
            if (!($("#password").val().length > 0)) {
                div.text("You can't leave this empty.");
                div.css('color', "red");
                name.css('border-color', "red");
            } else {
                div.text("These passwords don't match. Try again?");
                div.css('color', "red");
                name.css('border-color', "red");
            }
        } else {
            if (name.val() === $("#password").val()) {
                div.text("");
                name.css('border-color', "#CCCCCC");
            } else {
                div.text("These passwords don't match. Try again?");
                div.css('color', "red");
                name.css('border-color', "red");
            }

        }

    });
    $("#cnfpassword").focusin(function () {
        $("#div6").text("");
        $("#cnfpassword").css('border-color', "#3399FF");
    });


    $("#contact").focusout(function () {
        var number = $("#contact");
        var div = $("#div7");
        var pattern = /^\+(\d{11})$/;
        if (number.val().match(pattern)) {
            div.text("");
            $("#contact").css('border-color', "#CCCCCC");
        } else {
            if ($("#contact").val().length > 0) {
                div.text("This phone number format is not recognized. Please check the country and number.");
                div.css('color', "red");
                $("#contact").css('border-color', "red");
            } else {
                div.text("You can't leave this empty.");
                div.css('color', "red");
                number.css('border-color', "red");
            }
        }

    });

    $("#contact").focusin(function () {
        $("#div7").text("");
        $("#contact").css('border-color', "#3399FF");
    });

    $("#checkboxcap").click(function () {
        $("#capdiv").toggle(this.notchecked);
    });

    $("#checkbox1").click(function () {
        var div = $("#div9");
        div.css('color', "red");
        div.text("In order to use our services, you must agree to xxx Terms of Service.");
        $("#div8").toggle(this.notchecked);
    });

    $(function () {
        showPopover = function () {
            $(this).popover('show');
        }
        , hidePopover = function () {
            $(this).popover('hide');
        };

        $('#password').popover({
            placement: 'left',
            html: true,
            content: "<div class='passwordmsg'><b>Password strength:</b><br>\n\
<div class='row'><div class='col-md-1'></div><div class='col-md-10' id='strengthbar'> </div></div>Use at least 8 characters. Don’t use a password from another site, or something too obvious like your pet’s name.</div>",
            trigger: 'manual'
        })
                .focus(showPopover)
                .blur(hidePopover)
                .hover(showPopover, hidePopover);
    });


    $(function () {
        showPopover = function () {
            $(this).popover('show');
        }
        , hidePopover = function () {
            $(this).popover('hide');
        };

        $('#contact').popover({
            placement: 'left',
            html: true,
            content: "<div id='contactmsg'>Enter your phone number including country code.ex +94 .</div>",
            trigger: 'manual'

        })
                .focus(showPopover)
                .blur(hidePopover)
                .hover(showPopover, hidePopover);
    });
});









