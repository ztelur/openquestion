/**
 * Created by randy on 14-11-12.
 */
$(document).ready(function () {
    $("div#hmenu a#askquestion").attr({"href":"ask/ask.php"});
    $("#register-link").attr({"href":"../user/login.php?flag=signup"});
    $("#login-link").attr({"href":"../user/login.php?flag=login"});
    $("#dropdown-profile").attr({"href":"../user/user.php"});
    $("#dropdown-logout").attr({"href":"../../index.php?logout"})
    $("#dropdown-askquestion").attr({"href":"/ask/ask.php"});
});