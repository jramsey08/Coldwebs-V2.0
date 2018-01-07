
  
    
	<div class="cl-mcont">		<div class="page-head">
			<ol class="breadcrumb">
			  <li><a href="#">Home</a></li>
			  <li><a href="#">Forms</a></li>
			  <li class="active">Wizard</li>
			</ol>
		</div>		

    
    <div class="row wizard-row">
      <div class="col-md-12 fuelux">
        <div class="block-wizard">
          <div id="wizard1" class="wizard wizard-ux">
            <ul class="steps">
              <li data-target="#step1" class="active">Step 1<span class="chevron"></span></li>
              <li data-target="#step2">Step 2<span class="chevron"></span></li>
              <li data-target="#step3">Step 3<span class="chevron"></span></li>
            </ul>
            <div class="actions">
              <button type="button" class="btn btn-xs btn-prev btn-primary"> <i class="icon-arrow-left"></i>Prev</button>
              <button type="button" class="btn btn-xs btn-next btn-primary" data-last="Finish">Next<i class="icon-arrow-right"></i></button>
            </div>
          </div>
          <div class="step-content">
            <form class="form-horizontal group-border-dashed" action="#" data-parsley-namespace="data-parsley-" data-parsley-validate novalidate> 
              <div class="step-pane active" id="step1">
                <div class="form-group no-padding">
                  <div class="col-sm-7">
                    <h3 class="hthin">Post Creator</h3>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-3 control-label">User Name</label>
                  <div class="col-sm-6">
                    <input type="text" class="form-control" placeholder="User name">
                  </div>
                </div>	
                <div class="form-group">
                  <label class="col-sm-3 control-label">E-Mail</label>
                  <div class="col-sm-6">
                    <input type="text" class="form-control" placeholder="User E-Mail">
                  </div>
                </div>	
                <div class="form-group">
                  <label class="col-sm-3 control-label">Password</label>
                  <div class="col-sm-6">
                    <input type="password" class="form-control" placeholder="Enter your password">
                  </div>
                </div>		
                <div class="form-group">
                  <label class="col-sm-3 control-label">Verify Password</label>
                  <div class="col-sm-6">
                    <input type="password" class="form-control" placeholder="Enter your password again">
                  </div>
                </div>	
                <div class="form-group">
                  <div class="col-sm-offset-2 col-sm-10">
                    <button class="btn btn-default">Cancel</button>
                    <button data-wizard="#wizard1" class="btn btn-primary wizard-next">Next Step <i class="fa fa-caret-right"></i></button>
                  </div>
                </div>									
              </div>
              <div class="step-pane" id="step2">
                <div class="form-group no-padding">
                  <div class="col-sm-7">
                    <h3 class="hthin">Notifications</h3>
                  </div>
                </div>
                <div class="form-group">
                  <div class="col-sm-7">
                    <label class="control-label">E-Mail Notifications</label>
                    <p>This option allow you to recieve email notifications by us.</p>
                  </div>
                  <div class="col-sm-3">
                    <input class="switch" data-size="small" type="checkbox" checked>	
                  </div>
                </div>	
                <div class="form-group">
                  <div class="col-sm-7">
                    <label class="control-label">Phone Notifications</label>
                    <p>Allow us to send phone notifications to your cell phone.</p>
                  </div>
                  <div class="col-sm-3">
                    <input class="switch" data-size="small" type="checkbox" checked>
                  </div>
                </div>	
                <div class="form-group">
                  <div class="col-sm-7">
                    <label class="control-label">Global Notifications</label>
                    <p>Allow us to send notifications to your dashboard.</p>
                  </div>
                  <div class="col-sm-3">
                   <input class="switch" data-size="small" type="checkbox" checked>
                  </div>
                </div>	
                <div class="form-group">
                  <div class="col-sm-12">
                    <button data-wizard="#wizard1" class="btn btn-default wizard-previous"><i class="fa fa-caret-left"></i> Previous</button>
                    <button data-wizard="#wizard1" class="btn btn-primary wizard-next">Next Step <i class="fa fa-caret-right"></i></button>
                  </div>
                </div>	
              </div>
              <div class="step-pane" id="step3">
                <div class="form-group no-padding">
                  <div class="col-sm-7">
                    <h3 class="hthin">Configuration</h3>
                  </div>
                </div>
                <div class="form-group">
                  <div class="col-sm-6">
                    <label class="control-label">Buy Credits: <span id="credits">$0</span></label>
                    <p>This option allow you to buy an amount of credits.</p>
                    
                    <input id="credit_slider" type="text" class="bslider form-control" value="0" />
                  </div>
                  <div class="col-sm-6">
                    <label class="control-label">Change Plan</label>
                    <p>Change your plan many times as you want.</p>
                    <select class="select2">
                       <optgroup label="Personal">
                         <option value="p1">Basic</option>
                         <option value="p2">Medium</option>
                       </optgroup>
                       <optgroup label="Company">
                         <option value="p3">Standard</option>
                         <option value="p4">Silver</option>
                         <option value="p5">Gold</option>
                       </optgroup>
                    </select>
                  </div>
                </div>
                <div class="form-group">
                  <div class="col-sm-6">
                    <label class="control-label">Payment Rate: <span id="rate">0%</span></label>
                    <p>Choose your payment rate to calculate how much money you will recieve.</p>
                    
                    <input id="rate_slider"  data-slider-min="0" data-slider-max="100" type="text" class="bslider form-control" value="0" />
                  </div>
                  <div class="col-sm-6">
                    <label class="control-label">Keywords</label>
                    <p>Write your keywords to do a successful CEO with web search engines.</p>
                    <input class="tags" type="hidden" value="brown,blue,green" />
                  </div>
                </div>
                <div class="form-group">
                  <div class="col-sm-12">
                    <button data-wizard="#wizard1" class="btn btn-default wizard-previous"><i class="fa fa-caret-left"></i> Previous</button>
                    <button data-wizard="#wizard1" class="btn btn-success wizard-next"><i class="fa fa-check"></i> Complete</button>
                  </div>
                </div>	
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
    
	</div>
	
	</div> 
	
