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

/**
 * Widget Dynamics.
 *
 * @category PhalconEye\Widget
 * @package  Widget
 */
class DynamicForm extends CoreForm
{
    public function initialize()
    {
        $di = $this->getDI();
        $values = ['Robot 1', 'Robot 2', 'Robot 3', 'Robot 4', 'Robot 5', 'Robot 6'];

        /**
         * Text elements
         */

        $this->addContentFieldSet('Text elements')

            ->addText(
                'robot1[]',
                'Text field, only 1',
                null,
                $values,
                ['dynamic' => ['min' => 1, 'max' => 1]]
            )

            ->addText(
                'robot2[]',
                'Text field, 2-5',
                null,
                $values,
                ['dynamic' => ['min' => 2, 'max' => 5]]
            )

            ->addPassword(
                'password[]',
                'Password field, 1-3',
                null,
                [
                    'placeholder' => 'Type in something',
                    'dynamic' => ['min' => 1, 'max' => 3]
                ]
            )

            ->addTextArea(
                'desc[]',
                'Text area, 1-3',
                null,
                $values,
                ['dynamic' => ['min' => 1, 'max' => 3]]
            );

        /**
         * Editors (admin area only)
         */
        if (substr($di->get('dispatcher')->getControllerName(), 0, 5) == 'Admin')
        {
            $editorOptions = [
                'toolbar' => [[ 'Source', '-', 'Bold', 'Italic', '-', 'Link', 'Image' ]],
                'allowedContent' => true,
            ];

            $this->addContentFieldSet('Text editors')

                ->addCkEditor(
                    'std_editor',
                    'Regular Editor',
                    null,
                    $editorOptions,
                    'Regular text'
                )

                ->addCkEditor(
                    'editor[]',
                    'Editor, 1-3',
                    null,
                    $editorOptions,
                    'Teeest',
                    ['dynamic' => ['min' => 2, 'max' => 10]]
                );
        }

        /**
         * Control elements
         */

        $this->addContentFieldSet('Control elements')

            ->addSelect(
                'color[]',
                'Select 3-8',
                null,
                $values,
                [1, 2, 3],
                ['dynamic' => ['min' => 3, 'max' => 8]]
            )

            ->addMultiSelect(
                'parts[]',
                'MultiSelect 1-3',
                null,
                $values,
                [[0], [1,2], [3,4]],
                ['dynamic' => ['min' => 3, 'max' => 8]]
            );

        /**
         * File elements
         */
        $this->addContentFieldSet('File elements')

            ->addFile(
                'file',
                'File Regular'
            )

            ->addFile(
                'schema[]',
                'File 1-10',
                null,
                false,
                '/files/github.gif',
                ['dynamic' => ['min' => 1, 'max' => 10]]
            )

            ->addFile(
                'img',
                'File (Image) Regular',
                null,
                true,
                'files/github.gif'
            )

            ->addFile(
                'image[]',
                'File (Image) 2-5',
                null,
                true,
                ['files/github.gif', 'files/github.gif'],
                ['dynamic' => ['min' => 2, 'max' => 5]]
            )

            ->addRemoteFile(
                'remote[]',
                'File Remote 1-3',
                null,
                ['files/github.gif', '/files/github.gif'],
                ['dynamic' => ['min' => 1, 'max' => 3]]
            );

        /**
         * Footer
         */
        $this->addFooterFieldSet('Buttons')
            ->addButton('submit', 'Submit');
    }
}
