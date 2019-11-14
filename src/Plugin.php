<?php
/**
 * AdLdap plugin for Craft CMS 3.x
 *
 * AdLdap settings page.
 *
 * @link      http://dmsylvio.com
 * @copyright Copyright (c) 2019 Sylvio Neto
 */
namespace dmsylvio\adldap;

use Craft;
use dmsylvio\adldap\models\Settings as SettingsModel;
use craft\web\twig\variables\CraftVariable;
use yii\base\Event;

class Plugin extends \craft\base\Plugin
{
  // Static Properties
  // =========================================================================
  /**
   * @var static
   */
  public static $plugin;

  // Public Properties
  // =========================================================================
  /**
   * @var string
   */
  public $schemaVersion = '1.0.0';

  // Public Methods
  // =========================================================================
  public function init()
  {
    parent::init();
    self::$plugin = $this;

    // Register services as components
    /*$this->setComponents([

    ]);*/
    
    // Register variable
    Event::on(CraftVariable::class, CraftVariable::EVENT_INIT, function(Event $event) {
      /** @var CraftVariable $variable */
      $variable = $event->sender;
      $variable->set('entryCount', EntryCountVariable::class);
    });
    
    Craft::info(
      Craft::t(
          'adldap',
          '{name} plugin loaded',
          ['name' => $this->name]
      ),
      __METHOD__
    );
  }

  // Protected Methods
  // =========================================================================

  /**
   * @inheritdoc
   */
  protected function createSettingsModel() : SettingsModel
  {
    return new SettingsModel();
  }

  /**
   * @inheritdoc
   */
  protected function settingsHtml()
  {
    return Craft::$app->getView()->renderTemplate('adldap/settings', [
      'settings' => $this->getSettings()
    ]);
  }
}