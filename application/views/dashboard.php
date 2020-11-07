<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <meta charset="utf-8">
        <title>Survey Management</title>


    </head>
    <style>
        /*        .create{
                    margin-left:450px;
                }*/
        .createuser{
            margin-left:450px;
        }
        .list{
            margin-left:30px;
        }
        .dashboard{
            margin-left:450px;
        }
        .parent{
            margin-top: 100px;
        }

    </style>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

    <body>
        <div>
            <?php
            $details = getSessionDetails();
            $name = "Undefined";
            $id = NULL;
            if ($details) {
                $name = $details['name'];
                $id = $details['id'];
            }
            ?>
            <p style="float :right;"> Welcome <b><?php echo $name; ?></b>  | &nbsp;<a href="<?php echo base_url('index.php/Login/logout'); ?>">Logout</a></p>
            <h1 class="dashboard">Survey Management Dashboard</h1>

            <div class="parent">
                <?php
                $sessionDetails = getSessionDetails();
                if ($sessionDetails['userType'] == 2) {
                    ?>
                    <button type="button"  data-toggle="modal" class="btn btn-primary createuser">&nbsp;&nbsp;&nbsp;User&nbsp;&nbsp;&nbsp;</button>
                    <button type="button" class="btn btn-info create list">&nbsp;&nbsp;Survey&nbsp;&nbsp;</button>
                <?php }
                ?>

                <button type="button" class="btn btn-success list takeSurvey" >Take Survey</button>
            </div>
        </div>
    </body>
</html>





<script>

    $(".takeSurvey").click(function () {
        window.location.href = "<?php echo base_url('/index.php/Survey/takeSurvey'); ?>";
    });
    $(".create").click(function () {
        window.location.href = "<?php echo base_url('/index.php/Survey/listSurveys'); ?>";
    });
    $(".createuser").click(function () {
        window.location.href = "<?php echo base_url('/index.php/User/listUsers'); ?>";
    });

</script>