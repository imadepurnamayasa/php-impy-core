<?php

use Imadepurnamayasa\PhpInti\Html\Builder\Form;

require_once __DIR__ . '/../../../vendor/autoload.php';

// Example usage:
$form = new Form();

// Generate a text input
echo $form->textInput('username', 'Username:', 'JohnDoe');
echo $form->hr();

// Generate a textarea
echo $form->textarea('message', 'Message:', 'Type your message here...');
echo $form->hr();

// Generate a select dropdown
$options = array(
    '1' => 'Option 1',
    '2' => 'Option 2',
    '3' => 'Option 3'
);
echo $form->select('dropdown', 'Select Option:', $options, '2');
echo $form->hr();

// Generate a checkbox
echo $form->checkbox('agree', 'I agree to the terms', 'agree', true);
echo $form->hr();

// Generate radio buttons
$radioOptions = array(
    'male' => 'Male',
    'female' => 'Female'
);
echo $form->radio('gender', 'Gender:', $radioOptions, 'male');