</div>
<!-- Right Chat-->
<nav class="cbp-spmenu cbp-spmenu-vertical cbp-spmenu-right side-chat">
	<div class="header">
    <h3>Chat</h3>
  </div>
  <div class="sub-header">
    <div class="icon"><i class="fa fa-user"></i></div> <p>Online (4)</p>
  </div>
  <div class="content">
    <p class="title">Family</p>
    <ul class="nav nav-pills nav-stacked contacts">
      <li class="online"><a href="#"><i class="fa fa-circle-o"></i> Michael Smith</a></li>
      <li class="online"><a href="#"><i class="fa fa-circle-o"></i> John Doe</a></li>
      <li class="online"><a href="#"><i class="fa fa-circle-o"></i> Richard Avedon</a></li>
      <li class="busy"><a href="#"><i class="fa fa-circle-o"></i> Allen Collins</a></li>
    </ul>
    
    <p class="title">Friends</p>
    <ul class="nav nav-pills nav-stacked contacts">
      <li class="online"><a href="#"><i class="fa fa-circle-o"></i> Jaime Garzon</a></li>
      <li class="outside"><a href="#"><i class="fa fa-circle-o"></i> Dave Grohl</a></li>
      <li><a href="#"><i class="fa fa-circle-o"></i> Victor Jara</a></li>
    </ul>   
    
    <p class="title">Work</p>
    <ul class="nav nav-pills nav-stacked contacts">
      <li><a href="#"><i class="fa fa-circle-o"></i> Ansel Adams</a></li>
      <li><a href="#"><i class="fa fa-circle-o"></i> Gustavo Cerati</a></li>
    </ul>
    
  </div>
  <div id="chat-box">
    <div class="header">
      <span>Richard Avedon</span>
      <a class="close"><i class="fa fa-times"></i></a>
    </div>
    <div class="messages nano nscroller">
      <div class="content">
        <ul class="conversation">
          <li class="odd">
            <p>Hi Jane, how are you?</p>
          </li>
          <li class="text-right">
            <p>Hello I was looking for you</p>
          </li>
          <li class="odd">
            <p>Tell me what you need?</p>
          </li>
          <li class="text-right">
            <p>Sorry, I'm late... see you</p>
          </li>
          <li class="odd unread">
            <p>OK, call me later...</p>
          </li>
        </ul>
      </div>
    </div>
    <div class="chat-input">
      <div class="input-group">
        <input type="text" class="form-control" placeholder="Enter a message...">
        <span class="input-group-btn">
        <button type="button" class="btn btn-primary">Send</button>
        </span>
      </div>
    </div>
  </div>
</nav>
  
	<script src="/admin/theme/cwadmin/header/js/jquery.js"></script>
	<script src="/admin/theme/cwadmin/header/js/jquery.cookie.js"></script>
  <script src="/admin/theme/cwadmin/header/js/jPushMenu.js"></script>
	<script type="text/javascript" src="/admin/theme/cwadmin/header/js/jquery.nanoscroller.js"></script>
	<script type="text/javascript" src="/admin/theme/cwadmin/header/js/jquery.sparkline.min.js"></script>
  <script type="text/javascript" src="/admin/theme/cwadmin/header/js/jquery-ui.js" ></script>
	<script type="text/javascript" src="/admin/theme/cwadmin/header/js/jquery.gritter.js"></script>
	<script type="text/javascript" src="/admin/theme/cwadmin/header/js/core.js"></script>

