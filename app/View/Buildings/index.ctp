<div id="dontprintthis">

<?php $this->Paginator->options(array(
                    'update' => '#contentWrapper',
                      'evalScripts' => true,
                      //'before' => 'loadingBefore();',
                      //'complete' => 'loadingAfter();'
                    ));

            ?>
</div>

  

<div class="the-box">
    <div class="adv-table editable-table">
      <?php echo $this->element('curd');?>
      <h4 class="small-title"></h4>
    </div> 
    <div id="printthis">
        <div class="row">
            <div class="col-sm-2"></div>
            <div class="col-sm-8">
			<?php 
			if($this->params->named['added'] == 'edited')
			{
			echo '<span style="color:green">Building Info updated successfullly..</span>';
			}
			else if($this->params->named['added'] == 'added')
			{
			echo '<span style="color:green">Building Info added successfullly..</span>';
			}
			else if($this->params->named['added'] == 'deleted')
			{
			echo '<span style="color:red">Building Info deleted successfullly..</span>';
			}

?> 
        <table id="tabledata" class="table table-striped table-hover dataTable">
            <thead >
            <tr>
			<th width="5%"><?php echo __('No'); ?></th>
           		<th width="25%"><?php echo __('Building Id'); ?></th>
           		<th width="25%"><?php echo __('Service Number'); ?></th>
           		<th width="20%"><?php echo __('Building Group'); ?></th>
				<th width="20%"><?php echo __('Buiding Name'); ?></th>
				<th width="20%"><?php echo __('Status'); ?></th>
           		
          	</tr>
          	</thead>
          	<tbody>
          	<?php 
           if(count($buildingLists) > 0){ 
           foreach ($buildingLists as $buildingList): ?>
          	<tr>
          		<td><?php echo ((($pg-1) * $limit) + (++$i)); ?></td>
          		<td><?php 
				echo $this->Js->link(__($buildingList['Building']['buildingid']),
                                     "/{$this->name}/edit/{$buildingList['Building']['id']}",
                                     array(
                                                'before'  => $this->Js->get('#loader')->effect('fadeIn', array('buffer' => false)),
                                                'success' => $this->Js->get('#loading')->effect('fadeOut', array('buffer' => false)),
                                                'update'  => '#contentWrapper',
                                                'async'   => false,
                                                'escape'  => false,
                                                'class'   => 'edit-delete',
                                           )
                                     );
				 ?>&nbsp;</td>
          		<td><?php echo h($buildingList['Building']['serviceno']); ?>&nbsp;</td>
          		<td><?php echo h($buildingList['Building']['builing_group']); ?>&nbsp;</td>
				<td><?php echo h($buildingList['Building']['building_name']); ?>&nbsp;</td>
				<td><?php echo h($buildingList['Building']['status']); ?>&nbsp;</td>
				<td class="text-center">
				
          <?php
               /* echo $this->Js->link(__("<i class='fa fa-pencil fa-lg' title='Edit'></i>"),
                                     "/{$this->name}/edit/{$buildingList['Building']['id']}",
                                     array(
                                                'before'  => $this->Js->get('#loader')->effect('fadeIn', array('buffer' => false)),
                                                'success' => $this->Js->get('#loading')->effect('fadeOut', array('buffer' => false)),
                                                'update'  => '#contentWrapper',
                                                'async'   => false,
                                                'escape'  => false,
                                                'class'   => 'btn btn-primary btn-xs edit-delete',
                                           )
                                     );
                echo '&nbsp;';   */                 
                
          ?>		</td>
          	</tr>
          <?php endforeach; } else {?></tbody>
           <!--  <tr>
                <td colspan="6" align="center"><?php //echo __('No Records Found');?></td>
            </tr> --> 
            <?php }?>
            
            
        </table>
        <div class="col-sm-12 text-right"><a href="/BuildingManagementSystem/Buildings/add" class="btn btn-success">Add New Building</a></div>

</div>
</div>
</div>
</div>
</div>
<?php echo $this->Js->writeBuffer();?>
<script type="text/javascript">
$(document).ready(function() {
     $('#tabledata').dataTable({
      "sDom": "<'row'<'col-sm-6'l><'col-sm-6'f>r>"+
    "<'table-responsive't>"+
    "<'row'<'col-sm-6'i><'col-sm-6'p>>",
    searchHighlight: true
    });
});
   function printthis()
{
 var w = window.open('', '', terger='_blank','left=0,top=0,width=800,height=600,toolbar=0,scrollbars=0,status=0');
 w.document.write($("#printthis").html());
 w.document.getElementById("dontprintthis").style.display = 'none';
 w.document.getElementById("tabledata_paginate").style.display = 'none';
 w.document.getElementById("tabledata_filter").style.display = 'none';
 w.document.getElementById("tabledata_length").style.display = 'none';
 w.document.close(); // needed for chrome and safari
 javascript:w.print();
 w.close();
 return false;
 }
</script>
