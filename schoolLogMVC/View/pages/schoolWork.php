
    					<div class="col-md-4">
							<div class="nav-tabs-custom">
                                <ul class="nav nav-tabs">
                                    <li class="active"><a data-toggle="tab" data-value="1" href="#tab_1">Aktivnost</a></li>
                                    <li class=""><a data-toggle="tab" data-value="2" href="#tab_2">Pribor</a></li>
                                    <li class=""><a data-toggle="tab" data-value="3" href="#tab_3">Zadaće</a></li>
                                </ul>	
                                <div class="tab-content">
                                    <div class="tab-pane active">
							        	<div class="row">
							    			<div class="col-md-6">
							                    <div class="form-group">
							                        <input class="datepicker form-control" placeholder="Izaberi datum">
							                    </div>
							                    <div class="form-group">
							    					<button id="saveActivity" class="btn btn-primary">Spremi datum</button>
							                    </div>
							                    <div class="form-group">
							    					<label id="duplicateDateError" style="color: red"></label> 
							                    </div>                        
							                </div>
							
							    			<div class="col-md-6">
							                    <table class="table table-bordered">
							                        <thead class="bg-red">
							                            <th>red. br.</th>
							                            <th>Datum</th>
							                            <th></th>
							                        </thead>
							                        <tbody>
							                        	<?php echo $this->activityDates; ?>
							                        </tbody>
							                    </table>    			
							                </div>
							            </div>                                    
                                    </div><!-- /.tab-pane -->
                                </div><!-- /.tab-content -->
                            </div> 
                        </div>  
                        
                        
                      