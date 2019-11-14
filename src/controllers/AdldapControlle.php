<?php

namespace dmsylvio\adldap\controllers;

use Craft;
use craft\web\Controller;

/**
 * AdldapController
 */
class AdldapController extends Controller
{
  protected $allowAnonymous = false;

  /**
   * Method to Authenticate user trying to login.
   * @throws \Adldap\Exceptions\Auth\BindException
   */
  public function actionLogin()
  {
    $this->requirePostRequest();
  }

  /**
   * Logout method return to home page with status QS
   */
  public function actionLogout()
  {
    craft()->userSession->logout(false);
    $this->redirect('?status=logout');
  }
}