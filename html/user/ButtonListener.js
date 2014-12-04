/**
 * Created by randy on 14-11-12.
 */
$(document).ready(function () {
    $("div#hmenu a#askquestion").attr({"href":"../questions/ask/ask.php"});
    $("#register-link").attr({"href":"login.php?flag=signup"});
    $("#login-link").attr({"href":"login.php?flag=login"});
    $("#dropdown-profile").attr({"href":"user.php"});
    $("#dropdown-logout").attr({"href":"../../../index.php?logout"});
    $("#dropdown-askquestion").attr({"href":"../questions/ask/ask.php"});
    $("#changepasswordbutton").click(function () {

        var coldpassword=$("#password").val();
        var cpassword1=$("#newpassword1").val();
        var cpassword2=$("#newpassword2").val();
        var cuid=$(".profile-me").attr("uid");
        data={
            uid:cuid,
            oldpassword:coldpassword,
            password1:cpassword1,
            password2:cpassword2
        };
        $.post("changpassword.php",data, function (cdata,status) {

             if (cdata=='true') {
                alert("success")
             } else if(cdata=='passwordnotsame') {
                 alert("password not same");
             } else if (cdata=='passworderror') {
                 alert("old password wrong");
             }
        });
    });
});