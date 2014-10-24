/**
 * Created by randy on 14-10-24.
 */
$(document).ready(function () {
    $(".vote-up-off").click(function () {
        var count=$(".vote-count-post").text();
        $(".vote-count-post").text((parseInt(count)+1).toString());
    });
    $(".vote-down-off").click(function () {
        var count=$(".vote-count-post").text();
        $(".vote-count-post").text((parseInt(count)-1).toString());
    });
});