<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
  <script src="/admin/theme/cwadmin/header/js/bootstrap.min.js"></script>
      <style type="text/css">
    #color-switcher{
      position:fixed;
      background:#272930;
      padding:10px;
      top:50%;
      right:0;
      margin-right:-109px;
    }
    
    #color-switcher .toggle{
      cursor:pointer;
      font-size:15px;
      color: #FFF;
      display:block;
      position:absolute;
      padding:4px 10px;
      background:#272930;
      width:25px;
      height:30px;
      left:-24px;
      top:22px;
    }
    
    #color-switcher p{color: rgba(255, 255, 255, 0.6);font-size:12px;margin-bottom:3px;}
    #color-switcher .palette{padding:1px;}
    #color-switcher .color{width:15px;height:15px;display:inline-block;cursor:pointer;}
    #color-switcher .color.purple{background:#7761A7;}
    #color-switcher .color.green{background:#19B698;}
    #color-switcher .color.red{background:#EA6153;}
    #color-switcher .color.blue{background:#54ADE9;}
    #color-switcher .color.orange{background:#FB7849;}
    #color-switcher .color.prusia{background:#476077;}
    #color-switcher .color.yellow{background:#fec35d;}
    #color-switcher .color.pink{background:#ea6c9c;}
    #color-switcher .color.brown{background:#9d6835;}
    #color-switcher .color.gray{background:#afb5b8;}
 </style>


  <script type="text/javascript">
    var link = $('link[href="css/style.css"]');
    
    if($.cookie("css")) {
      link.attr("href",'css/style-' + $.cookie("css") + '.css');
    }
    
    $(function(){
      $("#color-switcher .toggle").click(function(){
        var s = $(this).parent();
        if(s.hasClass("open")){
          s.animate({'margin-right':'-109px'},400).toggleClass("open");
        }else{
          s.animate({'margin-right':'0'},400).toggleClass("open");
        }
      });
      
      $("#color-switcher .color").click(function(){
        var color = $(this).data("color");
        $("body").fadeOut(function(){
          //link.attr('href','css/style-' + color + '.css');
          $.cookie("css", color, {expires: 365, path: '/'});
          window.location.href = "";
          $(this).fadeIn("slow");
        });
      });
    });
  </script> 
<script type="text/javascript" src="/admin/theme/cwadmin/header/js/bootstrap-switch.js"></script>
<script type="text/javascript" src="/admin/theme/cwadmin/header/js/select2.min.js" ></script>
<script type="text/javascript" src="/admin/theme/cwadmin/header/js/bootstrap-slider.js" ></script>
<script type="text/javascript" src="/admin/theme/cwadmin/header/jsloader.min.js"></script>	
<script src="/admin/theme/cwadmin/header/js/modernizr.js" type="text/javascript"></script>
<script type="text/javascript">
  $("#credit_slider").slider().on("slide",function(e){
    $("#credits").html("$" + e.value);
  });
  $("#rate_slider").slider().on("slide",function(e){
    $("#rate").html(e.value + "%");
  });
  </script>
<script type="text/javascript">
$(document).ready(function(){
      //initialize the javascript

    
    //Fuel UX
    $('.wizard-ux').wizard();
    
    $('.dropdown-toggle').dropdown();

    $('.wizard-ux').on('changed',function(){
      //delete $.fn.slider;
      $('.bslider').slider();
    });
    
    $(".wizard-next").click(function(e){
      var id = $(this).data("wizard");
      $(id).wizard('next');
      e.preventDefault();
    });
    
    $(".wizard-previous").click(function(e){
      var id = $(this).data("wizard");
      $(id).wizard('previous');
      e.preventDefault();
    });
    
      /*Switch*/
      $('.switch').bootstrapSwitch();
      /*Slider*/
      $('.bslider').slider();     
      /*Select2*/
        $(".select2").select2({
          width: '100%'
        });
       /*Tags*/
        $(".tags").select2({tags: 0,width: '100%'});

});
</script>
  
  
<script type="text/javascript" src="/admin/theme/cwadmin/header/js/jquery.flot.js"></script>
<script type="text/javascript" src="/admin/theme/cwadmin/header/js/jquery.flot.pie.js"></script>
<script type="text/javascript" src="/admin/theme/cwadmin/header/js/jquery.flot.resize.js"></script>
<script type="text/javascript" src="/admin/theme/cwadmin/header/js/jquery.flot.labels.js"></script>
</body>
</html>
