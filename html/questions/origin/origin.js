/**
 * Created by randy on 14-10-24.
 */
$(document).ready(function () {
    /*
    * 如何实现点赞的问题
    *  1 要有一个数据库的点赞表，用户id+问题id或者答案id
    *  2 点赞时，使用AJAx，到服务器，查询
    *           2.1 如果没有此项点赞，返回true
    *           2.2 有了话，返回false
    *  3.1 如果返回true，界面显示+1
    *  3.2 如果返回false，界面显示已经点赞啦
    *
    * */
    $(".vote-up-off").click(function () {
        var count=$(".vote-count-post").text();
        $(".vote-count-post").text((parseInt(count)+1).toString());
    });
    $(".vote-down-off").click(function () {
        var count=$(".vote-count-post").text();
        $(".vote-count-post").text((parseInt(count)-1).toString());
    });
});