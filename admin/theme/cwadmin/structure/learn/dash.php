        <div class="cl-mcont aside">		
<?php include("menu.php"); ?>
            <div class="content">
                
                
                
            <div class="col-sm-12 col-md-12">
					
					<div class="block-flat">
						<div class="header">
							<h3>Welcome to the CW Learning Center</h3>
						</div>
						
						<div class="page-head">
			                <ol class="breadcrumb">
                			  <li><a href="/">Home</a></li>
                			  <li class="active">Learning Center</li>
                			</ol>
                		</div>		
						
						
						<div class="content">
							<p class="spacer">
								Welcome to the ColdWebs Learning Center. This page will guide you on how to successfully manage and operate your website. 
								Use the links to your left to learn eash section of this website. Each page will be equiped with either text, pictures and or 
								video instructions on how to operate and manage that specific page.
							</p>
							<p>
							    You may see some sections that you do not have access to. If you think you should have access to a particular page or section please
							    email your webmaster in order to gain access.
							</p>
						</div>
					</div>
					
					
				</div>    
                
                
                
                
                
                
            </div>
        </div>


    </div> 
</div>
<!-- Right Chat-->

<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="js/bootstrap/dist/js/bootstrap.min.js"></script>
<script type="text/javascript">
    $(document).ready(function(){
      $('label.tree-toggler').click(function () {
        var icon = $(this).children(".fa");
          if(icon.hasClass("fa-folder-o")){
            icon.removeClass("fa-folder-o").addClass("fa-folder-open-o");
          }else{
            icon.removeClass("fa-folder-open-o").addClass("fa-folder-o");
          }        
        $(this).parent().children('ul.tree').toggle(300,function(){
          $(this).parent().toggleClass("open");
          $(".tree .nscroller").nanoScroller({ preventPageScrolling: true });
        });
        
      });
    });
</script>
  