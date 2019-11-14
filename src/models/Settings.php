<?php
/**
 * AdLdap plugin for Craft CMS 3.x
 *
 * AdLdap settings page.
 *
 * @link      http://dmsylvio.com
 * @copyright Copyright (c) 2019 Sylvio Neto
 */

namespace dmsylvio\adldap\models;

use Craft;
use craft\base\Model;

class Settings extends Model
{
    // Public Properties
    // =========================================================================

    /**
     * Some field model attribute
     *
     * @var string
     */
    public $group;
    public $accountSuffix;
    public $adminAccountSuffix;
    public $accountPrefix;
    public $baseDN;
    public $domainControllers;
    public $username;
    public $password; 
    public $ssl;
    public $tls;
    public $referrals;
    public $port;

    // Public Methods
    // =========================================================================

    /**
     * Returns the validation rules for attributes.
     * *
     * @return array
     */
    public function rules()
    {
        return [
            ['group', 'accountSuffix', 'adminAccountSuffix', 'accountPrefix', 'baseDN', 'domainControllers', 'username', 'password', 'string'],
            [['ssl', 'tls', 'referrals'], 'boolean'],
            ['port', 'number'],
            [['ssl', 'tls', 'referrals'], 'default', 'value' => false],
            [['port'], 'default', 'value' => 389]
        ];
    }
}