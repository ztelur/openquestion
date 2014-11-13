/**
 * Created by randy on 14-10-19.
 */
$(document).ready(function () {
    $("div#hmenu a#askquestion").attr({"href":"html/questions/ask/ask.php"});
    $("#register-link").attr({"href":"html/user/login.php?flag=signup"});
    $("#login-link").attr({"href":"html/user/login.php?flag=login"});
    $("#dropdown-profile").attr({"href":"html/user/user.php"});
    $("#dropdown-logout").attr({"href":"?logout"})
    $("#dropdown-askquestion").attr({"href":"html/questions/ask/ask.php"});
    $('#myTab a').click(function (e) {
    e.preventDefault()
    $(this).tab('show')
    });

});
