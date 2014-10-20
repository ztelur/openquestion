/**
 * Created by randy on 14-10-16.
 */
$(document).ready(function() {
    $(".register-link").mouseenter(function () {
        $(".register-link").css({"background-color":"yellow","border-size":"1px"});
    });
    $(".register-link").mouseleave(function () {
        $(".register-link").css("background-color", "black");

    });
});
console.log("dddd");
function addListener() {
    $("register-link").addEventListener("keyup",mouseoverhandler($("register-link")),false);
}
function mouseoverhandler(obj) {

}