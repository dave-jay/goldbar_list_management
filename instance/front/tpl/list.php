<link href="http://fonts.googleapis.com/css?family=PT+Sans+Narrow:400,700" rel='stylesheet' />
<link href="<?php print _MEDIA_URL; ?>assets/css/style.css" rel="stylesheet" />
<form action="<?php l('list') ?>" id="upload" method="post" class="form-horizontal" role="form">
    <div class="row">
        <div class="col-lg-12 col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading"><strong>Goldbar </strong></div>
                <div class="panel-body">
                   <div id="drop">
				Drop Here

				<a>Browse</a>
				<input type="file" name="upl" multiple />
			</div>

			<ul>
				<!-- The file uploads will be shown here -->
			</ul> 
                </div>
            </div>
        </div>
      
        <input type="hidden" name="press_submit" id="press_submit" value="0" />
    </div>
</form>