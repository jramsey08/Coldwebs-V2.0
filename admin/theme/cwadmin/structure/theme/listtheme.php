<?php
$ThemeId = OtarDecrypt($key,$_GET[type]);
include("../theme/$ThemeId[0]/settings.php");
?>
<div class="cl-mcont aside">	
<div class="page-aside">
<div>
<div class="content">
<h2><?php echo $ThemeId['1']; ?></h2>
<br><br><br>
<?php include("theme/cwadmin/extras/themesidebar.php"); ?>
</div></div></div>





	  
    
<div class="content">
<div class="cl-mcont">
<div class="page-head">
<ol class="breadcrumb">
<li><a href="/admin">Dashboard</a></li>
<li><a href="/admin/Design">Themes</a></li>
<li class="active"><?php echo $ThemeId[1]; ?></li>
</ol></div>




<div class="row">
<div class="col-md-6">
<div class="block-flat">
<div class="header">							
<h3>Theme Widgets</h3>
</div>
<div class="content">
<div class="table-responsive">
<table class="table table-bordered" id="datatable" >
<thead>
<tr>
<th>Name</th>
<th>Status</th>
<th>Shortcode</th>
<th>Settings  -- > <a href="/admin/Design/<?php echo $_GET['type']; ?>/Functions/New">Create New</a></th>
</tr>


</thead>
<tbody>
<?php
$Query = "SELECT * FROM articles WHERE category='$ThemeId[2]' AND type='function' AND trash='0' AND webid='$WebId'"; 
$Result = mysqli_query($CwDb,$Query);
while($Row = mysqli_fetch_assoc($Result)){
    $Row = CwOrganize($Row,$Array);
    $QuerY = "SELECT * FROM page_function WHERE article='$Row[id]' AND webid='$WebId'"; 
    $ResulT = mysqli_query($CwDb,$QuerY);
    $RoW = mysqli_fetch_assoc($ResulT);
    $Shortcode = $RoW['shortcode'];
    $ArticleCat = $Row['category'];
    $artFunId = $Row['id'];
    $artFunId = OtarEncrypt($key,$artFunId);
    $query = "SELECT * FROM articles WHERE id='$ArticleCat' AND active='1' AND trash='0' AND webid='$WebId'";
    $result = mysqli_query($CwDb,$query);
    $row = mysqli_fetch_assoc($result);
    $row = CwOrganize($row,$Array); 
?>
<tr class="odd gradeX">
<td><?php echo $Row['content']['name']; ?></td>
<td><?php if($Row['active'] == "1"){ echo "Active"; }else{ echo "In-Active"; } ?></td>
<td><?php if($Shortcode == ""){ }else{ echo "{{shortcode id=$Shortcode}"; }?></td>
<td class="center">
<div class="btn-group">
<button class="btn btn-default btn-xs" type="button">Actions</button>
<button data-toggle="dropdown" class="btn btn-xs btn-primary dropdown-toggle" type="button"><span class="caret"></span><span class="sr-only">Toggle Dropdown</span></button>
<ul role="menu" class="dropdown-menu">
<li><a href="/admin/Design/<?php echo $_GET['type']; echo "/Functions/"; echo $artFunId; ?>">Edit</a></li>
<li><a href="/Process/Copy/Function/<?php echo $artFunId; ?>">Copy</a></li>
<li class="divider"></li>
<li><a href="/Process/Delete/function/<?php echo $artFunId; ?>">Remove</a></li>
</ul></div></td>
</tr><?php } ?></tbody>
</table></div></div>
</div></div></div>
				      					

</div></div></div>











</div></div></div> </div>











<script type="text/javascript" src="/admin/theme/cwadmin/header/js/jquery-ui.js"></script>
<script type="text/javascript" src="/admin/theme/cwadmin/header/js/jquery.jeditable.mini.js"></script>
<script type="text/javascript" src="/admin/theme/cwadmin/header/js/jquery.datatables.min.js"></script>
<script type="text/javascript" src="/admin/theme/cwadmin/header/js/js/datatables.js"></script>


<script type="text/javascript">
      //Add dataTable Functions
    
    $(document).ready(function(){
      //initialize the javascript
      //Basic Instance
      $("#datatable").dataTable();
      
      //Search input style
      $('.dataTables_filter input').addClass('form-control').attr('placeholder','Search');
      $('.dataTables_length select').addClass('form-control');    
          
       /* Formating function for row details */
        function fnFormatDetails ( oTable, nTr )
        {
            var aData = oTable.fnGetData( nTr );
            var sOut = '<table cellpadding="5" cellspacing="0" border="0" style="padding-left:50px;">';
            sOut += '<tr><td>Rendering engine:</td><td>'+aData[1]+' '+aData[4]+'</td></tr>';
            sOut += '<tr><td>Link to source:</td><td>Could provide a link here</td></tr>';
            sOut += '<tr><td>Extra info:</td><td>And any further details here (images etc)</td></tr>';
            sOut += '</table>';
             
            return sOut;
        }
       
        /*
         * Insert a 'details' column to the table
         */
        var nCloneTh = document.createElement( 'th' );
        var nCloneTd = document.createElement( 'td' );
        nCloneTd.innerHTML = '<img class="toggle-details" src="images/plus.png" />';
        nCloneTd.className = "center";
         
        $('#datatable2 thead tr').each( function () {
            this.insertBefore( nCloneTh, this.childNodes[0] );
        } );
         
        $('#datatable2 tbody tr').each( function () {
            this.insertBefore(  nCloneTd.cloneNode( true ), this.childNodes[0] );
        } );
         
        /*
         * Initialse DataTables, with no sorting on the 'details' column
         */
        var oTable = $('#datatable2').dataTable( {
            "aoColumnDefs": [
                { "bSortable": false, "aTargets": [ 0 ] }
            ],
            "aaSorting": [[1, 'asc']]
        });
         
        /* Add event listener for opening and closing details
         * Note that the indicator for showing which row is open is not controlled by DataTables,
         * rather it is done here
         */
        $('#datatable2').delegate('tbody td img','click', function () {
            var nTr = $(this).parents('tr')[0];
            if ( oTable.fnIsOpen(nTr) )
            {
                /* This row is already open - close it */
                this.src = "images/plus.png";
                oTable.fnClose( nTr );
            }
            else
            {
                /* Open this row */
                this.src = "images/minus.png";
                oTable.fnOpen( nTr, fnFormatDetails(oTable, nTr), 'details' );
            }
        });
        
      $('.dataTables_filter input').addClass('form-control').attr('placeholder','Search');
      $('.dataTables_length select').addClass('form-control');   
      
      /* Init DataTables */
      var aTable = $('#datatable3').dataTable();
       
      /* Apply the jEditable handlers to the table */
      aTable.$('td').editable( 'js/jquery.datatables/examples/examples_support/editable_ajax.php', {
          "callback": function( sValue, y ) {
              var aPos = aTable.fnGetPosition( this );
              aTable.fnUpdate( sValue, aPos[0], aPos[1] );
          },
          "submitdata": function ( value, settings ) {
              return {
                  "row_id": this.parentNode.getAttribute('id'),
                  "column": aTable.fnGetPosition( this )[2]
              };
          },
          "height": "14px",
      });
    });
</script>