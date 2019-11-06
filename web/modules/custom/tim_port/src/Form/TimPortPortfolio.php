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

	    protected $clientOverviewData = [
		    [
			    ['Risk Tolerance:', ''],
			    ['Net Portfolio Value:', ''],
			    ['Inception Date:', ''],
		    ],
		    [
			    ['Risk Tolerance:', 'Category 2 - Neutral'],
			    ['Net Portfolio Value:', '$1,377,977'],
			    ['Inception Date:', '5/26/2006'],
		    ],
		    [
                            ['Risk Tolerance:', 'Category 3 - Risky'],
                            ['Net Portfolio Value:', '$3,122,432'],
                            ['Inception Date:', '1/18/1999'],
                    ],
	    ];

protected $portfolioReviewData = [
		[ 
			['Category', 'Current','Target','Difference','Dollar Diff' ],
			['Risky', '','','','' ],
			['Less Risky', '','','','' ],
			['Equity Risk Units', '','','','' ],
			['Asset Class', 'Current','Target','Difference','Dollar Diff' ],
			['Cash & Cash Equivalents', '','','','' ],
			['U.S. Treasury / Agency', '','','','' ],
			['Municipal', '','','','' ],
			['Investment Grade Corporate', '','','','' ],
			['Non-U.S. Gove', '','','','' ],
			['Core Bonds', '','','','' ],
			['TIPS', '','','','' ],
			['Reinsurance', '','','','' ],
			['Non-Agency RMBS', '','','','' ],
			['Floating Rate', '','','','' ],
			['Inflation-Protected', '','','','' ],
			['Real Estate', '','','','' ],
			['US Equity', '','','','' ],
			['Foreign Developed Equity', '','','','' ],
			['Emerging Market Equity', '','','','' ],
			['Equity', '','','','' ],
			['High Yield', '','','','' ],
			['Emerging Market Debt', '','','','' ],
			['Timber', '','','','' ],
			['Utilities', '','','','' ],
			['Pipelines', '','','','' ],
			['Price Sensitive', '','','','' ],
			['Commodities', '','','','' ],
		],
		[
                        ['Category', 'Current','Target','Difference','Dollar Diff' ],
                        ['Risky', '48%','47%','1%','$12,320' ],
                        ['Less Risky', '52%','53%','-1%','($12,320)' ],
                        ['Equity Risk Units', '49','47','2','' ],
                        ['Asset Class', 'Current','Target','Difference','Dollar Diff' ],
                        ['Cash & Cash Equivalents', '4.8%','5.0%','-0.2%','($2,961)' ],
                        ['U.S. Treasury / Agency', '9.4%','7.0%','2.4%','$33,365' ],
                        ['Municipal', '13.6%','31.0%','-17.4%','($240,037)' ],
                        ['Investment Grade Corporate', '17.7%','5.0%','12.7%','$174,487' ],
                        ['Non-U.S. Gove', '0.5%','3.0%','-2.5%','($34,482)' ],
                        ['Core Bonds', '41.2%','46.0%','-4.8%','($66,667' ],
                        ['TIPS', '2.0%','0.0%','2.0%','$27,985' ],
                        ['Reinsurance', '1.3%','0.0%','1.3%','$18,415' ],
                        ['Non-Agency RMBS', '2.8%','0.0%','2.8%','$38,467' ],
                        ['Floating Rate', '0.0%','2.0%','-2.0%','($27,560)' ],
                        ['Inflation-Protected', '6.2%','2.0%','4.2%','%57,308' ],
                        ['Real Estate', '0.0%','1.0%','-1.0%','($13,780)' ],
                        ['US Equity', '30.9%','26.0%','4.9%','$66,912' ],
                        ['Foreign Developed Equity', '5.1%','7.0%','-1.9%','($26,195)' ],
                        ['Emerging Market Equity', '5.3%','7.0%','-1.7%','($23,806)' ],
                        ['Equity', '41.2%','40.0%','1.2%','$16,910' ],
                        ['High Yield', '6.1%','3.0%','3.1%','$42,180' ],
                        ['Emerging Market Debt', '0.6%','1.0%','-0.4%','($5,430)' ],
                        ['Timber', '0.0%','1.0%','-1.0%','($13,780)' ],
                        ['Utilities', '0.0%','0.0%','0.0%','$0' ],
                        ['Pipelines', '0.0%','1.0%','-1.0%','($13,780)' ],
                        ['Price Sensitive', '0.0%','0.0%','0.0%','$0' ],
                        ['Commodities', '0.0%','2.0%','-2.0%','($27,560)' ],
		],
		[
                        ['Category', 'Current','Target','Difference','Dollar Diff' ],
                        ['Risky', '8%','7%','3%','$82,320' ],
                        ['Less Risky', '32%','23%','-8%','($25,720)' ],
                        ['Equity Risk Units', '89','27','8','' ],
                        ['Asset Class', 'Current','Target','Difference','Dollar Diff' ],
                        ['Cash & Cash Equivalents', '2.7%','1.0%','-2.2%','($8,961)' ],
                        ['U.S. Treasury / Agency', '2.4%','8.0%','3.4%','$23,365' ],
                        ['Municipal', '13.6%','31.0%','-17.4%','($240,037)' ],
                        ['Investment Grade Corporate', '17.7%','5.0%','12.7%','$174,487' ],
                        ['Non-U.S. Gove', '0.5%','3.0%','-2.5%','($34,482)' ],
                        ['Core Bonds', '41.2%','46.0%','-4.8%','($66,667' ],
                        ['TIPS', '2.0%','0.0%','2.0%','$27,985' ],
                        ['Reinsurance', '1.3%','0.0%','1.3%','$18,415' ],
                        ['Non-Agency RMBS', '2.8%','0.0%','2.8%','$38,467' ],
                        ['Floating Rate', '0.0%','2.0%','-2.0%','($27,560)' ],
                        ['Inflation-Protected', '6.2%','2.0%','4.2%','%57,308' ],
                        ['Real Estate', '0.0%','1.0%','-1.0%','($13,780)' ],
                        ['US Equity', '30.9%','26.0%','4.9%','$66,912' ],
                        ['Foreign Developed Equity', '5.1%','7.0%','-1.9%','($26,195)' ],
                        ['Emerging Market Equity', '5.3%','7.0%','-1.7%','($23,806)' ],
                        ['Equity', '41.2%','40.0%','1.2%','$16,910' ],
                        ['High Yield', '6.1%','3.0%','3.1%','$42,180' ],
                        ['Emerging Market Debt', '0.6%','1.0%','-0.4%','($5,430)' ],
                        ['Timber', '0.0%','1.0%','-1.0%','($13,780)' ],
                        ['Utilities', '0.0%','0.0%','0.0%','$0' ],
                        ['Pipelines', '0.0%','1.0%','-1.0%','($13,780)' ],
                        ['Price Sensitive', '0.0%','0.0%','0.0%','$0' ],
                        ['Commodities', '0.0%','2.0%','-2.0%','($27,560)' ],
                ]

	];

