<aside class="right-side">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Membership
            <small>Edit Member Data</small>
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
            <!-- right column -->
            <div class="col-md-6">
                <!-- general form elements disabled -->
                <form role="form" action="<?php admin_url('member/edit/'.$member->id.'/do'); ?>" method="post">
                    <!-- text input -->
                    <div class="form-group">
                        <label>Username</label>
                        <input type="text" class="form-control" name="username" placeholder="Type a Username" value="<?php echo $member->username; ?>" />
                    </div>
                    <div class="form-group">
                        <label>Full Name</label>
                        <input type="text" class="form-control" name="full_name" placeholder="Type Full Name" value="<?php echo $member->full_name; ?>" />
                    </div>
                    <div class="form-group">
                        <label>Address</label>
                        <input type="text" class="form-control" name="address" placeholder="Type an Address" value="<?php echo $member->address; ?>" />
                    </div>
                    <div class="form-group">
                        <label>Choose Location</label>
                        <select class="form-control" name="location_id">
                            <?php
                                foreach ($locations as $key => $value) {
                                    $selected = ($value->id == $member->location_id) ? ' selected' : '';
                                    echo '<option value="'.$value->id.'"'.$selected.'>'.$value->name.'</option>';
                                }
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Phone</label>
                        <input type="text" class="form-control" name="phone" placeholder="Type a Phone Number" value="<?php echo $member->phone; ?>" />
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input type="text" class="form-control" name="email" placeholder="Type an Email" value="<?php echo $member->email; ?>" />
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-success btn-sm">Save</button>
                    </div>
                </form>
            </div><!--/.col (right) -->
        </div>   <!-- /.row -->
    </section><!-- /.content -->
</aside><!-- /.right-side -->