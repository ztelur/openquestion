/**
 * Created by randy on 14-12-2.
 */
$(document).ready(function () {
        $("#searchbutton").click(function (e) {
            e.preventDefault();
            var text=$("#searchinput").val();
            var testlist=text.split(':');
            alert(text);
            if (testlist.length==2) {
                $("#bigsearch").attr({"name":"user"});
                $("#searchinput").val(testlist[1]);
            }else {
                alert(testlist[0]);
            }
            $("#bigsearch").submit();

    });
});