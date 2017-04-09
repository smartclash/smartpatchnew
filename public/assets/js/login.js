function toggleMessage(type, text)
{
    $("#messages").html("<div class=\"notification "+type+"\"><button class=\"delete\"></button>" + text + "</div>");
}


$(document).ready(function() {

    $("#loginForm").on('submit', function(e) {
        e.preventDefault(); // prevent default
        toggleMessage("is-primary", "Logging you in");

        if($("#email").val() === "" || $("#password").val() === "")
        {
            toggleMessage("is-warning", "No values for email or password was entered");
        } else
        {
            $.ajax({
                url: '/login', // This script handles the form
                type: 'POST', // Method used to send data !DONT CHANGE
                dataType: 'html', // Request type
                data: "email=" + $("#email").val() + "&password=" + $("#password").val(), // 'serialize' form data
                beforeSend: function() {
                    $("#loginbutton").addClass("is-loading"); // Indicate that the form is being processed
                    toggleMessage("is-primary", "Logging you in");
                    Pace.restart();
                },
                success: function(data) {
                    toggleMessage("is-success", data);
                    $("#loginbutton").removeClass("is-loading"); // Indicate that the form is being processed
                },
                error: function(e) {
                    toggleMessage("is-danger","Oops, some kind of error");
                    console.log(e); // Log any errors
                }
            });
        }
    });

    $("#signUpForm").on('submit', function(e) {
        e.preventDefault(); // prevent default
        toggleMessage("Logging you in");

        $.ajax({
            url: '/login', // This script handles the form
            type: 'POST', // Method used to send data !DONT CHANGE
            dataType: 'html', // Request type
            data: "email=" + $("#email").val() + "&password=" + $("#password").val(), // 'serialize' form data
            beforeSend: function() {
                $("#signUpButton").addClass("is-loading"); // Indicate that the form is being processed
                toggleMessage("Logging you in");
                Pace.restart();
            },
            success: function(data) {
                toggleMessage(data);
                $("#signUpButton").removeClass("is-loading"); // Indicate that the form is being processed
            },
            error: function(e) {
                toggleMessage("Oops, some kind of error");
                console.log(e); // Log any errors
            }
        });
    });
});
