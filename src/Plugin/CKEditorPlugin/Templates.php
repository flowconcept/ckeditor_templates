<?php

/**
 * @file
 * Contains \Drupal\codesnippet\Plugin\CKEditorPlugin\CodeSnippet.
 */

namespace Drupal\ckeditor_templates\Plugin\CKEditorPlugin;

use Drupal\ckeditor\CKEditorPluginBase;
use Drupal\Core\Url;
use Drupal\editor\Entity\Editor;

/**
 * Defines the "templates" plugin.
 *
 * @CKEditorPlugin(
 *   id = "templates",
 *   label = @Translation("Templates"),
 *   module = "ckeditor"
 * )
 */
class Templates extends CKEditorPluginBase {
  /**
   * {@inheritdoc}
   */
  public function getFile() {
    return drupal_get_path('module', 'ckeditor_templates') . '/js/plugins/templates/plugin.js';
  }

  /**
   * {@inheritdoc}
   */
  public function getConfig(Editor $editor) {
    $settings = $editor->getSettings();
    $path = drupal_get_path('module', 'ckeditor_templates');

    $base_theme = drupal_get_path('theme', \Drupal::service('theme_handler')->getDefault());
    $file = $base_theme . '/ckeditor/templates.js';

    if (file_exists($file)) {
      $template_file = Url::fromUri('base:' . $file, ['absolute' => TRUE])->toString();
    } else {
      $template_file = Url::fromUri('base:' . $path . '/templates/default.js', ['absolute' => TRUE])->toString();
    }

    return array(
      'templates' => 'default',
      'templates_files' => [
        $template_file
      ],
      'templates_replaceContent' => FALSE,
    );
  }

  /**
   * {@inheritdoc}
   */
  public function getButtons() {
    return array(
      'Templates' => array(
        'label' => t('Templates'),
        'image' => drupal_get_path('module', 'ckeditor_templates') . '/js/plugins/templates/icons/templates.png',
      ),
    );
  }
}

///**
// * {@inheritdoc}
// */
//public function getConfig(Editor $editor) {
//  $settings = $editor->getSettings();
//  $path = drupal_get_path('module', 'ckeditor_templates');
//
//  return array(
//    'templates' => 'default',
//    'templates_files' => [
//      Url::fromUri('base:' . $path . '/templates/default.js', ['absolute' => TRUE])->toString()
//    ],
//    'templates_replaceContent' => FALSE,
//  );
//}