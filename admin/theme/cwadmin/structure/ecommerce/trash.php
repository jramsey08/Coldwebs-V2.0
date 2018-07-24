<?php include("$THEME/structure/ecommerce/top_header.php"); ?>
    <form name='editarticle' id='edittable' method='post'>
        <div class="cl-mcont">
            <div class="page-head">
                <ol class="breadcrumb">
                    <li><a href="/admin">Dashboard</a></li>
                    <li><a href="/admin/Ecommerce">Ecommerce</a></li>
                    <li><a href="/admin/Ecommerce-Products">Products</a></li>
                    <li class="active">Trash</li>
                </ol>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="block-flat">
                        <div class="header">							
                            <h3>
                                E-Commerce Trash Can
                                <div align="right">
                                    <button type="button" style="background-color:#0969f7;color:white;" onclick="window.location.href='./<?php echo $_GET['url']; ?>/New'" class="btn btn-flat"><i class="fa fa-check"></i> Create New</button>
                                    <button type="button" style="background-color:#0969f7;color:white;" onclick="window.location.href='./Ecommerce-Import'" class="btn btn-flat"><i class="fa fa-upload"></i> Import</button>
                                    <button type="button" style="background-color:#0969f7;color:white;" onclick="window.location.href='./Ecommerce-Products'" class="btn btn-flat"><i class="fa fa-check-square-o"></i> Active</button>
                                    <button type="button" style="background-color:#0969f7;color:white;" onclick="window.location.href='./Ecommerce-Pending'" class="btn btn-flat"><i class="fa fa-pause"></i> Pending</button>
                                </div>
                            </h3>			
                        </div>
                        <br>
                        <center>
                            <button type='submit' formaction="/Process/DeleteArticle/Delete" style="background-color: red; color: white;" class="btn btn-trans"><i class="fa "></i> Delete </button>
                            <button type='submit' formaction="/Process/DeleteArticle/Restore" style="background-color: green; color: white;" class="btn btn-trans"><i class="fa "></i> Restore </button>
                        </center>
                        <div class="content">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="datatable" >
                                    <thead>
                                        <tr>
                                            <th></th>
                                            <th>Name</th>
                                            <th>Page Views</th>
                                            <th>Price</th>
                                            <th>Status</th>
                                            <th>Settings</th>
                                        </tr>
                                    </thead>
                                    <tbody>
<?php
$Query = "SELECT * FROM articles WHERE type='post-product' AND trash='1' AND webid='$WebId' ORDER BY date_created DESC"; 
$Result = mysqli_query($CwDb,$Query);
while($Row = mysqli_fetch_assoc($Result)){
    $Row = CwOrganize($Row,$Array);
    $ArticleCat = $Row['content']['category'];
    $ArticleId = $Row['id'];
    $ArticleId = OtarEncrypt($key,$ArticleId);
    $query = "SELECT * FROM articles WHERE id='$ArticleCat' AND webid='$WebId'"; 
    $result = mysqli_query($CwDb,$query);
    $row = mysqli_fetch_assoc($result);
    $row = CwOrganize($row,$Array);
?>
                                        <tr class="odd gradeX">
                                            <td><input type="checkbox" name="edit[]" value="<?php echo $Row['id']; ?>"></td>
                                            <td><?php echo $Row['name']; ?></td>
                                            <td><?php echo $Row['hits']; ?></td>
                                            <td><?php if(is_double($Row['content']['prodprice'])){ echo number_format($Row['content']['prodprice']); } ?></td>
                                            <td><?php echo StatusName($Row['active']); ?></td>
                                            <td class="center"> 
                                                <div class="btn-group">
                                                    <button class="btn btn-default btn-xs" type="button">Actions</button>
                                                    <button data-toggle="dropdown" class="btn btn-xs btn-primary dropdown-toggle" type="button">
                                                        <span class="caret"></span>
                                                        <span class="sr-only">Toggle Dropdown</span>
                                                    </button>
                                                    <ul role="menu" class="dropdown-menu">
                                                        <li><a href="/admin/Ecommerce-Products/<?php echo $ArticleId; ?>">Edit</a></li>
                                                        <li class="divider"></li>
                                                        <li><a href="/Process/Delete/Product/<?php echo $ArticleId; ?>">Remove</a></li>
                                                    </ul>
                                                </div>
                                            </td>
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
<input type='hidden' name='redirect' value='<?php echo "http://$Website_Url_Auth"; ?>/admin/ECommerce-Trash'>
</form>
<script type="text/javascript" src="<?php echo "$THEME/header/js/datatables.min.js" ?>"></script>
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