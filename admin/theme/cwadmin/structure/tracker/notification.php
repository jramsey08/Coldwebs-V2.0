<div class="cl-mcont">
    <div class="page-head">
        <ol class="breadcrumb">
            <li><a href="/admin">Dashboard</a></li>
            <li><a href="/admin/Tracker">Tracker</a></li>
            <li class="active">Notifications</li>
        </ol>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="block-flat">
                <div class="header">
                    <h3>User Actions</h3>
                </div>
                <br>


<form name='editarticle' id='edittable' method='post'><br>
<?php if($UserSiteAccess['notification'] == "1"){ ?>
    <center>
        <button type='submit' formaction="/Process/EditAlert/Delete" style="background-color: red; color: white;" class="btn btn-trans"><i class="fa "></i> Delete </button>
    </center>
<?php } ?>
<div class="content">
<div class="table-responsive">
<table class="table table-bordered" id="datatable">
<thead>
<tr>
<th></th>
<th>Post Name</th>
<th>Message</th></th>
<th>Post Type</th>
<th>User</th>
<th>Status</th>
<th>Settings</th>
</tr>
</thead>

<tbody>
<?php
if($UserSiteAccess['notification'] == "1"){
    if($UserSiteAccess['cross_domain'] == "1"){
        $Query = "SELECT * FROM cw_alerts WHERE trash='0' ORDER BY date DESC";
    }else{
        $Query = "SELECT * FROM cw_alerts WHERE trash='0' AND webid='$WebId' ORDER BY date DESC";
    }
}else{
    $Query = "SELECT * FROM cw_alerts WHERE trash='0' AND webid='$WebId' AND user='$Current_Admin' ORDER BY date DESC";
}
$Result = mysqli_query($CwDb,$Query);
while($Row = mysqli_fetch_assoc($Result)){
    $Row = CwOrganize($Row,$Array);
    $Row = Cw_Alerts($Row);
    $ArticleCat = $Row['category'];
    $ArticleId = $Row['id'];
    $ArticleId = OtarEncrypt($key,$ArticleId);
    $query = "SELECT * FROM users WHERE id='$Row[user]' AND webid='$WebId'"; 
    $result = mysqli_query($CwDb,$query);
    $row = mysqli_fetch_assoc($result);
    $row = CwOrganize($row,$Array);
    $qUery = "SELECT * FROM info WHERE id='$Row[webid]'"; 
    $rEsult = mysqli_query($CwDb,$qUery);
    $Domain = mysqli_fetch_assoc($rEsult);
    $Domain = CwOrganize($Domain,$Array);
?>
<tr class="odd gradeX">
    <td><input type="checkbox" name="edit[]" value="<?php echo $Row['id']; ?>"></td>
    <td><?php echo $Row['name']; ?></td>
    <td><?php echo $Row['other']['message']; ?></td>
    <td><?php echo $Row['type']; ?></td>
    <td><?php echo $Row['user']; ?></td>
    <td><?php echo $Domain["name"]; ?></td>
    <td class="center"><a href="/admin/Tracker/Notification/<?php echo $ArticleId; ?>">View Action</a></td>
</tr>
<?php } ?>									
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
<input type='hidden' name='redirect' value='<?php echo "http://$Website_Url_Auth"; ?>/admin/Tracker/Notification'>
</form>



<script type="text/javascript" src="/admin/theme/cwadmin/header/js/jquery-ui.js"></script>
<script type="text/javascript" src="/admin/theme/cwadmin/header/js/jquery.jeditable/jquery.jeditable.mini.js"></script>
<script type="text/javascript" src="/admin/theme/cwadmin/header/js/datatables.min.js" ?>"></script>
<script type="text/javascript" src="/admin/theme/cwadmin/header/js/datatables.js"></script>

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