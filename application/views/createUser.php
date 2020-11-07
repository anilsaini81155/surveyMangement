<?php ?>
<html>
    <head></head>
    <title></title>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <style>
        .margin-top-20{
            margin-top: 20px; 
        }

        .help-block , .required {
            color : red;
        }
    </style>
    <body>
        <form  action="<?php echo site_url('/User/insert') ?>" class="form-horizontal" method="post">            <div class="form-group  margin-top-20 <?php echo (!empty(form_error('userName'))) ? 'has-error' : ''; ?>">
                <label class="control-label col-md-3">
                    User Name
                    <span class="required" aria-required="true"> * </span>
                </label>
                <div class="col-md-6">
                    <input class="form-control" name="userName" value="<?php echo set_value('userName'); ?>" type="text">
                    <span class="help-block"><?php echo form_error('userName') ?></span>
                </div>
            </div>


            <div class="form-group  margin-top-20 <?php echo (!empty(form_error('userEmail'))) ? 'has-error' : ''; ?>">
                <label class="control-label col-md-3">
                    User Email
                    <span class="required" aria-required="true"> * </span>
                </label>
                <div class="col-md-6">
                    <input class="form-control" name="userEmail" value="<?php echo set_value('userEmail'); ?>" type="email">
                    <span class="help-block"><?php echo form_error('userEmail') ?></span>
                </div>
            </div>


            <div class="form-group  margin-top-20 <?php echo (!empty(form_error('userPassword'))) ? 'has-error' : ''; ?>">
                <label class="control-label col-md-3">
                    Password
                    <span class="required" aria-required="true"> * </span>
                </label>
                <div class="col-md-6">
                    <input class="form-control" name="userPassword" value="<?php echo set_value('userPassword'); ?>" type="password">
                    <span class="help-block"><?php echo form_error('userPassword') ?></span>
                </div>
            </div>


            <div class="form-group  margin-top-20 <?php echo (!empty(form_error('userConfirmPassword'))) ? 'has-error' : ''; ?>">
                <label class="control-label col-md-3">
                    Confirm Password
                    <span class="required" aria-required="true"> * </span>
                </label>
                <div class="col-md-6">
                    <input class="form-control" name="userConfirmPassword" value="<?php echo set_value('userConfirmPassword'); ?>" type="password">
                    <span class="help-block"><?php echo form_error('userConfirmPassword') ?></span>
                </div>
            </div>


            <div class="form-group  margin-top-20 <?php echo (!empty(form_error('userGender'))) ? 'has-error' : ''; ?>">
                <label class="control-label col-md-3">
                    Gender
                    <span class="required" aria-required="true"> * </span>
                </label>
                <div class="col-md-6">
                    <?php
                    echo form_dropdown('userGender', getGender(), set_value('userGender'), ' class="form-control" id="userGender" ');
                    ?>

                    <span class="help-block"><?php echo form_error('userGender') ?></span>
                </div>
            </div>


            <div class="form-group  margin-top-20 <?php echo (!empty(form_error('userAge'))) ? 'has-error' : ''; ?>">
                <label class="control-label col-md-3">
                    Age
                    <span class="required" aria-required="true"> * </span>
                </label>
                <div class="col-md-6">
                    <?php
                    echo form_dropdown('userAge', getAge(), set_value('userAge'), ' class="form-control" id="userAge" ');
                    ?>

                    <span class="help-block"><?php echo form_error('userAge') ?></span>
                </div>
            </div>


            <div class="form-group  margin-top-20 <?php echo (!empty(form_error('userType'))) ? 'has-error' : ''; ?>">
                <label class="control-label col-md-3">
                    User Type
                    <span class="required" aria-required="true"> * </span>
                </label>
                <div class="col-md-6">
                    <?php
                    echo form_dropdown('userType', getUserType(), set_value('userType'), ' class="form-control" id="userType" ');
                    ?>

                    <span class="help-block"><?php echo form_error('userAge') ?></span>
                </div>
            </div>

            <br><br>
            <button type="submit" class="btn green">Submit</button>
            <button type="button" class="btn blue back">Cancel</button>

        </form>


    </body>
</html>

<script>

    $(".back").click(function () {
        window.location.href = "<?php echo base_url('/index.php/User/listUsers'); ?>";
    });

</script>
