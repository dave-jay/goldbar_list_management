
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script src="<?php print _MEDIA_URL; ?>assets/js/jquery.knob.js"></script>

<!-- jQuery File Upload Dependencies -->
<script src="<?php print _MEDIA_URL; ?>assets/js/jquery.ui.widget.js"></script>
<script src="<?php print _MEDIA_URL; ?>assets/js/jquery.iframe-transport.js"></script>
<script src="<?php print _MEDIA_URL; ?>assets/js/jquery.fileupload.js"></script>

<!-- Our main JS file -->
<script src="<?php print _MEDIA_URL; ?>assets/js/script.js"></script>
<script type="text/javascript">
    function doParseFile(response) {
        $("#waitParse").show();
        $.ajax({
            url: _U + 'list',
            data: {parseFile: 1, fName: response.fileName},
            success: function(r) {
                $("#sucParse,#sucDownload").show();
                $("#waitParse").hide();
                var res = $.parseJSON(r);
                $("#hrefGI").attr("href", "uploads/" + res.gi);
                $("#hrefNON").attr("href", "uploads/" + res.non_gi);
            }
        });
    }


</script>
