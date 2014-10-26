
    <div class="box box-solid box-primary">    
        <div class="box-header">
           <h3 class="box-title">Aktivnost</h3>	
        </div><!-- /.box-header -->
        <!-- form start -->
        
        <div class="box-body">
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
                        <thead>
                            <th>red. br.</th>
                            <th>Aktivnost</th>
                            <th>Izbriši</th>
                        </thead>
                        <tbody>
                        	<?php echo $this->activityDates; ?>
                        </tbody>
                    </table>    			
                </div>
            </div>
        </div><!-- /.box-body -->
    </div>