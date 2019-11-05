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

function custom_form_alter(&$form, FormStateInterface $form_state, $form_id) {

  /**
   * Apply the form_alter to a specific form #id
   * the form #id can be found through inspecting the markup
   */
    /**
     * Include a js, which was defined in example.libraries.yml
     */
    $form['#attached']['library'][] = "example/example-library";

}

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
        'wrapper' => 'edit-output-1', // This element is updated with this AJAX callback.
        //'wrapper' => array('edit-output-1', 'edit-output-2'), // This element is updated with this AJAX callback.
        'progress' => [
          'type' => 'throbber',
          'message' => $this->t('Updating Client Data...'),
        ],
      ]
    ];

    //$header = ['#','Name', 'Mail'];

    $data = [
      [['data' => 2, 'class' => 'green'], 'Name 1', 'Mail1@example.com'],
      [['data' => 2, 'class' => 'red'], 'Name N°2', 'second@example.com'],
    ];

    $form['table_test'] = array(
      '#theme' => 'table',
      //'#cache' => ['disabled' => TRUE],
      '#caption' => 'Client Overview',
    //  '#header' => $header,
      '#rows' => $data,
      '#prefix' => '<div id="edit-output-1">',
      '#suffix' => '</div>',
    );

    $data = [
      [['data' => 0, 'class' => 'green'], '1', '2'],
      [['data' => 0, 'class' => 'red'], '1', '2'],
    ];

    $form['table_test_a'] = array(
      '#theme' => 'table',
      //'#cache' => ['disabled' => TRUE],
      '#caption' => 'Client Overview',
    //  '#header' => $header,
      '#rows' => $data,
      '#prefix' => '<div id="edit-output-2">',
      '#suffix' => '</div>',
    );

    return $form;
  }

  // Get the value from example select field and fill
  // the textbox with the selected text.
  //
  public function updateClientData(array &$form, FormStateInterface $form_state) {

    if ($selectedValue = $form_state->getValue('client_select')) {
	    
	    $response = new AjaxResponse();
	    
	    $renderer = \Drupal::service('renderer');

	    // Get the text of the selected option.
	    $selectedText = $form['client_select']['#options'][$selectedValue];

	    
	    $data = [
		    [['data' => 2, 'class' => 'green'], $selectedText, 'Mail1@example.com'],
		    [['data' => 2, 'class' => 'red'], $selectedText, 'second@example.com'],
	    ];
	    
	    $form['table_test']['#rows'] = $data;

	    $renderedField = $renderer->render($form['table_test']);
	    $response->addCommand(new ReplaceCommand('#edit-output-1', $renderedField));

	    
	    $data = [
		    [['data' => 2, 'class' => 'green'], $selectedText, '0'],
		    [['data' => 2, 'class' => 'red'], $selectedText, '0'],
	    ];
	    
	    $form['table_test_a']['#rows'] = $data;

	    $renderedField = $renderer->render($form['table_test_a']);
	    $response->addCommand(new ReplaceCommand('#edit-output-2', $renderedField));
    }

    return $response;

    return $form['table_test']; 
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
