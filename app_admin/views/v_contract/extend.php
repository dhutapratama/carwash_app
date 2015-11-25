<aside class="right-side">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Contract
            <small>Extend Contract</small>
        </h1>
    </section>

    <!-- Main content -->
    <section class="content">
        <?php if ($error) { ?>
        <div class="row">
            <div class="col-md-6">
                <!-- Success box -->
                <div class="box box-solid bg-red">
                    <div class="box-header">
                        <h3 class="box-title">Your input has an error</h3>                                    
                    </div>
                    <div class="box-body">
                        <ul>
                            <?php echo $error; ?>
                        </ul>
                    </div><!-- /.box-body -->
                </div><!-- /.box -->
            </div><!-- /.col -->
        </div>
        <?php } ?>

        <div class="row">
            <div class="col-md-12">
                <div class="box box-danger">
                    <div class="box-body">
                        <div class="box-header">
                            <p>Contract Data</p>
                        </div>
                        <table id="" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Contract ID</th>
                                    <th>Car Number</th>
                                    <th>Location</th>
                                    <th>Status</th>
                                    <th>Start Date</th>
                                    <th>Due Date</th>
                                    <th>Expired Date</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                if ($contract) {
                                    foreach ($contract as $key => $value) {
                                        $member_car = $this->m_member_cars->get_member_cars_by_id($value->member_car_id);
                                        $location = $this->m_locations->get_locations_by_id($value->location_id);
                                        $value->is_expired ? $status = 'Expired' : $status = 'Active';
                                        $contract_id = $value->contract_id;
                                        echo '<tr>'.
                                                '<td>'.$value->contract_id.'</td>'.
                                                '<td>'.$member_car->car_number.'</td>'.
                                                '<td>'.$location->name.'</td>'.
                                                '<td>'.$status.'</td>'.
                                                '<td>'.$value->start_date.'</td>'.
                                                '<td>'.$value->due_date.'</td>'.
                                                '<td>'.$value->expired_date.'</td>'.
                                            '</tr>';
                                    }
                                } else {
                                    echo '<tr><td colspan="8" align="center"> No contract data </td></tr>';
                                }
                                ?>
                            </tbody>
                        </table>
                        
                    </div>
                </div>
            </div><!--/.col (left) -->
        </div>

        <div class="row">
            <!-- right column -->
            <div class="col-md-6">
                <div class="box box-primary">
                    <div class="box-body">
                        <div class="box-header">
                            <p>Add Subscription Data</p>
                        </div>
                        <!-- general form elements disabled -->
                        <form role="form" action="<?php admin_url('contract/extend/'.$contract_id.'/do'); ?>" method="post" id="forms">

                            <input type="hidden" name="use_pricelist" id="pricelist" value="true">
                            <!-- text input -->
                            <div id="custom_form_1" style="">
                                <div class="form-group">
                                    <label>Choose from Pricelist</label>
                                    <select class="form-control" name="price_list_id" id="location">
                                        <?php
                                            foreach ($price_list as $key => $value) {
                                                echo '<option value="'.$value->id.'">'.$value->name.' (Rp '.number_format($value->price, 0, ".", ".").')</option>';
                                            }
                                        ?>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group" align="center">
                                <button type="button" class="btn btn-warning btn-sm" id="custom_contract">Choose Contract / Custom Contract</button>
                            </div>

                            <div id="custom_form_2" style="display:none;">
                                <div class="form-group">
                                    <label>Price</label>
                                    <input type="text" class="form-control" name="price" placeholder="Type a custom contract price" value="<?php echo set_value("price"); ?>" />
                                </div>
                                <div class="form-group">
                                    <label>Day</label>
                                    <input type="text" class="form-control" name="day" placeholder="How many day" value="<?php echo set_value("day"); ?>" />
                                </div>
                                <div class="form-group">
                                    <label>Note</label>
                                    <input type="text" class="form-control" name="note" placeholder="Type a note" value="<?php echo set_value("note"); ?>" />
                                </div>
                            </div>
                            
                            <div class="form-group" align="right">
                                <button type="submit" class="btn btn-success btn-sm">Add Subscription</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div><!--/.col (right) -->
        </div>   <!-- /.row -->
    </section><!-- /.content -->
</aside><!-- /.right-side -->