protected $accountActionPanelData = [
	[
		['Asset', 'Ticker', '$ Account', 'Max Amount', 'Action'],
		['','','$0','$0.00', 'Sell'],
		['','','$0','$0.00', 'Sell'],
		['','','$0','$0.00', 'Sell'],
		['','','$0','$0.00', 'Sell'],
	]
];


function custom_form_alter(&$form, FormStateInterface $form_state, $form_id) {
  /**
   * Apply the form_alter to a specific form #id
   * the form #id can be found through inspecting the markup
   */
    /**
     * Include a js, which was defined in example.libraries.yml
     */
    $form['#attached']['library'][] = "css/tim-port.css";

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
      //'#title' => $this->t('Client Overview'),
      '#empty_option' => $this->t('- Select a client -'),
      '#options' => [
        '1' => $this->t('Abram, Ruth and Herbert Teitelbaum'),
        '2' => $this->t('Bankster, Miles and Catherine Cash'),
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

    $form['client_overview'] = array(
      '#theme' => 'table',
      //'#cache' => ['disabled' => TRUE],
      '#caption' => 'Client Overview',
    //  '#header' => $header,
      '#rows' => $this->clientOverviewData[0],
      '#prefix' => '<div id="edit-client-overview">',
      '#suffix' => '</div>',
    );

    $form['portfolio_breakdown'] = array(
      '#theme' => 'table',
      //'#cache' => ['disabled' => TRUE],
      '#caption' => 'Portfolio Breakdown',
    //  '#header' => $header,
      '#rows' => $this->portfolioReviewData[0],
      '#prefix' => '<div id="edit-portfolio-breakdown">',
      '#suffix' => '</div>',
    );

    $form['account_action_panel'] = array(
      '#theme' => 'table',
      '#caption' => 'Account Action Panel',
      '#rows' => $this->accountActionPanelData[0],
      '#prefix' => '<div id="account-action-panel">',
      '#suffix' => '</div>',
    );

    $form['status_overview'] = array(
	    '#type' => 'table',
	    '#caption' => $this->t('Status Overview'),
    );
    
    $form['status_overview'][1]['manager'] = array(
	    '#type' => 'select',
	    '#title' => $this->t('Name'),
	    '#options'=>array( 0 => t('(All)'), 1 => t('Mike')),
	    '#title_display' => 'invisible',
    );
  
    $form['status_overview'][1]['manager_desc'] = array(
	    '#type' => 'text',
            '#plain_text' => '<- Select Port Mgr',
    );

    $form['status_overview'][2]['associate'] = array(
            '#type' => 'select',
            '#title' => $this->t('Name'),
            '#options'=>array( 0 => t('(All)'), 1 => t('Mike')),
            '#title_display' => 'invisible',
    );

    $form['status_overview'][2]['associate_desc'] = array(
            '#type' => 'text',
            '#plain_text' => '<- Select Associate',
    );

    $form['status_overview'][3]['risk_tolerance'] = array(
            '#type' => 'select',
            '#title' => $this->t('Name'),
            '#options'=>array( 0 => t('(All)'), 1 => t('Category 2 - Neutral')),
            '#title_display' => 'invisible',
    );

    $form['status_overview'][3]['risk_tolerance_desc'] = array(
            '#type' => 'text',
            '#plain_text' => '<- Select Risk Tolerance',
    );

    $form['status_overview'][4]['status_overview_pm'] = array(
            '#type' => 'text',
            '#plain_text' => 'PM: Ian Yankwaitt',
    );

    $form['status_overview'][4]['status_overview_associate'] = array(
            '#type' => 'text',
            '#plain_text' => 'Assoc:Claire Brennan',
    );

    $allocationData = [
	    ['Client Specific Targets:', 'NO'],
	    ['Taxable Assests Adjustment:', 'NO'],
	    ['Tax Adjustment Toggle', 'OFF']
    ];

    $form['allocation_targeting'] = array(
            '#type' => 'table',
	    '#caption' => $this->t('Allocation Targetting   Impl Statge: Monitor'),
	    '#rows' => $allocationData,
    );

    $downsideRiskEstData = [
	    ['2008', 'Peak to Trough'],
	    ['-18%', '-24%'],
    ];

    $form['downside_risk_est'] = array(
	    '#type' => 'table',
	    '#caption' => $this->t('Downside Risk Estimation'),
	    '#rows' => $downsideRiskEstData,
    );

    $interestRiskRateData = [
	    ['Rates up 3% w/ Equity Flat'],
	    ['-6%'],
    ];

    $form['interest_risk_rate'] = array(
	    '#type' => 'table',
	    '#caption' => $this->t('Interest Rate Risk'),
	    '#rows' => $interestRiskRateData,
    );

    $returnData = [
	    [
		    array( '#type' => 'text', '#markup' => $this->t('Start Date'),),
		    array( '#type' => 'text', '#markup' => '8/21/2019',),
		    array( '#type' => 'text', '#markup' => '8/23/2019',)
	    ]
    ];

    $form['return'] = array(
	    '#type' => 'table',
	    //'#rows' => $returnData,
    );

    $form['return'][1]['start_date'] = array(
	    '#type' => 'text',
	    '#markup' => $this->t('Return as of'),
    );

    $form['return'][1]['date_1'] = array(
	    '#type' => 'text',
	    '#markup' => '8/21/2019',
    );

    $form['return'][1]['date_2'] = array(
	    '#type' => 'text',
	    '#markup' => '8/23/2019',
    );

    $form['return'][2]['start_date_header'] = array(
            '#type' => 'text',
            '#markup' => $this->t('Start Date'),
    );

    $form['return'][2]['portfolio_header'] = array(
            '#type' => 'text',
            '#markup' => 'Portfolio',
    );

    $form['return'][2]['portfolio_select'] = array(
            '#type' => 'select',
            '#title' => $this->t('Name'),
            '#options'=>array( 0 => t('S&P 500TR'), 1 => t('DOW')),
            '#title_display' => 'invisible',
    );

    $form['return'][3]['inception'] = array(
	    '#type' => 'text',
	    '#markup' => 'Since Client Inception',
    );

    $form['return'][3]['inception_portfolio'] = array(
	    '#type' => 'text',
	    '#markup' => '104.6%',
    );

    $form['return'][3]['inception_portfolio_select'] = array(
	    '#type' => 'text',
	    '#markup' => '196.9%',
    );

    $form['return'][4]['ytd'] = array(
            '#type' => 'text',
            '#markup' => 'YTD',
    );

    $form['return'][4]['ytd_portfolio'] = array(
            '#type' => 'text',
            '#markup' => '10.1%',
    );

    $form['return'][4]['ytd_portfolio_select'] = array(
            '#type' => 'text',
            '#markup' => '16.6%',
    );

    $form['return'][5]['qtd'] = array(
            '#type' => 'text',
            '#markup' => 'QTD',
    );

    $form['return'][5]['qtd_portfolio'] = array(
            '#type' => 'text',
            '#markup' => '-0.1%',
    );

    $form['return'][5]['qtd_portfolio_select'] = array(
            '#type' => 'text',
            '#markup' => '-2.5%',
    );

    $fixedIncomeAnalyticsData = [
            ['Metric', 'Current', 'New'],
            ['Portfolio Duration (cash included)', '3.67', '3.67'],
    ];

    $form['fixed_income_analytics'] = array(
            '#type' => 'table',
            '#caption' => $this->t('Fixed Income Analytics'),
            '#rows' => $fixedIncomeAnalyticsData,
    );

    $portfolioTaxStatusData = [
            ['Type of Account', '% Of Portfolio', '$ Value'],
            ['Taxable', '58.3%', '$803,265'],
            ['Tax-deferred', '41.7%', '$574,732'],
    ];

    $form['portfolio_tax_status'] = array(
            '#type' => 'table',
            '#caption' => $this->t('Portfolio Tax Status'),
            '#rows' => $portfolioTaxStatusData,
    );

    $assestSubclassBreakdownData = [
            ['Bonds', 'Current', 'New'],
            ['Short-Term, High Quality Bonds', '12.9%', '12.9%'],
            ['Leveraged Muni Bonds', '1.9%', '1.9%'],
            ['Mortgage Funds (DBLTX, TGLMX, TGMNX)', '0.0%', ''],
            ['Risky Mortgages', '1.6%', ''],
    ];

    $form['asset_subclass_breakdown'] = array(
            '#type' => 'table',
            '#caption' => $this->t('Asset Subclass Breakdown'),
            '#rows' => $assestSubclassBreakdownData,
    );

    $form['long_term_trading_notes'] = array(
            '#type' => 'table',
            '#caption' => $this->t('Long Term Trading Notes'),
    );

    $form['long_term_trading_notes'][1]['textarea'] = array(
	    '#type' => 'textarea',
	    '#resizable' => 'none',
	    '#rows' => '8',
	    '#value' => 'Harvest taxlosses aggressively'.PHP_EOL.'No more tax loss carry forward',
    );

    $form['short_term_trading_notes'] = array(
            '#type' => 'table',
            '#caption' => $this->t('Short Term Trading Notes'),
    );

    $form['short_term_trading_notes'][1]['textarea'] = array(
            '#type' => 'textarea',
            '#resizable' => 'none',
            '#rows' => '8',
            '#value' => '0',
    );

    $form['help_me'] = array(
            '#type' => 'table',
            '#caption' => $this->t('Help Me!'),
    );

    $form['help_me'][1]['link'] = array(
            '#type' => 'text',
            '#markup' => '<a href="">Help File</a>',
    );

    $customerHistoryData = [
	    ['Date Action','Buy Action',                                   'Sell Action','Purpose','PM'],
            ['2019/07/10',  '25 NIQ, 40 JPST {51, -6%}',                    '15 IVV, 20 FIPDX','Rebalance','COB'],
            ['2019/05/24',  '37 VRIG {50, -6%}',                            '30 NBB','Rebalance','RG'],
            ['2019/04/11',  '75 VWEAX {50, -7%}',                           '','Rebalance','COB'],
            ['2019/02/13',  '{53, -7%}',                                     '33 IJS, 11 IUSV, 14 IVV','Rebalance','IY'],
            ['2019/01/23',  '13 IVV {51, -8%}',                             '55 FUAMX','Rebalance','IY'],
            ['2019/01/03',  '20 NUV, 53 DGS, 11 IUSV {52, -7%}',            '14 FTFMX, 40 FMNDX','Tax harvest, Rebalance','BB'],
            ['2018/10/16',  '11 DGS {52, -7%}',                             '','Rebalance','IY'],
            ['2018/08/30',  '10 DGS {51, -7%}',                             '','Rebalance','IY'],
            ['2018/06/19',  '24 JQC',                                       '44 FSBAX','Rebalance','IY'],
            ['2018/04/10',  '15 FSBAX, 15 FSIYX, 15 IXUS, 40 NXQ {51, -7%}','34 FFRHX, 25 NRK','Rebalance','IY'],
            ['2018/03/13',  '20 SRRIX {50, -7%}',                           '','Rebalance','BB'],
            ['2018/01/05',  '20 FSIYX, 30 VRIG, 25 FSBAX {52, -8%}',        '52 PYHRX','Rebalance','IY'],
            ['2017/12/31',  '26 NRK, 40 FMNDX, 10IJS {52, -7%}',            '20 FAX','Rebalance','IY'],
            ['2017/11/19',  '20 IJS, 30 FIBAX, 30 FSBAX {50, -7%}',         '60 DBLTX, 20 FFRHX','Deploying cash','IY'],
            ['2017/11/01',  '50 FIBAX',                                      '54 ANGIX','Rebalance','IY'],
            ['2017/10/27',  '50 VNYUX, 25 FSBAX {54, -7%}',                 '23 IVE, 20 FAX 21.6 NBD','Rebalance, risk -','IY'],
            ['2017/10/04',  '100 DTCPX {54, -7%}',                          '26 HYG, 25 FFRHX','Rebalance','IY'],
            ['2017/09/21',  '23 IVE, 40 FFRHX, 60 DBLTX {53, -7%}',         '35 JQC, 23 IVV, 24 NAN','Rebalance','IY'],
            ['2017/09/14',  '{54, -7%}',                                    '25 PYHRX','Rebalance','IY'],
            ['2017/09/10',  '{53, -7%}',                                    '11 IVV, 7.8 HYG','Risk -','IY'],
    
    ];

    $form['customer_history'] = array(
            '#type' => 'table',
            //'#caption' => $this->t('Asset Subclass Breakdown'),
            '#rows' => $customerHistoryData,
    );

    return $form;
  }

  // Get the value from example select field and fill
  // the textbox with the selected text.
  //
  public function updateClientData(array &$form, FormStateInterface $form_state) {

	  if($form_state->getValue('client_select') == null) {
		  \Drupal::logger('tim-port')->notice('Null: ');
            $response = new AjaxResponse();
            $renderer = \Drupal::service('renderer');

            // Get the text of the selected option.
            $selectedText = $form['client_select']['#options'][$selectedValue];

            $form['client_overview']['#rows'] = $this->clientOverviewData[0];

            $renderedField = $renderer->render($form['client_overview']);
            $response->addCommand(new ReplaceCommand('#edit-client-overview', $renderedField));

            $form['portfolio_breakdown']['#rows'] = $this->portfolioReviewData[0];

            $renderedField = $renderer->render($form['portfolio_breakdown']);
            $response->addCommand(new ReplaceCommand('#edit-portfolio-breakdown', $renderedField));
            return $response;
	  }


    if ($selectedValue = $form_state->getValue('client_select')) {
	    

	    \Drupal::logger('tim-port')->notice('Selected Value: "'.$selectedValue.'"');

	    $response = new AjaxResponse();
	    
	    $renderer = \Drupal::service('renderer');

	    // Get the text of the selected option.
	    $selectedText = $form['client_select']['#options'][$selectedValue];

	    $form['client_overview']['#rows'] = $this->clientOverviewData[$selectedValue];

	    $renderedField = $renderer->render($form['client_overview']);
	    $response->addCommand(new ReplaceCommand('#edit-client-overview', $renderedField));

	    $form['portfolio_breakdown']['#rows'] = $this->portfolioReviewData[$selectedValue];

	    $renderedField = $renderer->render($form['portfolio_breakdown']);
	    $response->addCommand(new ReplaceCommand('#edit-portfolio-breakdown', $renderedField));
            return $response;
    }
    //return $form['table_test']; 
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
