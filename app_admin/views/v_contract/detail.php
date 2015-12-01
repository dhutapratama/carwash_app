<aside class="right-side">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Contract
            <small>Detail Contract</small>
        </h1>
    </section>

    <!-- Main content -->
    <section class="content">
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
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                if ($contract) {
                                    foreach ($contract as $key => $value) {
                                        $member_car = $this->m_member_cars->get_member_cars_by_id($value->member_car_id);
                                        $location = $this->m_locations->get_locations_by_id($value->location_id);
                                        $value->is_expired ? $status = 'Expired' : $status = 'Active';

                                        echo '<tr>'.
                                                '<td>'.$value->contract_id.'</td>'.
                                                '<td>'.$member_car->car_number.'</td>'.
                                                '<td>'.$location->name.'</td>'.
                                                '<td>'.$status.'</td>'.
                                                '<td>'.$value->start_date.'</td>'.
                                                '<td>'.$value->due_date.'</td>'.
                                                '<td>'.$value->expired_date.'</td>'.
                                                '<td>'.
                                                    '<a href="'.admin_uri('contract/extend/'.$value->contract_id).'" class="btn btn-warning btn-xs">Extend Contract</a>'.
                                                '</td>'.
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
            <div class="col-md-12">
                <div class="box box-danger">
                    <div class="box-body">
                        <div class="box-header">
                            <p>Contract Histories</p>
                        </div>
                        <table id="" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Histories ID</th>
                                    <th>Created Date</th>
                                    <th>Note</th>
                                    <th>Total Days</th>
                                    <th>Price</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                if ($contract_histories) {
                                    foreach ($contract_histories as $key => $value) {
                                        $member_car = $this->m_member_cars->get_member_cars_by_id($value->member_car_id);

                                        echo '<tr>'.
                                                '<td>'.$value->id.'</td>'.
                                                '<td>'.$value->created_date.'</td>'.
                                                '<td>'.$value->note.'</td>'.
                                                '<td>'.$value->total_day.'</td>'.
                                                '<td>'.$value->price.'</td>'.
                                                '<td>'.
                                                    '<a href="'.admin_uri('contract/edit/'.$value->id).'" class="btn btn-danger btn-xs">Edit / Remove Subscription</a>'.
                                                '</td>'.
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
    </section><!-- /.content -->
</aside><!-- /.right-side -->