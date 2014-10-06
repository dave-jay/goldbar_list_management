<link href="http://fonts.googleapis.com/css?family=PT+Sans+Narrow:400,700" rel='stylesheet' />
<link href="<?php print _MEDIA_URL; ?>assets/css/style.css" rel="stylesheet" />

<div class="row" style="color:black;margin-top:10px">
    <div class="col-lg-12 col-md-12">
        <div class="panel panel-default">
<!--            <div class="panel-heading"><strong> Upload your list file </strong></div>-->
            <div class="panel-body">
                <div class="col-lg-4">
                    <form action="<?php l('list') ?>" id="upload" method="post" class="form-horizontal" role="form">
                        <div id="drop" >
                            Drop  List CSV Here
                            <a>Browse</a>
                            <input type="file" name="upl" multiple />
                        </div>
                        <ul></ul> 
                    </form>
                </div>
                <div class="col-lg-1"></div>
                <div class="col-lg-4">
                    <div class="alert alert-success" role="alert" id="sucFileUpload" style="display:none">
                        <strong>Success!</strong> File is uploaded successfully.
                    </div>
                    <div class="alert alert-warning" role="alert" id="waitParse" style="display:none">
                        <strong>Parsing </strong>the file now. Please wait... <i class="fa fa-refresh fa-spin">&nbsp;</i>
                    </div>
                    <div class="alert alert-success" role="alert" id="sucParse" style="display:none">
                        <strong>Success! </strong> Please download the lists from below</i>
                    </div>
                    <div class="well" id="sucDownload" style="display:none">
                        <a href="javascript:;" class="" id="hrefGI"><i class="fa fa-download">&nbsp;</i> Download GI Emails</a> |  
                        <a href="javascript:;" id="hrefNON"><i class="fa fa-download">&nbsp;</i> Downlaod Non-GI Emails</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <input type="hidden" name="press_submit" id="press_submit" value="0" />
</div>
<style type="text/css">
    #upload  { 
        background-color: white !important;
        background-image: none !important;
        border-radius: none !important;
        box-shadow: none !important;

    }
</style>