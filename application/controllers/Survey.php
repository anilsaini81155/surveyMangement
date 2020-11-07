<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Survey extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('Global_model');
    }

    public function createSurveys() {
        $this->load->library('form_validation');
        $this->load->view('createSurvey');
    }

    public function insert() {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('surveyName', 'Survey Name', 'required|trim|max_length[160]|min_length[10]');
        $this->form_validation->set_rules('surveyDescription', 'Survery Description', 'required|trim|min_length[10]');
        $this->form_validation->set_rules('getAudienceType', 'Audience Type', 'required');

        if ($this->form_validation->run() === TRUE) {
            $surveyQuestion = $this->input->post('surveyQuestion');
            $seesionData = getSessionDetails();
            $insertData = array(
                'name' => $this->input->post('surveyName'),
                'description' => $this->input->post('surveyDescription'),
                'audience_type' => $this->input->post('getAudienceType'),
                'no_of_questions' => count($surveyQuestion),
                'is_deleted' => 0,
                'created_by_id' => $seesionData['id'],
                'created_datetime' => date('Y-m-d H:i:s')
            );

            $surveyId = $this->Global_model->insert($insertData, 'surveys', TRUE);

            for ($i = 0; $i < count($surveyQuestion); $i++) {
                $insertQuestionData = array(
                    'survey_id' => $surveyId,
                    'question_text' => $surveyQuestion[$i],
                    'created_by_id' => $seesionData['id'],
                    'created_datetime' => date('Y-m-d H:i:s')
                );

                $this->Global_model->insert($insertQuestionData, 'survey_questions');
            }


            $reuqiredIds = $this->Global_model->select_multiple('id', array('age' => $this->input->post('getAudienceType')), 'user');

            for ($i = 0; $i < count($reuqiredIds); $i++) {

                $dataToBeInsertedInMapping = array(
                    'user_id' => $reuqiredIds[$i]['id'],
                    'survey_id' => $surveyId,
                    'status' => 1
                );

                $this->Global_model->insert($dataToBeInsertedInMapping, 'user_surver_mapping');
            }


            redirect('Survey/listSurveys');
        } else {
            $this->createSurveys();
        }
    }

    public function listSurveys() {
        $data['content'] = $this->Global_model->select_multiple('id,name,description,audience_type,no_of_questions', array('is_deleted' => 0), 'surveys', 'created_datetime');
        $this->load->view('listSurveys', $data);
    }

    public function delete($id) {
        $this->Global_model->update(array('is_deleted' => 1), array('id' => $id), 'surveys');
        $data['content'] = $this->Global_model->select_multiple('id,name,description,audience_type,no_of_questions', array('is_deleted' => 0), 'surveys', 'created_datetime');
        $this->load->view('listSurveys', $data);
    }

    public function takeSurvey() {
        $sessionDetails = getSessionDetails();
        if ($sessionDetails) {
            $data['details'] = $this->Global_model->select_multiple('id,survey_id,status,user_id', array('user_id' => $sessionDetails['id']), 'user_surver_mapping');
            $this->load->view('takeSurveysList', $data);
        } else {
            $data['details'] = NULL;
            $this->load->view('takeSurveysList', $data);
        }
    }

    public function update($id) {
        $this->load->library('form_validation');
        $surveyId = $this->Global_model->select_single('survey_id', array('id' => $id), 'user_surver_mapping');
        $surveyId = $surveyId['survey_id'];
        $data['surveyDetails'] = $this->Global_model->select_single('', array('id' => $surveyId), 'surveys');
        $data['surveyQuestionDetails'] = $this->Global_model->select_multiple('question_text', array('survey_id' => $surveyId), 'survey_questions');
        $data['userSurverMappingId'] = $id;
        $seesionData = getSessionDetails();
        if ($this->Global_model->select_single('', array('survey_id' => $surveyId, 'user_id' => $seesionData['id']), 'survey_answers_user')) {
            $data['answerText'] = $this->Global_model->select_multiple('answer_text', array('survey_id' => $surveyId, 'user_id' => $seesionData['id']), 'survey_answers_user');
        } else {
            $data['answerText'] = NULL;
        }


        $this->load->view('takeSurvey', $data);
    }

    public function storeSurveyData() {
        $this->load->library('form_validation');
        $surveyAnswer = $this->input->post('surveyAnswer');

        $surveyQuestionDetails = $this->Global_model->select_multiple('id', array('survey_id' => $this->input->post('surveyId')), 'survey_questions');
        $seesionData = getSessionDetails();


        if ($this->Global_model->select_single('', array('survey_id' => $this->input->post('surveyId'), 'user_id' => $seesionData['id']), 'survey_answers_user')) {
            for ($i = 0; $i < count($surveyAnswer); $i++) {
                $updateData = array(
                    'answer_text' => $surveyAnswer[$i],
                    'created_datetime' => date('Y-m-d H:i:s')
                );

                $this->Global_model->update($updateData, array('survey_id' => $this->input->post('surveyId'), 'question_id' => $surveyQuestionDetails[$i]['id'], 'user_id' => $seesionData['id'],), 'survey_answers_user');
            }
        } else {
            for ($i = 0; $i < count($surveyAnswer); $i++) {
                $insertData = array(
                    'survey_id' => $this->input->post('surveyId'),
                    'question_id' => $surveyQuestionDetails[$i]['id'],
                    'user_id' => $seesionData['id'],
                    'answer_text' => $surveyAnswer[$i],
                    'created_datetime' => date('Y-m-d H:i:s')
                );

                $this->Global_model->insert($insertData, 'survey_answers_user');
            }
        }
        $this->Global_model->update(array('status' => 2), array('id' => $this->input->post('userSurverMappingId')), 'user_surver_mapping');
        $this->takeSurvey();
    }

}
