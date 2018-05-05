<?php include "../header.php" ?>
<style>
.fileinput-button {
position: relative;
overflow: hidden;
}
.btn {
display: inline-block;
margin-bottom: 0;
font-weight: 400;
text-align: center;
vertical-align: middle;
cursor: pointer;
background-image: none;
border: 1px solid transparent;
white-space: nowrap;
padding: 6px 12px;
font-size: 16px;
line-height: 1.42857143;
border-radius: 4px;
-webkit-user-select: none;
-moz-user-select: none;
-ms-user-select: none;
user-select: none;
}
.btn-success {
background: #999;
color: #000;
padding: 5px 20px;
border:none;
}
.container * {
-webkit-box-sizing: border-box;
-moz-box-sizing: border-box;
box-sizing: border-box;
}

.fileinput-button input {
position: absolute;
top: 0;
right: 0;
margin: 0;
opacity: 0;
-ms-filter: 'alpha(opacity=0)';
font-size: 200px;
direction: ltr;
cursor: pointer;
}
input[type=file] {
display: block;
}
.progress {
overflow: hidden;
height: 20px;
margin-bottom: 20px;
background-color: #111;
border-radius: 4px;
-webkit-box-shadow: inset 0 1px 2px rgba(0,0,0,.1);
box-shadow: inset 0 1px 2px rgba(0,0,0,.1);

}
.progress-bar-success {
background-color: #5cb85c;
}
.progress-bar {
float: left;
width: 0;
height: 100%;
font-size: 12px;
line-height: 20px;
color: #fff;
text-align: center;
background-color: #666;
-webkit-box-shadow: inset 0 -1px 0 rgba(0,0,0,.15);
box-shadow: inset 0 -1px 0 rgba(0,0,0,.15);
-webkit-transition: width .6s ease;
transition: width .6s ease;
}
</style>

<h1>Your payment is complete. Thanks for registering for Rakis 2014!</h1>
<div class="container">
    <!-- The fileinput-button span is used to style the file input field as button -->
<p>Before you go, please upload a completed waiver to expedite your sign in at gate. You can download a copy of the waiver <a href="/files/Rakis2014_waiver.pdf" target="_blank">here</a>. <br> Help us out by including your mundane name in the file name of your completed waiver. Ex: Rakis2014_waiver_player-name.pdf</p>
    <span class="btn btn-success fileinput-button">
        <i class="glyphicon glyphicon-plus"></i>
        <span>Upload Your Completed Waiver</span>
        <!-- The file input field used as target for the file upload widget -->
        <input id="fileupload" type="file" name="files[]" multiple>
    </span>
    <br>
    <br>
    <!-- The global progress bar -->
    <div id="progress" class="progress">
        <div class="progress-bar progress-bar-success"></div>
    </div>
    <!-- The container for the uploaded files -->
    <div id="files" class="files"></div>
    <br>
    
