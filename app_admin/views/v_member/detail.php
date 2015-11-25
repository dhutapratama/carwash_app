<aside class="right-side">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Member
            <small>Detail Member</small>
        </h1>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-6">
                <div class="box box-danger">
                    <div class="box-body">
                        <div class="box-header">
                            <p><h4><b>User Detail</b></h4></p>
                        </div>
                        <table width="100%">
                            <tr>
                                <td><b>Member ID</b></td>
                                <td width="20px"><b> : </b></td>
                                <td><?php echo $member->id; ?></td>
                            </tr>
                            <tr>
                                <td><b>Username</b></td>
                                <td><b> : </b></td>
                                <td><?php echo $member->username; ?></td>
                            </tr>
                            <tr>
                                <td><b>Password</b></td>
                                <td><b> : </b></td>
                                <td> <a href="" class="btn btn-danger btn-xs"> Change Password</a></td>
                            </tr>
                            <tr>
                                <td><b>Full name</b></td>
                                <td><b> : </b></td>
                                <td><?php echo $member->full_name; ?></td>
                            </tr>
                            <tr>
                                <td><b>Address</b></td>
                                <td><b> : </b></td>
                                <td><?php echo $member->address; ?></td>
                            </tr>
                            <tr>
                                <td><b>Location</b></td>
                                <td><b> : </b></td>
                                <?php $location = $this->m_locations->get_locations_by_id($member->location_id); ?>
                                <td><?php echo $location->name; ?></td>
                            </tr>
                            <tr>
                                <td><b>Phone</b></td>
                                <td><b> : </b></td>
                                <td><?php echo $member->phone; ?></td>
                            </tr>
                            <tr>
                                <td><b>Email</b></td>
                                <td><b> : </b></td>
                                <td><?php echo $member->email; ?></td>
                            </tr>
                        </table>
                        <div style="padding-top: 10px; text-align: right;">
                            <a href="<?php echo admin_uri('member/edit/'.$member->id) ?>" class="btn btn-success btn-xs">Edit this user</a>
                        </div>
                    </div>
                </div>
            </div><!--/.col (left) -->
            <div class="col-md-6">
                <div class="box">
                    <div class="box-body">
                        <table width="100%">
                            <tr>
                                <td><b>Profile Image</b></td>
                                <td width="20px"><b> : </b></td>
                                <td><img src="<?php echo $member->picture_url; ?>" height="50px" /></td>
                            </tr>
                            <tr>
                                <td><b>Cover Image</b></td>
                                <td width="20px"><b> : </b></td>
                                <td><img src="<?php echo $member->cover_url; ?>" height="100px" /></td>
                            </tr>
                            <tr>
                                <td><b>Referral Code</b></td>
                                <td><b> : </b></td>
                                <td><?php echo $member->referral_code; ?></td>
                            </tr>
                            <tr>
                                <td><b>Referring Parrent</b></td>
                                <td><b> : </b></td>
                                <td><?php echo $member->referring_code; ?></td>
                            </tr>

                            <tr>
                                <td><b>Reffering Parent Username</b></td>
                                <td><b> : </b></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td><b>OAuth Scope</b></td>
                                <td><b> : </b></td>
                                <td><?php echo $member->oauth_scope; ?></td>
                            </tr>
                            <tr>
                                <td><b>Verified Member</b></td>
                                <td><b> : </b></td>
                                <td><?php echo $member->is_verified ? 'Verified' : 'Not Verified'; ?></td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="box box-danger">
                    <div class="box-body">
                        <div class="box-header">
                            <p>Membership Data</p>
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
                                                '<td>'.$value->id.'</td>'.
                                                '<td>'.$member_car->car_number.'</td>'.
                                                '<td>'.$location->name.'</td>'.
                                                '<td>'.$status.'</td>'.
                                                '<td>'.$value->start_date.'</td>'.
                                                '<td>'.$value->due_date.'</td>'.
                                                '<td>'.$value->expired_date.'</td>'.
                                                '<td>'.
                                                    '<a href="'.admin_uri('contract/detail/'.$value->id).'" class="btn btn-warning btn-xs">Contract Detail</a>'.
                                                '</td>'.
                                            '</tr>';
                                    }
                                } else {
                                    echo '<tr><td colspan="8" align="center"> No membership data </td></tr>';
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