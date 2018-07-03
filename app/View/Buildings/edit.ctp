<h2 class="page-heading text-left col-sm-6 text-center"><?php echo __('Building Details'); ?></h2>
<div class="container">
<div class="row">
    <div class="col-sm-8">

                
    <?php 
		 echo $this->Form->create('Building',array(
                                                                      'inputDefaults'=>array('label' => false,'div' => false),
                                                                      'class'=>'form-horizontal',
                                                                      'role' =>'form'
                                                                     )
                                                ); 
		echo $this->Form->hidden('id', ['value'=>$this->request->data['Building']['id']]);
        ?>
                    
		
        
		<div class="form-group ">
                    <div class="row">
                       
                             <label for="name" class="control-label col-sm-2"><?php echo __("Building Id ");?><span style="color:red">*</span></label>
                            <div class="col-sm-8">
                               
                            <?php
                                   echo $this->Form->input("buildingid",array(
                                                                                "type"  => "text",
																				"disabled"=>"disabled",
                                                                                "class" => "form-control",
                                                                                "id" => "buildingid",
                                                                                "error" => array("attributes" => array("wrap" => "label","for"=>"name","class"=> "error"))
                                                                               )
                                                          );
                             ?>
                             </div>
                          
                </div>
                </div>
		<div class="form-group ">
                    <div class="row">
                            <label for="display_name" class="control-label col-lg-2"><?php echo __("Service Number ");?><span style="color:red">*</span></label>
                            <div class="col-lg-8">
                                
                            <?php
                                   echo $this->Form->input("serviceno",array(
                                                                                "type"  => "text",
                                                                                "class" => "form-control",
                                                                                "id" => "serviceno",
                                                                                "error" => array("attributes" => array("wrap" => "label","for"=>"display_name","class"=> "error"))
                                                                               )
                                                          );
                             ?>
                             </div>
                    </div></div>
							<div class="form-group ">
                            <div class="row">
                                <label for="display_name" class="control-label col-lg-2"><?php echo __("Building Group");?></label>
                            <div class="col-lg-8">
                                
                            <?php
                                   echo $this->Form->input("builing_group",array(
                                                                                "type"  => "text",
                                                                                "class" => "form-control",
                                                                                "id" => "builing_group",
                                                                                "error" => array("attributes" => array("wrap" => "label","for"=>"display_name","class"=> "error"))
                                                                               )
                                                          );
                             ?>
                             </div>
                            </div></div>
							<div class="form-group ">
                                                            
                            <div class="row">
                                <label for="display_name" class="control-label col-lg-2"><?php echo __("Building Name");?></label>
                            <div class="col-lg-8">
                                
                            <?php
                                   echo $this->Form->text("building_name",array(
                                                                                "type"  => "textarea",
                                                                                "class" => "form-control",
                                                                                "id" => "building_name",
                                                                                "error" => array("attributes" => array("wrap" => "label","for"=>"display_name","class"=> "error"))
                                                                               )
                                                          );
                             ?>
                             </div>
                            </div></div>
							<div class="form-group ">
                                                            
                            <div class="row">
                                <label for="display_name" class="control-label col-lg-2"><?php echo __("Description");?><span style="color:red">*</span></label>
                            <div class="col-lg-8">
                                
                            <?php
                                   echo $this->Form->input("description",array(
								   												'rows' => '3',
																				'cols' => '1',
                                                                                "type"  => "textarea",
                                                                                "class" => "form-control",
                                                                                "id" => "description",
                                                                                "error" => array("attributes" => array("wrap" => "label","for"=>"display_name","class"=> "error"))
                                                                               )
                                                          );
                             ?>
                             </div>
                            </div></div>
							<div class="form-group ">
                           <div class="row">
                               <label for="display_name" class="control-label col-lg-2"><?php echo __("Status ");?><span style="color:red">*</span></label>
                            <div class="col-lg-8">
                                 
                            <?php echo $this->Form->radio('status', array(
								'1' => 'Active',
								'0' => 'Closed',
                                                                
							), 
							array(
								'legend' => false
                                                            
							)
						);?>
                             </div>
                           </div></div>
							<div class="form-group ">
                            <div class="row">
                                 <label for="action_id" class="control-label col-lg-2"><?php echo __("State ");?><span style="color:red">*</span></label>
                            <div class="col-lg-8">
                               
                            <?php
                                   echo $this->Form->input("state_id",array(
                                                                                'type'=>'select',
																				'empty' => '--Select State--',
																				'options'=> $states,
																				"class" => "form-control",
                                                                                "id" => "state_id",
                                                                                "error" => array("attributes" => array("wrap" => "label","for"=>"action_id","class"=> "error"))
                                                                               )
                                                          );
                             ?>
                             </div>
                            </div>
                            </div>
		<div class='form-group'>
                            <div class="row">
                            <div class="col-lg-2"></div>
                       <div class='col-lg-10 text-center'>
                       <?php
                             echo $this->Js->submit('Save', array('class'   => 'btn btn-success',
                                                                  'type'    => 'json',
                                                                  'success' => "
                                                                              if(data == 1){
                                                                              $('#contentWrapper').fadeOut(1600, 'linear');
                                                                                loaddata('{$this->webroot}/{$this->name}/index/','contentWrapper');
                                                                              }",
                                                                              'update' => '#contentWrapper',
                                                                              'div'    => false                    
                                                                )
                                                    );
                            echo '&nbsp;';                                              
                             echo $this->Js->link(__("Delete"),
                                     "/{$this->name}/delete/{$this->request->data['Building']['id']}",
                                     array(
                                                'before'  => $this->Js->get('#loader')->effect('fadeIn', array('buffer' => false)),
                                                'success' => $this->Js->get('#loading')->effect('fadeOut', array('buffer' => false)),
                                                'update'  => '#contentWrapper',
                                                'async'   => false,
                                                'escape'  => false,
                                                'class'   => 'btn btn-danger btn-xs edit-delete',
                                                'confirm' => 'Are you sure you wish to delete?'
                                           )
                                     );  
                                                                        
                        ?>
                        </div>
                            </div>
                    </div>
                        </div>
            </div>
<!--    </div>-->
</div>
</div></div>
<?php echo $this->Js->writeBuffer();?>   
