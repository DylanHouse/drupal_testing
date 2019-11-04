<?php
/**
 * @file
 * Contains \Drupal\resume\Form\ResumeForm.
 */
namespace Drupal\tim_port\Form;

use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;
use Drupal\Core\Ajax\AjaxResponse;
use Drupal\Core\Ajax\ReplaceCommand;

class TimPortPortfolio extends FormBase {
   /**
   * {@inheritdoc}
   */
  public function getFormId() {
    return 'default_form';
  }

  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state) {

    // Create a select field that will update the contents
    // of the textbox below.
    $form['client_select'] = [
      '#type' => 'select',
      '#title' => $this->t('Client Overview'),
      '#empty_option' => $this->t('- Select a client -'),
      '#options' => [
        '1' => $this->t('Anna'),
        '2' => $this->t('Bailey'),
      ],
      '#ajax' => [
        'callback' => '::updateClientData', // don't forget :: when calling a class method.
        'disable-refocus' => FALSE, // Or TRUE to prevent re-focusing on the triggering element.
        'event' => 'change',
        'wrapper' => 'edit-output', // This element is updated with this AJAX callback.
        'progress' => [
          'type' => 'throbber',
          'message' => $this->t('Updating Client Data...'),
        ],
      ]
    ];

    // Create a textbox that will be updated
    // when the user selects an item from the select box above.
    $form['output'] = [
      '#type' => 'textfield',
      '#size' => '60',
      '#disabled' => TRUE,
      '#value' => 'Hello, Drupal!!1',
      '#prefix' => '<div id="edit-output">',
      '#suffix' => '</div>',
    ];

    $form['client_overview'] = array(
                        '#type' => 'table',
                        '#caption' => $this->t('Client Overview'),
                        //'#header' => array(
                                //$this->t('Name'),
                                //$this->t('Phone'),
                        //),
		);

    $form['client_overview'][1]['risk_tolerance_header'] = array(
	    '#plain_text'=> 'Risk Tolerance:',
    );

    $form['client_overview'][1]['risk_tolerance_value'] = array(
	    '#plain_text'=> '',
    );

    $form['client_overview'][2]['net_portfolio_value_header'] = array(
            '#plain_text'=> 'Net Portfolio Value:',
    );

    $form['client_overview'][2]['net_portfolio_value_value'] = array(
            '#plain_text'=> '',
    );

    $form['client_overview'][3]['inception_date_header'] = array(
            '#plain_text'=> 'Inception Date:',
    );

    $form['client_overview'][3]['inception_date_value'] = array(
            '#plain_text'=> '',
    );
    return $form;
  }

  // Get the value from example select field and fill
  // the textbox with the selected text.
  public function updateClientData(array &$form, FormStateInterface $form_state) {

	  $response = new AjaxResponse();
	  $response->addCommand(new InvokeCommand(NULL, 'myAjaxCallback', ['This is the new text!']));
	  return $response;
	  
    // Prepare our textfield. check if the example select field has a selected option.
    if ($selectedValue = $form_state->getValue('client_select')) {
        // Get the text of the selected option.
        $selectedText = $form['client_select']['#options'][$selectedValue];
        // Place the text of the selected option in our textfield.
	$form['output']['#value'] = $selectedText;

	$form['client_overview'][1]['risk_tolerance_value']['#plain_text'] = 'Test'; 
    }
    // Return the prepared textfield.
    return [$form['output'],$form['client_overview'][1]];
  }

  /**
   * {@inheritdoc}
   */
  public function validateForm(array &$form, FormStateInterface $form_state) {
    parent::validateForm($form, $form_state);
  }

  /**
   * {@inheritdoc}
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {
    // Display result.
    foreach ($form_state->getValues() as $key => $value) {
      \Drupal::messenger()->addStatus($key . ': ' . $value);
    }
  }

}
