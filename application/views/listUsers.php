<html>
    <head></head>
    <title></title>
    <script  type="text/javascript"  src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script  type="text/javascript" src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
    <script  type="text/javascript" src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css"  href="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap.min.css" />
    <style>
        #listTable{
            margin-top: 50px;
        }

    </style>
    <body>
        <button type="button"  style="margin-top:25px;border-radius: 15px;" class="btn btn-primary createuser">Create User</button>
        <button type="button"  style="margin-top:25px;border-radius: 15px;" class="btn btn-primary home">&nbsp;Home&nbsp;</button>
        <div id="listTable">
            <table id="listUserSection" class="table table-striped table-bordered" style="width:100%">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Gender</th>
                        <th>User Type</th>
                        <!--<th>Update</th>-->
                        <th>Delete</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($content as $v) { ?>
                        <tr>
                            <td><?php echo $v['name']; ?></td>
                            <td><?php echo $v['email']; ?></td>
                            <td><?php echo getGenderValue($v['gender']); ?></td>
                            <td><?php echo getUserTypeValue($v['user_type']); ?></td>
                            <!--<td>-->

                                        <!--<a href="<?php // echo site_url('');          ?>">-->
                                    <!--                        <i class="icon-docs"></i> Update </a>-->

                            <!--</td>-->
                            <td>
                                <a href="<?php echo site_url('/User/delete/' . $v['id']); ?>">Delete</a>
                            </td>
                        </tr>
                    <?php }
                    ?>
                </tbody>
            </table>
        </div>
    </body>
</html>
<script>
    $(document).ready(function () {
        $('#listUserSection').DataTable();
    });
    
     $(".home").click(function () {
        window.location.href = "<?php echo base_url(''); ?>";
    });

    $(".createuser").click(function () {
        window.location.href = "<?php echo base_url('/index.php/user/createUsers'); ?>";
    });

</script>