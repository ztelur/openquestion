/**
 * Created by randy on 14-10-19.
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
    $("#title").blur(function () {
        var text=$("#title").val();
        if(text!="") {
            if (text.length<15) {
                alert("title must be at least 15 characters");
                $("#title").focus();
            }
            if (text.length>150) {
                $("#title").focus();
                alert("title can't more than 150 characters");
            }
        }
    })
    $("#tagname").keyup(function () {
        var text=$("#tagname").val();
        if(text!="") {
            $.get("../../../lib/php/tags/tag.php?tag=" + text, function (data, status) {
                $("#tag-suggestions").empty();

                if (data != "") {
                    var tag = 0;
                    tags = data.split("/");

                    for (tag; tag < tags.length; tag++) {
                        //alert(tag);
                        $("#tag-suggestions").append("<div> <span class='label label-primary'>" + tags[tag] + "</span></div>");
                    }
                    $("#tag-suggestions").show();
                }
            });
        }else {
            $("#tag-suggestions").hide();
        }
        });
    $("#tagname").blur(function () {
        $("#tag-suggestions").empty();
        $("#tag-suggestions").hide();
    });
    $("#post-form").submit(function () {
        var utitle=$("#title").val();
        var utag=$("#tagname").val();
        var utext=$("#editor").html();
        var data={title:utitle,content:utext,tagname:utag};
        $.post("submit.php",data, function (cdata, cstatus) {
            alert(cdata);

            window.location.href=cdata;
        });
    return false;

    });

});
