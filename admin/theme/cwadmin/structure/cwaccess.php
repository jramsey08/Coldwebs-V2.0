<div class="cl-mcont">
<div class="page-head">
<ol class="breadcrumb">
<li><a href="/admin">Dashboard</a></li>
<li class="active">Website Access</li>
</ol></div>

<div class="row">
<div class="col-md-12">
<div class="block-flat">
<div class="header">							
<h3>Access Levels
<div align="right">
<button type="button" onclick="window.location.href='./<?php echo $_GET['url']; ?>/New'" class="btn btn-flat"><i class="fa fa-check"></i> Create New</button>
</div>
</h3>			
</div>


<form name='editarticle' id='edittable' method='post'><br>
<center>
<button type='submit' formaction="/Process/EditAccess/Delete" style="background-color: red; color: white;" class="btn btn-trans"><i class="fa "></i> Delete </button>
<button type='submit' formaction="/Process/EditAccess/Active" style="background-color: green; color: white;" class="btn btn-trans"><i class="fa "></i> Activate </button>
<button type='submit' formaction="/Process/EditAccess/Inactive" style="background-color: grey; color: white;" class="btn btn-trans"><i class="fa "></i> In-Active </button>
</center>

<div class="content">
<div class="table-responsive">
<table class="table table-bordered" id="datatable" >
<thead>
<tr>
<th></th>
<th>Name</th>
<th>Status</th>
<th>Settings</th>
</tr>
</thead>

<tbody>
<?php
$Query = "SELECT * FROM cwoptions WHERE type='access' AND trash='0' ORDER BY list ASC";
$Result = mysqli_query($CwDb,$Query);
while($Row = mysqli_fetch_assoc($Result)){
    $ArticleId = OtarEncrypt($key,$Row['id']);
?>
<tr class="odd gradeX">
<td><input type="checkbox" name="edit[]" value="<?php echo $Row['id']; ?>"></td>
<td><?php echo $Row['name']; ?></td>
<td><?php echo StatusName($Row['active']); ?></td>
<td class="center">
<div class="btn-group">
<button class="btn btn-default btn-xs" type="button">Actions</button>
<button data-toggle="dropdown" class="btn btn-xs btn-primary dropdown-toggle" type="button"><span class="caret"></span><span class="sr-only">Toggle Dropdown</span></button>
<ul role="menu" class="dropdown-menu">
<li><a href="/admin/CwAccess/<?php echo $ArticleId; ?>">Edit</a></li>
<li class="divider"></li>
<li><a href="/Process/Delete/CwAccess/<?php echo $ArticleId; ?>">Remove</a></li>
</ul></div></td>
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
<input type='hidden' name='redirect' value='<?php echo "http://$Website_Url_Auth"; ?>/admin/CwAccess'>
</form>




<script type="text/javascript" src="/admin/theme/cwadmin/header/js/jquery-ui.js"></script>
<script type="text/javascript" src="/admin/theme/cwadmin/header/js/jquery.jeditable.mini.js"></script>
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


<script type="text/javascript" src="/admin/theme/cwadmin/header/js/bootstrap-multiselect.js"></script>
<script type="text/javascript" src="/admin/theme/cwadmin/header/js/jquery.multi-select.js"></script>
<script type="text/javascript" src="/admin/theme/cwadmin/header/js/jquery.quicksearch.js"></script>

			<script type="text/javascript">
			    $(document).ready(function() {
					
			        $('#example1').multiselect();
					
			        $('#example2').multiselect();
					
			        $('#example3').multiselect({
			            buttonClass: 'btn btn-link'
			        });
					
			        $('#example4').multiselect({
			            buttonClass: 'btn btn-default btn-sm'
			        });
					
			        $('#example6').multiselect();
					
			        $('#example9').multiselect({
			            onChange:function(element, checked){
			                alert('Change event invoked!');
			                console.log(element);
			            }
			        });
					
			        for (var i = 1; i <= 100; i++) {
			            $('#example11').append('<option value="' + i + '">Options ' + i + '</option>');
			        }
			        $('#example11').multiselect({
			            maxHeight: 200
			        })
					
			        $('#example13').multiselect();
					
			        $('#example14').multiselect({
			            buttonWidth: '500px',
			            buttonText: function(options) {
			                if (options.length === 0) {
			                    return 'None selected <b class="caret"></b>';
			                }
			                else {
			                    var selected = '';
			                    options.each(function() {
			                        selected += $(this).text() + ', ';
			                    });
			                    return selected.substr(0, selected.length -2) + ' <b class="caret"></b>';
			                }
			            }
			        });
					
			        $('#example16').multiselect({
			            onChange: function(option, checked) {
                            if (checked === false) {
                                $('#example16').multiselect('select', option.val());
                            }
			            }
			        });
					
			        $('#example19').multiselect();

			        $('#example20').multiselect({
			            selectedClass: null
			        });
					
			        $('#example23').multiselect();
					
			        $('#example24').multiselect();

			        $('#example25').multiselect({
			        	dropRight: true,
			        	buttonWidth: '300px'
			        });

			        $('#example27').multiselect({
			        	includeSelectAllOption: true
			        });

					// Add options for example 28.
					for (var i = 1; i <= 100; i++) {
						$('#example28').append('<option value="' + i + '">' + i + '</option>');
					}

			        $('#example28').multiselect({
			        	includeSelectAllOption: true,
			        	enableFiltering: true,
			        	maxHeight: 150
			        });
                    
                    $('#example32').multiselect();
                    
                    $('#example39').multiselect({
                        includeSelectAllOption: true,
			        	enableCaseInsensitiveFiltering: true
                    });
                    
                    $('#example41').multiselect({
			        	includeSelectAllOption: true
			        });
              //multi-select boxed
              $('#my-select').multiSelect()
              $('#pre-selected-options').multiSelect();
              $('#callbacks').multiSelect({
                afterSelect: function(values){
                  alert("Select value: "+values);
                },
                afterDeselect: function(values){
                  alert("Deselect value: "+values);
                }
              });
              $('#optgroup').multiSelect({ selectableOptgroup: true });
              $('#disabled-attribute').multiSelect();
              $('#custom-headers').multiSelect({
                selectableHeader: "<div class='custom-header'>Selectable items</div>",
                selectionHeader: "<div class='custom-header'>Selection items</div>",
              });
              $('#searchable').multiSelect({
                selectableHeader: "<input type='text' class='form-control search-input' autocomplete='off' placeholder='Search'>",
                selectionHeader: "<input type='text' class='form-control search-input' autocomplete='off' placeholder='Search'>",
                afterInit: function(ms){
                  var that = this,
                      $selectableSearch = that.$selectableUl.prev(),
                      $selectionSearch = that.$selectionUl.prev(),
                      selectableSearchString = '#'+that.$container.attr('id')+' .ms-elem-selectable:not(.ms-selected)',
                      selectionSearchString = '#'+that.$container.attr('id')+' .ms-elem-selection.ms-selected';

                  that.qs1 = $selectableSearch.quicksearch(selectableSearchString)
                  .on('keydown', function(e){
                    if (e.which === 40){
                      that.$selectableUl.focus();
                      return false;
                    }
                  });

                  that.qs2 = $selectionSearch.quicksearch(selectionSearchString)
                  .on('keydown', function(e){
                    if (e.which == 40){
                      that.$selectionUl.focus();
                      return false;
                    }
                  });
                },
                afterSelect: function(){
                  this.qs1.cache();
                  this.qs2.cache();
                },
                afterDeselect: function(){
                  this.qs1.cache();
                  this.qs2.cache();
                }
              });
			    });
			</script>