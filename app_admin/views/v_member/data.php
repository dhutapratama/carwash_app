<aside class="right-side">                
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Members
            <small>Member Data</small>
        </h1>
    </section>

    <section class="content-action">
        <div class="row">
            <div class="col-xs-12">
                <a href="<?php admin_url('member/insert'); ?>" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i> Add New Member</a>
            </div>
        </div>
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
                            <th>Member ID</th>
                            <th>Username</th>
                            <th>Full Name</th>
                            <th>Location</th>
                            <th>Phone</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                    foreach ($members as $key => $value) {
                        $location = $this->m_locations->get_locations_by_id($value->location_id);
                        $location ? '' : $location->name = '-';
                    echo "<tr>"
                            ."<td>".$value->id."</td>"
                            ."<td>".$value->username."</td>"
                            ."<td>".$value->full_name."</td>"
                            ."<td>".$location->name."</td>"
                            ."<td>".$value->phone."</td>"
                            .'<td>'
                                .'<a href="'.admin_uri('member/detail/'.$value->id).'" class="btn btn-warning btn-sm">Detail</a> '
                                .'<a href="'.admin_uri('member/edit/'.$value->id).'" class="btn btn-warning btn-sm">Edit</a> '
                                .'<a href="'.admin_uri('contract/new/'.$value->id).'" class="btn btn-danger btn-sm">Add Contract</a> '
                            .'</td>'
                        ."</tr>";
                        } ?>
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>ID</th>
                            <th>Username</th>
                            <th>Full Name</th>
                            <th>Location</th>
                            <th>Phone</th>
                            <th>Action</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </section><!-- /.content -->
</aside><!-- /.right-side -->