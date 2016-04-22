<?php include("$THEME/extras/inboxside.php"); ?> 

	
	<div class="container-fluid" id="pcont">
    <div class="message">
      <div class="head">
        <div class="subject">
          <input type="text" placeholder="Enter your subject here">
        </div>
      </div>
      <div class="to">
        <div class="form-group">
          <label class="col-sm-1 control-label">To:</label>
          <div class="col-sm-11">
            <input class="tags" type="hidden" value="myfriend@example.com,info@emailserver.com, Company Partners" />
          </div>
        </div>
      </div>
      <div class="to cc">
        <div class="form-group">
          <label class="col-sm-1 control-label">Cc:</label>
          <div class="col-sm-11">
            <input class="tags" type="hidden" value="Principal" />
          </div>
        </div>
      </div>
      <div class="mail editor">
        <textarea style="height:250px;" class="form-control" id="some-textarea">Hello,
          <br><br>
          Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem.
        </textarea>
        <div class="form-group">
          <button class="btn btn-primary" type="submit"><i class="fa fa-envelope"></i> Send</button>
          <button class="btn btn-default"><i class="fa fa-times"></i> Cancel</button>
        </div>
      </div>
    </div>
	</div> 
	</div>
	
	</div> 
	
</div>





   
<script src="/admin/theme/cwadmin/header/js/jquery.js"></script>
<script src="/admin/theme/cwadmin/header/js/jquery.cookie.js"></script>
<script src="/admin/theme/cwadmin/header/js/jPushMenu.js"></script>
<script type="text/javascript" src="/admin/theme/cwadmin/header/js/jquery.nanoscroller.js"></script>
<script type="text/javascript" src="/admin/theme/cwadmin/header/js/jquery.sparkline.min.js"></script>
<script type="text/javascript" src="/admin/theme/cwadmin/header/js/jquery-ui.js" ></script>
<script type="text/javascript" src="/admin/theme/cwadmin/header/js/jquery.gritter.js"></script>
<script type="text/javascript" src="/admin/theme/cwadmin/header/js/core.js"></script>
<script type="text/javascript" src="/admin/theme/cwadmin/header/js/wysihtml5-0.3.0.js"></script>
<script type="text/javascript" src="/admin/theme/cwadmin/header/js/bootstrap3-wysihtml5.all.min.js"></script>
<script src="/admin/theme/cwadmin/header/js/select2.min.js" type="text/javascript"></script>


<script type="text/javascript">
    $(document).ready(function(){
      //initialize the javascript
      
      $('#some-textarea').wysihtml5({"stylesheets": ["http://condorthemes.com/flatdreamjs/bootstrap.wysihtml5/styles/email-editor.css"]});
      $(".tags").select2({tags: 0,width: '100%'});
    });
</script>
  
  
