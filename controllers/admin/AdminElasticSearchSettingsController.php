<?php
/**
 * 2015 Invertus, UAB
 *
 * NOTICE OF LICENSE
 *
 * This file is proprietary and can not be copied and/or distributed
 * without the express permission of INVERTUS, UAB
 *
 *  @author    INVERTUS, UAB www.invertus.eu <help@invertus.eu>
 *  @copyright 2015 INVERTUS, UAB
 *  @license   --
 *  International Registered Trademark & Property of INVERTUS, UAB
 */

class AdminElasticSearchSettingsController extends ModuleAdminController
{
	public function __construct()
	{
		$this->meta_title = $this->l('Elastic Search module settings');

		parent::__construct();

		$this->token = Tools::getAdminTokenLite('AdminModules');
		$this->table = 'Configuration';
		$this->class = 'Configuration';

		self::$currentIndex = 'index.php?controller=AdminModules&configure='.$this->module->name;

		$this->initOptionFields();
	}

	public function updateOptions()
	{
		$this->processUpdateOptions();
	}

	private function initOptionFields()
	{
		$this->fields_options = array(
			'main_settings' => array(
				'title' => $this->l('Elastic Search settings'),
				'fields' => array(
					'ELASTICSEARCH_SEARCH' => array(
						'type' => 'bool',
						'title' => $this->l('Instant search'),
						'hint' => $this->l('Instant search block under search input')
					),
					'ELASTICSEARCH_AJAX_SEARCH' => array(
						'type' => 'bool',
						'title' => $this->l('Ajax search'),
						'hint' => $this->l('Search results will appear in the page immediately as the user types in search block')
					),
					'ELASTICSEARCH_SEARCH_COUNT' => array(
						'title' => $this->l('Instant search results count'),
						'size' => 3,
						'cast' => 'intval',
						'validation' => 'isInt',
						'type' => 'text',
						'hint' => $this->l('Number of records in search results list under search input'),
						'suffix' => $this->l('results')
					),
					'ELASTICSEARCH_SEARCH_MIN' => array(
						'title' => $this->l('Min. word length'),
						'size' => 3,
						'cast' => 'intval',
						'validation' => 'isUnsignedInt',
						'type' => 'text',
						'hint' => $this->l('Number of symbols typed into search input when instant search starts working'),
						'suffix' => $this->l('symbols')
					),
					'ELASTICSEARCH_HOST' => array(
						'title' => $this->l('Service host'),
						'size' => 3,
						'validation' => 'isUrl',
						'type' => 'text',
						'hint' => $this->l('URL:PORT'),
						'required' => true
					)

				),
				'submit' => array('title' => $this->l('Save'))
			)
		);
	}
}