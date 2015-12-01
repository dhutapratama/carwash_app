<aside class="right-side">                
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Contracts
            <small>Member Contracts Data</small>
        </h1>
    </section>

    <!-- Main content -->
    <section class="content">
        <?php if ($this->session->flashdata('success')) { ?>
        <div class="row">
            <div class="col-md-12">
                <!-- Success box -->
                <div class="box box-solid bg-green">
                    <div class="box-header">
                        <h3 class="box-title">Success</h3>                                    
                    </div>
                    <div class="box-body">
                        <?php echo $this->session->flashdata('success'); ?>
                    </div><!-- /.box-body -->
                </div><!-- /.box -->
            </div><!-- /.col -->
        </div>
        <?php } ?>

        <div class="row">
            <div class="col-xs-12">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Contract ID</th>
                            <th>Username</th>
                            <th>Full Name</th>
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
                    foreach ($contracts as $key => $value) {
                        $location = $this->m_locations->get_locations_by_id($value->location_id);
                        $location ? '' : $location->name = '-';
                    echo "<tr>"
                            ."<td>".$value->contract_id."</td>"
                            ."<td>".$value->username."</td>"
                            ."<td>".$value->full_name."</td>"
                            ."<td>".$value->car_number."</td>"
                            ."<td>".$location->name."</td>"
                            ."<td>".$value->is_expired."</td>"
                            ."<td>".$value->start_date."</td>"
                            ."<td>".$value->due_date."</td>"
                            ."<td>".$value->expired_date."</td>"
                            .'<td>'
                                .'<a href="'.admin_uri('contract/detail/'.$value->contract_id).'" class="btn btn-warning btn-sm">Detail</a> '
                                .'<a href="'.admin_uri('contract/edit/'.$value->contract_id).'" class="btn btn-warning btn-sm">Edit</a> '
                                .'<a href="'.admin_uri('contract/extend/'.$value->contract_id).'" class="btn btn-danger btn-sm">Extend</a> '
                            .'</td>'
                        ."</tr>";
                        } ?>
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>Contract ID</th>
                            <th>Username</th>
                            <th>Full Name</th>
                            <th>Car Number</th>
                            <th>Location</th>
                            <th>Status</th>
                            <th>Start Date</th>
                            <th>Due Date</th>
                            <th>Expired Date</th>
                            <th>Action</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </section><!-- /.content -->
</aside><!-- /.right-side -->