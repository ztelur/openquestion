/**
 * Created by randy on 14-10-19.
 */
$(document).ready(function () {
    $("div#hmenu a#askquestion").attr({"href":"html/questions/ask/ask.php"});
    $("#register-link").attr({"href":"html/user/login.php?flag=signup"});
    $("#login-link").attr({"href":"html/user/login.php?flag=login"});
    var uid=$(".profile-me").attr("uid");
    $(".profile-me").attr({"href":"html/user/user.php?uid="+uid});
    $("#dropdown-profile").attr({"href":"html/user/user.php?uid="+uid});
    $("#dropdown-logout").attr({"href":"?logout"})
    $("#dropdown-askquestion").attr({"href":"html/questions/ask/ask.php"});
    $('#myTab a').click(function (e) {
    e.preventDefault();
    $(this).tab('show')
    });
    $(".searchform").keypress(function (e) {
        if (e.which==13) {
            e.preventDefault();
            var text=$("#searchinput").val();
            var testlist=text.split(':');
            if (testlist.length==2) {
                $("#searchinput").attr({"name":"user"});
                $("#searchinput").val(testlist[1]);
            }else {
                alert(testlist[0]);
            }
            $(this).submit();
        }
    })

});
