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
        <form  action="<?php echo site_url('/Survey/storeSurveyData') ?>" class="form-horizontal" method="post">     
            <div class="form-group  margin-top-20 <?php echo (!empty(form_error('surveyName'))) ? 'has-error' : ''; ?>">
                <label class="control-label col-md-3">
                    Survey Name
                    <span class="required" aria-required="true"> * </span>
                </label>
                <div class="col-md-6">
                    <input class="form-control" name="surveyName" value="<?php echo set_value('surveyName', $surveyDetails['name']); ?>" type="text" readonly>
                    <span class="help-block"><?php echo form_error('surveyName') ?></span>
                </div>
            </div>


            <div class="form-group  margin-top-20 <?php echo (!empty(form_error('surveyDescription'))) ? 'has-error' : ''; ?>">
                <label class="control-label col-md-3">
                    Survey Description
                    <span class="required" aria-required="true"> * </span>
                </label>
                <div class="col-md-6">
                    <textarea class="form-control" name="surveyDescription" id="surveyDescription" readonly ><?php echo set_value('surveyDescription', $surveyDetails['description']); ?></textarea>
                    <span class="help-block"><?php echo form_error('surveyDescription') ?></span>
                </div>
            </div>

            <input type='hidden' name='surveyId' value='<?php echo $surveyDetails['id']; ?>'   aria-hidden='true'   readonly />
            <input type='hidden' name='userSurverMappingId' value='<?php echo $userSurverMappingId; ?>'   aria-hidden='true'   readonly />


            <?php for ($i = 0; $i < count($surveyQuestionDetails); $i++) { ?>
                <div class="form-group  margin-top-20 <?php echo (!empty(form_error('surveyAnswer[]'))) ? 'has-error' : ''; ?>">
                    <label class="control-label col-md-3">
                        <?php echo $surveyQuestionDetails[$i]['question_text']; ?>
                        <span class="required" aria-required="true"> * </span>
                    </label>
                    <div class="col-md-6">
                        <input class="form-control" name="surveyAnswer[]" value="<?php echo set_value('surveyAnswer[]', $answerText[$i]['answer_text']); ?>" type="text" required>
                        <span class="help-block"><?php echo form_error('surveyAnswer[]') ?></span>
                    </div>
                </div>
            <?php }
            ?>
            <br>
            <br>
            <button type="submit" class="btn green">Submit</button>
            <button type="button" class="btn blue back">Cancel</button>

        </form>


    </body>
</html>

<script>

    $(".back").click(function () {
        window.location.href = "<?php echo base_url('/index.php/Survey/takeSurvey'); ?>";
    });

</script>
