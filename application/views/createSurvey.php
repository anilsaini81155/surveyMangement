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

        .margin-bottom-20{
            margin-bottom: 20px; 
        }

        .help-block , .required {
            color : red;
        }
    </style>
    <body>
        <form  action="<?php echo site_url('/Survey/insert') ?>" class="form-horizontal" method="post">     
            <div class="form-group  margin-top-20 <?php echo (!empty(form_error('surveyName'))) ? 'has-error' : ''; ?>">
                <label class="control-label col-md-3">
                    Survey Name
                    <span class="required" aria-required="true"> * </span>
                </label>
                <div class="col-md-6">
                    <input class="form-control" name="surveyName" value="<?php echo set_value('surveyName'); ?>" type="text">
                    <span class="help-block"><?php echo form_error('surveyName') ?></span>
                </div>
            </div>


            <div class="form-group  margin-top-20 <?php echo (!empty(form_error('surveyDescription'))) ? 'has-error' : ''; ?>">
                <label class="control-label col-md-3">
                    Survey Description
                    <span class="required" aria-required="true"> * </span>
                </label>
                <div class="col-md-6">
                    <textarea class="form-control" name="surveyDescription" id="surveyDescription" ><?php echo set_value('surveyDescription'); ?></textarea>
                    <span class="help-block"><?php echo form_error('surveyDescription') ?></span>
                </div>
            </div>


            <button type="button" class="btn  margin-top-20" id="add_question">Add Question</button>

            <div class="form-group  margin-top-20 <?php echo (!empty(form_error('getAudienceType'))) ? 'has-error' : ''; ?>">
                <label class="control-label col-md-3">
                    Audience Type
                    <span class="required" aria-required="true"> * </span>
                </label>
                <div class="col-md-6">
                    <?php
                    echo form_dropdown('getAudienceType', getAudienceType(), set_value('getAudienceType'), ' class="form-control" id="getAudienceType" ');
                    ?>

                    <span class="help-block"><?php echo form_error('getAudienceType') ?></span>
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
        window.location.href = "<?php echo base_url('/index.php/Survey/listSurveys'); ?>";
    });
    
    $("#add_question").click(function () {
        var abc = '<br><label  class="margin-top-20 margin-bottom-20">Question Description</label><div><input class="form-control" name="surveyQuestion[]" type="text" required></div>';
        $(abc).insertBefore("#add_question");
    });

</script>
