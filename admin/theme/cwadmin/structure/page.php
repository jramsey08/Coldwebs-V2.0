<div class="cl-mcont">
<div class="page-head">
<ol class="breadcrumb">
<li><a href="/admin">Dashboard</a></li>
<li class="active">Website Pages</li>
</ol></div>

<div class="row">
<div class="col-md-12">
<div class="block-flat">
<div class="header">							
<h3>Website Pages
<div align="right">
<button type="button" onclick="window.location.href='./<?php echo $_GET['url']; ?>/New'" class="btn btn-flat"><i class="fa fa-check"></i> Create New</button>
</div>
</h3>			
</div>


<form name='editpage' id='editpage' method='post'><br>
<center>
<button type='submit' formaction="/Process/EditPage/Delete" style="background-color: red; color: white;" class="btn btn-trans"><i class="fa "></i> Delete </button>
<button type='submit' formaction="/Process/EditPage/Active" style="background-color: green; color: white;" class="btn btn-trans"><i class="fa "></i> Activate </button>
<button type='submit' formaction="/Process/EditPage/Inactive" style="background-color: grey; color: white;" class="btn btn-trans"><i class="fa "></i> In-Active </button>
</center>


<div class="content">
<div class="table-responsive">
<table class="table table-bordered" id="datatable" >
<thead>
<tr>
<th></th>
<th>Name</th>
<th>Status</th>
<th>Template</th>
<th>Settings</th>
</tr>
</thead>

<tbody>
<?php
$Query = "SELECT * FROM page_template WHERE trash='0'"; 
$Result = mysql_query($Query) or die(mysql_error());
while($Row = mysql_fetch_array($Result)){ 
$ArticleId = OtarEncrypt($key,$Row['id']);
$Row = PbUnSerial($Row);
$query = "SELECT * FROM page_settings WHERE article='$ArticleId'"; 
$result = mysql_query($query) or die(mysql_error());
$row = mysql_fetch_array($result);
$row = PbUnSerial($row);
$qUery = "SELECT * FROM page_structure WHERE url='$Row[url]' AND urltype='$Row[urltype]' AND end='$Row[end]' AND urlid='$Row[urlid]' AND template='$Row[template]'"; 
$rEsult = mysql_query($qUery) or die(mysql_error());
$rOw = mysql_fetch_array($rEsult);
$rOw = PbUnSerial($rOw);
$qUerY = "SELECT * FROM articles WHERE id='$Row[article]'";
$rEsulT = mysql_query($qUerY) or die(mysql_error());
$rOW = mysql_fetch_array($rEsulT);
$rOW = PbUnSerial($rOW);
$ArticleName = $rOW['content']['name'];
if($ArticleName == ""){ $ArticleName = $rOw['name']; }
if($ArticleName == ""){ $ArticleName = $Row['name']; }
if($row['admin'] == "1"){ }else{ ?>
<tr class="odd gradeX">
<td><input type="checkbox" name="edit[]" value="<?php echo $Row['id']; ?>"></td>
<td><?php echo $ArticleName; ?></td>
<td><?php  if($Row['active'] == "0"){ echo "In-Active"; }else{ echo "Active"; } ?></td>
<td><?php echo $Row['template']; ?></td>
<td class="center">
<div class="btn-group">
<button class="btn btn-default btn-xs" type="button">Actions</button>
<button data-toggle="dropdown" class="btn btn-xs btn-primary dropdown-toggle" type="button"><span class="caret"></span><span class="sr-only">Toggle Dropdown</span></button>
<ul role="menu" class="dropdown-menu">
<li><a href="/admin/Pages/<?php echo $ArticleId; ?>">Edit</a></li>
<li><a href="#">Copy</a></li>
<li><a href="#">Details</a></li>
<li class="divider"></li>
<li><a href="/Process/Delete/Pages/<?php echo $ArticleId; ?>">Remove</a></li>
</ul></div></td>
</tr>
<?php }} ?>									
</tbody>
</table>							
</div>
</div>
</div>				
</div>
</div>
				      					

      	</div>
	
	</div> 
	
</div>
<input type='hidden' name='redirect' value='<?php echo $Array["siteinfo"]["domain"]; ?>/admin/Pages'>
</form>



<script type="text/javascript" src="http://condorthemes.com/flatdream/js/jquery.jeditable/jquery.jeditable.mini.js"></script>
<script type="text/javascript" src="http://condorthemes.com/flatdream/js/jquery.datatables/jquery.datatables.min.js"></script>
<script type="text/javascript" src="http://condorthemes.com/flatdream/js/jquery.datatables/bootstrap-adapter/js/datatables.js"></script>
<script type="text/javascript">
      //Add dataTable Functions
      var functions = $('<div class="btn-group">
      <button class="btn btn-default btn-xs" type="button">Actions</button>
      <button data-toggle="dropdown" class="btn btn-xs btn-primary dropdown-toggle" type="button"><span class="caret"></span><span class="sr-only">Toggle Dropdown</span></button>
      <ul role="menu" class="dropdown-menu">
      <li><a href="#">Edit</a></li>
      <li><a href="#">Copy</a></li>
      <li><a href="#">Details</a></li>
      <li class="divider"></li>
      <li><a href="#">Remove</a></li>
      </ul></div>');
      $("#datatable tbody tr td:last-child").each(function(){
        $(this).html("");
        functions.clone().appendTo(this);
      });
    
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
        nCloneTd.innerHTML = '<img class="toggle-details" src="http://condorthemes.com/flatdream/images/plus.png" />';
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
                this.src = "http://condorthemes.com/flatdream/images/plus.png";
                oTable.fnClose( nTr );
            }
            else
            {
                /* Open this row */
                this.src = "images/minus.png";
                oTable.fnOpen( nTr, fnFormatDetails(oTable, nTr), 'details' );
            }
        } );
        
      $('.dataTables_filter input').addClass('form-control').attr('placeholder','Search');
      $('.dataTables_length select').addClass('form-control');    
      /* Init DataTables */
      var oTable = $('#datatable3').dataTable();
       
      /* Apply the jEditable handlers to the table */
      oTable.$('td').editable( 'http://condorthemes.com/flatdream/js/jquery.datatables/examples/examples_support/editable_ajax.php', {
          "callback": function( sValue, y ) {
              var aPos = oTable.fnGetPosition( this );
              oTable.fnUpdate( sValue, aPos[0], aPos[1] );
          },
          "submitdata": function ( value, settings ) {
              return {
                  "row_id": this.parentNode.getAttribute('id'),
                  "column": oTable.fnGetPosition( this )[2]
              };
          },
          "height": "14px",
      });
    });
</script>