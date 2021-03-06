/**
 * Created by randy on 14-10-24.
 */
 $(function(){
    function initToolbarBootstrapBindings() {
      var fonts = ['Serif', 'Sans', 'Arial', 'Arial Black', 'Courier',
            'Courier New', 'Comic Sans MS', 'Helvetica', 'Impact', 'Lucida Grande', 'Lucida Sans', 'Tahoma', 'Times',
            'Times New Roman', 'Verdana'],
            fontTarget = $('[title=Font]').siblings('.dropdown-menu');
      $.each(fonts, function (idx, fontName) {
          fontTarget.append($('<li><a data-edit="fontName ' + fontName +'" style="font-family:\''+ fontName +'\'">'+fontName + '</a></li>'));
      });
      $('a[title]').tooltip({container:'body'});
    	$('.dropdown-menu input').click(function() {return false;})
		    .change(function () {$(this).parent('.dropdown-menu').siblings('.dropdown-toggle').dropdown('toggle');})
        .keydown('esc', function () {this.value='';$(this).change();});

      $('[data-role=magic-overlay]').each(function () {
        var overlay = $(this), target = $(overlay.data('target'));
        overlay.css('opacity', 0).css('position', 'absolute').offset(target.offset()).width(target.outerWidth()).height(target.outerHeight());
      });
      if ("onwebkitspeechchange"  in document.createElement("input")) {
        var editorOffset = $('#editor').offset();
        $('#voiceBtn').css('position','absolute').offset({top: editorOffset.top, left: editorOffset.left+$('#editor').innerWidth()-35});
      } else {
        $('#voiceBtn').hide();
      }
	};
	function showErrorAlert (reason, detail) {
		var msg='';
		if (reason==='unsupported-file-type') { msg = "Unsupported format " +detail; }
		else {
			console.log("error uploading file", reason, detail);
		}
		$('<div class="alert"> <button type="button" class="close" data-dismiss="alert">&times;</button>'+
		 '<strong>File upload error</strong> '+msg+' </div>').prependTo('#alerts');
	};
      initToolbarBootstrapBindings();
	$('#editor').wysiwyg({ fileUploadError: showErrorAlert} );
    window.prettyPrint && prettyPrint();
  });
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
        var uid=$("#user").attr('uid');
        var qid=$("#question").attr("qid");
         data={
             uid:uid,
             qid:qid,
             up:true
         };
         $.post("../../lib/php/upvote/upvote.php",data, function (cdata, cstatus) {
            alert(cdata)
             if (cdata=="true") {
                $(".vote-count-post").text((parseInt(count)+1).toString());
             } else {
                 alert("you have upvoted!");
             }

         });

    });
     $(".vote-down-off").click(function () {
        var count=$(".vote-count-post").text();
        var uid=$("#user").attr('uid');
        var qid=$("#question").attr("qid");
         data={
             uid:uid,
             qid:qid,
             up:false
         };
         $.post("../../lib/php/upvote/upvote.php",data, function (cdata, cstatus) {
            alert(cdata)
             if (cdata=="true") {
                $(".vote-count-post").text((parseInt(count)-1).toString());
             } else {
                 alert("you have upvoted!");
             }

         });

    });


//    新的可以单独分量的vote-up
        $(".avote-up-off").click(function () {
            var parent=$(this).parents(".votecell");
            var aid=parent.attr("id");
            var count=parent.find("[class=avote-count-post]",0).text();
            var uid=$("#user").attr('uid');
            //var qid=$("#question").attr("qid");
            data={
                aid:aid,
                uid:uid,
                up:true
            };
            $.post("../../lib/php/upvote/upvote.php",data, function (cdata, cstatus) {
                alert(cdata)
                if (cdata=="true") {
                     parent.find("[class=avote-count-post]",0).text((parseInt(count)+1).toString());
                } else {
                     alert("you have upvoted!");
                }

            });

        });
     $(".avote-down-off").click(function () {
            var parent=$(this).parents(".votecell");
            var aid=parent.attr("id");
            var count=parent.find("[class=avote-count-post]",0).text();
            var uid=$("#user").attr('uid');
            data={
                aid:aid,
                uid:uid,
                up:true
            };
            $.post("../../lib/php/upvote/upvote.php",data, function (cdata, cstatus) {
                alert(cdata)
                if (cdata=="true") {
                    parent.find("[class=avote-count-post]",0).text((parseInt(count)-1).toString());


                } else {
                     alert("you have upvoted!");
                }

            });

        });

     $(".avote-accepted-off").click(function () {
         var parent=$(this).parents(".votecell");
         var aid=parent.attr("id");
         var qid=$("#question").attr("qid");
         var score=$(".score").text();
         var data={
             aid:aid,
             qid:qid,
             score:score
         }
         $.post("../../lib/php/upvote/adopt.php",data,function (cdata,status) {
                alert(cdata);
                // 换图片
                //其他的所有可以认可的符号都要hiden
            if (cdata=="true") {
                $(".avote-accepted-off").hide();
            }

         });
     })
});

$(document).ready(function () {
    $(".postanswerbutton").click(function () {
        $uid=$("#post-id").attr("value");
        $qid=$("#question-id").attr("value");
        $uname=$("#post-name").attr("value");
        $content=$("#editor").html();
        $data={"qid":$qid,"uid":$uid,"content":$content,"uname":$uname};
        $.post("origin/answersubmit.php",$data, function (data,status) {
            alert(data);
            location.reload(true);

        });
    });
});