<?php
/*
  +------------------------------------------------------------------------+
  | PhalconEye CMS                                                         |
  +------------------------------------------------------------------------+
  | Copyright (c) 2013-2014 PhalconEye Team (http://phalconeye.com/)       |
  +------------------------------------------------------------------------+
  | This source file is subject to the New BSD License that is bundled     |
  | with this package in the file LICENSE.txt.                             |
  |                                                                        |
  | If you did not receive a copy of the license and are unable to         |
  | obtain it through the world-wide-web, please send an email             |
  | to license@phalconeye.com so we can send you a copy immediately.       |
  +------------------------------------------------------------------------+
*/

namespace Widget\Dynamics;

use Core\Form\CoreForm;
use Engine\Widget\Controller as WidgetController;

/**
 * Widget Dynamics.
 *
 * @category PhalconEye\Widget
 * @package  Widget
 */
class Controller extends WidgetController
{
    /**
     * Index action.
     *
     * @return void
     */
    public function indexAction()
    {
        $form = $this->view->form = new DynamicForm();

        if ($this->request->isPost()) {
            $form->setValues($this->request->getPost());
        }
    }

    /**
     * Action for management from admin panel.
     *
     * @return CoreForm
     */
    public function adminAction()
    {
        return new DynamicForm();
    }
}