<?php
/**
 * Requires the "PHP Email Form" library
 * The library should be uploaded to: vendor/php-email-form/php-email-form.php
 */

// Substitua contact@example.com pelo seu endereço de e-mail real
$receiving_email_address = 'thiagotellini@gmail.com';

if (file_exists($php_email_form = 'vendor/php-email-form/php-email-form.php')) {
    include($php_email_form);
} else {
    die('Unable to load the "PHP Email Form" Library!');
}

$contact = new PHP_Email_Form;
$contact->ajax = true;

$contact->to = $receiving_email_address;
$contact->from_name = $_POST['name'];
$contact->from_email = $_POST['email'];
$contact->subject = $_POST['subject'];

// Adicione as mensagens
$contact->add_message($_POST['name'], 'From');
$contact->add_message($_POST['email'], 'Email');
$contact->add_message($_POST['message'], 'Message', 10);

echo $contact->send();
?>
