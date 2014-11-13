/**
 * Created by randy on 14-11-12.
 */
$(document).ready(function () {
    $("div#hmenu a#askquestion").attr({"href":"../questions/ask/ask.php"});
    $("#register-link").attr({"href":"login.php?flag=signup"});
    $("#login-link").attr({"href":"login.php?flag=login"});
    $("#dropdown-profile").attr({"href":"user.php"});
    $("#dropdown-logout").attr({"href":"#?logout"})
    $("#dropdown-askquestion").attr({"href":"../questions/ask/ask.php"});
});