</div>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<!-- The jQuery UI widget factory, can be omitted if jQuery UI is already included -->
<script src="/js/jQuery-File-Upload/js/vendor/jquery.ui.widget.js"></script>
<!-- The Load Image plugin is included for the preview images and image resizing functionality -->
<script src="http://blueimp.github.io/JavaScript-Load-Image/js/load-image.min.js"></script>
<!-- The Canvas to Blob plugin is included for image resizing functionality -->
<script src="http://blueimp.github.io/JavaScript-Canvas-to-Blob/js/canvas-to-blob.min.js"></script>
<!-- Bootstrap JS is not required, but included for the responsive demo navigation -->
<script src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
<!-- The Iframe Transport is required for browsers without support for XHR file uploads -->
<script src="/js/jQuery-File-Upload/js/jquery.iframe-transport.js"></script>
<!-- The basic File Upload plugin -->
<script src="/js/jQuery-File-Upload/js/jquery.fileupload.js"></script>
<!-- The File Upload processing plugin -->
<script src="/js/jQuery-File-Upload/js/jquery.fileupload-process.js"></script>
<!-- The File Upload image preview & resize plugin -->
<script src="/js/jQuery-File-Upload/js/jquery.fileupload-image.js"></script>
<!-- The File Upload audio preview plugin -->
<script src="/js/jQuery-File-Upload/js/jquery.fileupload-audio.js"></script>
<!-- The File Upload video preview plugin -->
<script src="/js/jQuery-File-Upload/js/jquery.fileupload-video.js"></script>
<!-- The File Upload validation plugin -->
<script src="/js/jQuery-File-Upload/js/jquery.fileupload-validate.js"></script>
<script>
/*jslint unparam: true, regexp: true */
/*global window, $ */
$(function () {
    'use strict';
    // Change this to the location of your server-side upload handler:
    var url = '/js/jQuery-File-Upload/server/php/',
        uploadButton = $('<button/>')
            .addClass('btn btn-primary')
            .prop('disabled', true)
            .text('Processing...')
            .on('click', function () {
                var $this = $(this),
                    data = $this.data();
                $this
                    .off('click')
                    .text('Abort')
                    .on('click', function () {
                        $this.remove();
                        data.abort();
                    });
                data.submit().always(function () {
                    $this.remove();
                });
            });
    $('#fileupload').fileupload({
        url: url,
        dataType: 'json',
        autoUpload: true,
        acceptFileTypes: /(\.|\/)(pdf)$/i,
        maxFileSize: 5000000, // 5 MB
        // Enable image resizing, except for Android and Opera,
        // which actually support image resizing, but fail to
        // send Blob objects via XHR requests:
        disableImageResize: /Android(?!.*Chrome)|Opera/
            .test(window.navigator.userAgent),
        previewMaxWidth: 100,
        previewMaxHeight: 100,
        previewCrop: true
    }).on('fileuploadadd', function (e, data) {
        data.context = $('<div/>').appendTo('#files');
        $.each(data.files, function (index, file) {
            var node = $('<p/>')
                    .append($('<span/>').text(file.name));
            if (!index) {
                node
                    .append('<br>')
                    .append(uploadButton.clone(true).data(data));
            }
            /*node.appendTo(data.context);*/
        });
    }).on('fileuploadprocessalways', function (e, data) {
        var index = data.index,
            file = data.files[index],
            node = $(data.context.children()[index]);
        if (file.preview) {
            node
                .prepend('<br>')
                .prepend(file.preview);
        }
        if (file.error) {
            node
                .append('<br>')
                .append($('<span class="text-danger"/>').text(file.error));
        }
        if (index + 1 === data.files.length) {
            data.context.find('button')
                .text('Upload')
                .prop('disabled', !!data.files.error);
        }
    }).on('fileuploadprogressall', function (e, data) {
        var progress = parseInt(data.loaded / data.total * 100, 10);
        $('#progress .progress-bar').css(
            'width',
            progress + '%'
        );
    }).on('fileuploaddone', function (e, data) {
        $.each(data.result.files, function (index, file) {
            if (file.url) {
                /*var link = $('<a>')
                    .attr('target', '_blank')
                    .prop('href', file.url);*/
                $('#files')
                    .append("Your waiver has been uploaded successfully and you're all done. We'll see you at the event.");
				$('#fileupload').fileupload('disable');
				$('.fileinput-button').hide();
				
            } else if (file.error) {
                var error = $('<span class="text-danger"/>').text(file.error);
                $(data.context.children()[index])
                    .append('<br>')
                    .append(error);
            }
        });
		
    }).on('fileuploadfail', function (e, data) {
        $.each(data.files, function (index, file) {
            var error = $('<span class="text-danger"/>').text('File upload failed.');
            $(data.context.children()[index])
                .append('<br>')
                .append(error);
        });
    }).prop('disabled', !$.support.fileInput)
        .parent().addClass($.support.fileInput ? undefined : 'disabled');
});
</script>




<?php include "../footer.php" ?>