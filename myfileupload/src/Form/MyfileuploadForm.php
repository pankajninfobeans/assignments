<?php

namespace Drupal\myfileupload\Form;

use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;
use Drupal\Core\File\Entity;
use Drupal\file\Entity\File;
use Drupal\file\FileStorage;

/**
 * Class MyfileuploadForm.
 *
 * @package Drupal\myfileupload\Form
 */
class MyfileuploadForm extends FormBase {

  /**
   * {@inheritdoc}
   */
  public function getFormId() {
    return 'myfileupload_form';
  }

  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state) {

    $form = array(
      '#attributes' => array('enctype' => 'multipart/form-data'),
    );
    
    $validators = array(
      'file_validate_extensions' => array('txt'),
    );
    $form['my_file'] = array(
      '#type' => 'managed_file',
      '#name' => 'my_file',
      '#title' => t('File *'),
      '#size' => 20,
      '#description' => t('.txt format only'),
      '#upload_validators' => $validators,
      '#upload_location' => 'public://my_files/',
    );

    $form['submit'] = [
        '#type' => 'submit',
        '#value' => 'save',
        //'#value' => t('Submit'),
    ];

    return $form;
  }
  
  /**
    * {@inheritdoc}
    */
  public function validateForm(array &$form, FormStateInterface $form_state) {
    
    if ($form_state->getValue('my_file') == null) {
      $form_state->setErrorByName('my_file', $this->t('Please upload a valid file!'));
    }
    $formfile = $form_state->getValue('my_file');
    
    if ($formfile) {

      $oNewFile = File::load(reset($formfile))->getFileUri();;
      $fileContent = file_get_contents($oNewFile);

      if (strpos($fileContent, "fire") !== false) {
        $form_state->setErrorByName('my_file', $this->t('File contains "fire" word!'));
      }
    }
    parent::validateForm($form, $form_state);
  }

  /**
   * {@inheritdoc}
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {
   
  }
     

}
