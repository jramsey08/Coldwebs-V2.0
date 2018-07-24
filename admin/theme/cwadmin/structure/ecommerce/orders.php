<?php include("$THEME/structure/ecommerce/top_header.php"); ?>
        <form name='editarticle' id='edittable' method='post'>
            <div class="cl-mcont">
                <div class="page-head">
                    <ol class="breadcrumb">
                        <li><a href="/admin">Dashboard</a></li>
                        <li><a href="/admin/Ecommerce">Ecommerce</a></li>
                        <li class="active">Orders</li>
                    </ol>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="block-flat">
                            <div class="header">							
                                <h3>Orders</h3>			
                            </div>
                            <br>
                            <center>
                                <button type='submit' formaction="/Process/EditTrans/cancel" style="background-color: red; color: white;" class="btn btn-trans"><i class="fa "></i> Cancel </button>
                                <button type='submit' formaction="/Process/EditTrans/paid" style="background-color: green; color: white;" class="btn btn-trans"><i class="fa "></i> Paid </button>
                                <button type='submit' formaction="/Process/EditTrans/process" style="background-color: grey; color: white;" class="btn btn-trans"><i class="fa "></i> Processing </button>
                                <button type='submit' formaction="/Process/EditTrans/shipped" style="background-color: blue; color: white;" class="btn btn-trans"><i class="fa "></i> Shipped </button>
                                <button type='submit' formaction="/Process/EditTrans/deliver" style="background-color: green; color: white;" class="btn btn-trans"><i class="fa "></i> Delivered </button>
                                <button type='submit' formaction="/Process/EditTrans/refund" style="background-color: red; color: white;" class="btn btn-trans"><i class="fa "></i> Refund </button>
                            </center>
                            <div class="content">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="datatable" >
                                        <thead>
                                            <tr>
                                                <th></th>
                                                <th>Customer</th>
                                                <th>Total</th>
                                                <th>Date</th>
                                                <th>Status</th>
                                                <th>Settings</th>
                                            </tr>
                                        </thead>
                                        <tbody>
<?php
$Count = "";
$Query = "SELECT * FROM trans WHERE trash='0' AND webid='$WebId'";
$Result = mysqli_query($CwDb,$Query);
while($Row = mysqli_fetch_assoc($Result)){
$Row = CwOrganize($Row,$Array);

$QuerY = "SELECT * FROM users WHERE id='$Row[user]' AND webid='$WebId'";
$ResulT = mysqli_query($CwDb,$QuerY);
$RoW = mysqli_fetch_assoc($ResulT);
$RoW = CwOrganize($RoW,$Array);

$ArticleCat = $Row['id'];
$ArticleId = $Row['id'];
$ArticleId = OtarEncrypt($key,$ArticleId);
if($Row['date'] == ""){
    $Row['date'] = strtotime("now");
}
if($RoW['name'] == ""){
    $RoW['name'] = "Unknown Customer";
}
?>
                                            <tr class="odd gradeX">
                                                <td><input type="checkbox" name="edit[]" value="<?php echo $Row['id']; ?>"></td>
                                                <td><?php echo $RoW['name']; ?></td>
                                                <td>$<?php echo number_format($Row['price']); ?></td>
                                                <td><?php echo date("M d, Y h:i A", $Row['date']); ?></td>
                                                <td><?php echo CwOrderStatus($Row['status']); ?></td>
                                                <td class="center">
                                                    <div class="btn-group">
                                                        <button class="btn btn-default btn-xs" type="button">Actions</button>
                                                        <button data-toggle="dropdown" class="btn btn-xs btn-primary dropdown-toggle" type="button"><span class="caret"></span><span class="sr-only">Toggle Dropdown</span></button>
                                                        <ul role="menu" class="dropdown-menu">
                                                            <li><a href="/admin/Ecommerce-Orders/<?php echo $ArticleId; ?>">Edit</a></li>
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
        </form>
    </div> 
</div>
<input type='hidden' name='redirect' value='<?php echo "http://$Website_Url_Auth"; ?>/admin/Ecommerce-Orders'>
</form>



<script type="text/javascript" src="/admin/theme/cwadmin/header/js/jquery.jeditable.mini.js"></script>
<script type="text/javascript" src="/admin/theme/cwadmin/header/js/jquery.datatables.min.js"></script>
<script type="text/javascript" src="/admin/theme/cwadmin/header/js/datatables.js"></script>
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


<script type="text/javascript" src="/admin/theme/cwadmin/header/js/masonry.js"></script>
<script type="text/javascript" src="/admin/theme/cwadmin/header/js/jquery.magnific-popup.min.js"></script>

<script type="text/javascript">
    $(document).ready(function(){
      
      //Initialize Mansory
      var $container = $('.gallery-cont');
      // initialize
      $container.masonry({
        columnWidth: 0,
        itemSelector: '.item'
      });
      
      //Resizes gallery items on sidebar collapse
      $("#sidebar-collapse").click(function(){
          $container.masonry();      
      });
      
      //MagnificPopup for images zoom
      $('.image-zoom').magnificPopup({ 
        type: 'image',
        mainClass: 'mfp-with-zoom', // this class is for CSS animation below
        zoom: {
        enabled: true, // By default it's false, so don't forget to enable it

        duration: 300, // duration of the effect, in milliseconds
        easing: 'ease-in-out', // CSS transition easing function 

        // The "opener" function should return the element from which popup will be zoomed in
        // and to which popup will be scaled down
        // By defailt it looks for an image tag:
        opener: function(openerElement) {
          // openerElement is the element on which popup was initialized, in this case its <a> tag
          // you don't need to add "opener" option if this code matches your needs, it's defailt one.
          var parent = $(openerElement).parents("div.img");
          return parent;
        }
        }

      });

    });
</script>