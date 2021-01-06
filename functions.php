<?php

/**
 * clean and trim input value
 *
 * @param $field_value
 * @return string
 */
function clean_input(string $field_value): string
{
    return trim(htmlspecialchars($field_value));
}

/**
 * Determines the selection from options menu
 *
 * @param $subject
 * @return string
 */
function get_subject($subject)
{
    $selected_subject = '';
    switch ($subject) {
        case 1:
        {
            $selected_subject = 'Skundas';
            break;
        }
        case 2:
        {
            $selected_subject = 'Pasiūlymas';
            break;
        }
    }

    return $selected_subject;
}

/**
 * Determines the selection from radio inputs
 *
 * @param $department
 * @return string
 */
function get_department($department)
{
    $selected_department = '';
    switch ($department) {
        case 'sales':
        {
            $selected_department = 'Pardavimų Skyrius';
            break;
        }
        case 'management':
        {
            $selected_department = 'Administracija';
            break;
        }
        case 'support':
        {
            $selected_department = 'Klientų aptarnavimo skyrius';
            break;
        }
    }

    return $selected_department;
}

