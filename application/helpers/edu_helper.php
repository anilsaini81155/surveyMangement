<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

function getAge() {
    $a = array(
        '1' => 'Below 18',
        '2' => 'Between 18 to 30',
        '3' => 'Between 30 to 50',
        '4' => 'Between 50 to 75'
    );
    return $a;
}

function getGender() {
    $a = array(
        '1' => 'Male',
        '2' => 'Female'
    );
    return $a;
}

function getUserType() {
    $a = array(
        '1' => 'Respondent',
        '2' => 'Co-Ordinator'
    );
    return $a;
}

function getGenderValue($a) {
    if ($a == 1) {
        return "Male";
    } elseif ($a == 2) {
        return "Female";
    } else {
        return "Undefined";
    }
}

function getUserTypeValue($a) {
    if ($a == 1) {
        return "Respondent";
    } elseif ($a == 2) {
        return "Co-Ordinator";
    } else {
        return "Undefined";
    }
}

function getSessionDetails() {
    $ci = & get_instance();
    $session = FALSE;
    if ($ci->session->userdata('sessionData')) {
        $session = $ci->session->userdata('sessionData');
    }
    return $session;
}

function getAudienceType() {
    $a = array(
        '1' => 'Age Below 18',
        '2' => 'Age Between 18 to 30',
        '3' => 'Age Between 30 to 50',
        '4' => 'Age Between 50 to 75'
    );
    return $a;
}

function getAudienceTypeValue($a) {
    if ($a == 1) {
        return "Age Below 18";
    } elseif ($a == 2) {
        return "Age Between 18 to 30";
    } elseif ($a == 3) {
        return "Age Between 30 to 50";
    } else {
        return "Age Between 50 to 75";
    }
}

function getSurveyDetails($id) {
    $CI = & get_instance();
    if ($CI->db->query("SELECT `name`,`description`,`no_of_questions` FROM `surveys` WHERE `id` ='" . $id . "' AND `is_deleted` = '" . 0 . "'")) {
        $details = $CI->db->query("SELECT `name`,`description`,`no_of_questions` , `created_by_id` FROM `surveys` WHERE `id` ='" . $id . "' AND `is_deleted` = '" . 0 . "'")->row_array();
        return $details;
    } else {
        return NULL;
    } 
}
