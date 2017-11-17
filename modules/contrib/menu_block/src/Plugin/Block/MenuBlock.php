<?php

namespace Drupal\menu_block\Plugin\Block;

use Drupal\Core\Form\FormStateInterface;
use Drupal\system\Entity\Menu;
use Drupal\system\Plugin\Block\SystemMenuBlock;

/**
 * Provides an extended Menu block.
 *
 * @Block(
 *   id = "menu_block",
 *   admin_label = @Translation("Menu block"),
 *   category = @Translation("Menus"),
 *   deriver = "Drupal\menu_block\Plugin\Derivative\MenuBlock"
 * )
 */
class MenuBlock extends SystemMenuBlock {

  /**
   * {@inheritdoc}
   */
  public function blockForm($form, FormStateInterface $form_state) {
    $config = $this->configuration;
    $defaults = $this->defaultConfiguration();

    $form = parent::blockForm($form, $form_state);

    $form['advanced'] = [
      '#type' => 'details',
      '#title' => $this->t('Advanced options'),
      '#open' => FALSE,
      '#process' => [[get_class(), 'processMenuBlockFieldSets']],
    ];

    $form['advanced']['expand'] = [
      '#type' => 'checkbox',
      '#title' => $this->t('<strong>Expand all menu links</strong>'),
      '#default_value' => $config['expand'],
      '#description' => $this->t('All menu links that have children will "Show as expanded".'),
    ];

    $menu_name = $this->getDerivativeId();
    $menus = Menu::loadMultiple(array($menu_name));
    $menus[$menu_name] = $menus[$menu_name]->label();

    /** @var \Drupal\Core\Menu\MenuParentFormSelectorInterface $menu_parent_selector */
    $menu_parent_selector = \Drupal::service('menu.parent_form_selector');
    if (strpos($config['parent'], 'active_trail') === false) {
      $form['advanced']['parent'] = $menu_parent_selector->parentSelectElement($config['parent'], '', $menus);
    }
    else {
      $form['advanced']['parent'] = [
        '#type' => 'select',
        '#options' => $menu_parent_selector->getParentSelectOptions('', $menus),
        '#default_value' => $config['parent'],
      ];
    }
    $form['advanced']['parent']['#options'] += [
      $menu_name . ':active_trail' => $this->t('<Active trail>')->render(),
      $menu_name . ':active_trail_parent' => $this->t('<Active trail parent>')->render(),
    ];

    $form['advanced']['parent'] += [
      '#title' => $this->t('Fixed parent item'),
      '#description' => $this->t('Alter the options in “Menu levels” to be relative to the fixed parent item. The block will only contain children of the selected menu link.'),
    ];

    $form['advanced']['label_type'] = [
      '#type' => 'select',
      '#title' => 'Use the following as title',
      '#options' => [
      'block' => $this->t('Block title'),
      'menu' => $this->t('Menu title'),
      'active_item' => $this->t('Active item\'s title'),
      'parent' => $this->t('Active trail\'s parent title'),
      'root' => $this->t('Active trail\'s root title'),
      'initial_menu_item' => $this->t('Initial menu item\'s title')
        ],
      '#default_value' => $config['label_type'],
      '#states' => [
      'visible' => [
      ':input[name="settings[label_display]"]' => ['checked' => TRUE]
      ]
      ]
    ];

    $form['advanced']['fixed_to_level'] = [
      '#type' => 'checkbox',
      '#title' => $this->t('Fix active trail to menu level'),
      '#description' => $this->t('This will fix the starting level. Example, if you select a menu level of 2, the menu block will start from the second level no matter where you are below it.'),
      '#default_value' => $config['fixed_to_level'],
      '#states' => [
        'visible' => [
          ':input[name="settings[parent]"]' => ['value' => $menu_name . ':active_trail_parent'],
        ]
      ]
    ];

    $form['style'] = [
      '#type' => 'details',
      '#title' => $this->t('HTML and style options'),
      '#open' => FALSE,
      '#process' => [[get_class(), 'processMenuBlockFieldSets']],
    ];

    $form['style']['suggestion'] = [
      '#type' => 'machine_name',
      '#title' => $this->t('Theme hook suggestion'),
      '#default_value' => $config['suggestion'],
      '#field_prefix' => '<code>menu__</code>',
      '#description' => $this->t('A theme hook suggestion can be used to override the default HTML and CSS classes for menus found in <code>menu.html.twig</code>.'),
      '#machine_name' => [
        'error' => $this->t('The theme hook suggestion must contain only lowercase letters, numbers, and underscores.'),
      ],
    ];

    // Open the details field sets if their config is not set to defaults.
    foreach(['menu_levels', 'advanced', 'style'] as $fieldSet) {
      foreach (array_keys($form[$fieldSet]) as $field) {
        if (isset($defaults[$field]) && $defaults[$field] !== $config[$field]) {
          $form[$fieldSet]['#open'] = TRUE;
        }
      }
    }

    return $form;
  }

  /**
   * Form API callback: Processes the elements in field sets.
   *
   * Adjusts the #parents of field sets to save its children at the top level.
   */
  public static function processMenuBlockFieldSets(&$element, FormStateInterface $form_state, &$complete_form) {
    array_pop($element['#parents']);
    return $element;
  }

  /**
   * {@inheritdoc}
   */
  public function blockSubmit($form, FormStateInterface $form_state) {
    $this->configuration['level'] = $form_state->getValue('level');
    $this->configuration['depth'] = $form_state->getValue('depth');
    $this->configuration['expand'] = $form_state->getValue('expand');
    $this->configuration['parent'] = $form_state->getValue('parent');
    $this->configuration['fixed_to_level'] = $form_state->getValue('fixed_to_level');
    $this->configuration['suggestion'] = $form_state->getValue('suggestion');
    $this->configuration['label_type'] = $form_state->getValue('label_type');
  }

  /**
   * {@inheritdoc}
   */
  public function build() {
    $menu_name = $this->getDerivativeId();
    $parameters = $this->menuTree->getCurrentRouteMenuTreeParameters($menu_name);

    // Adjust the menu tree parameters based on the block's configuration.
    $level = $this->configuration['level'];
    $depth = $this->configuration['depth'];
    $expand = $this->configuration['expand'];
    $parent = $this->configuration['parent'];
    $fixed_to_level = $this->configuration['fixed_to_level'];
    $suggestion = $this->configuration['suggestion'];

    $parameters->setMinDepth($level);
    // When the depth is configured to zero, there is no depth limit. When depth
    // is non-zero, it indicates the number of levels that must be displayed.
    // Hence this is a relative depth that we must convert to an actual
    // (absolute) depth, that may never exceed the maximum depth.
    if ($depth > 0) {
      $parameters->setMaxDepth(min($level + $depth - 1, $this->menuTree->maxDepth()));
    }

    // If expandedParents is empty, the whole menu tree is built.
    if ($expand) {
      $parameters->expandedParents = array();
    }

    // When a fixed parent item is set, root the menu tree at the given ID.
    if ($menuLinkID = str_replace($menu_name . ':', '', $parent)) {
      // Active trail or Active trail parent option.
      if (strpos($menuLinkID, 'active_trail') !== false) {
        $trailIds = $this->menuActiveTrail->getActiveTrailIds($menu_name);
        $trailIds = array_reverse(array_filter($trailIds));
        if ($menuLinkID == 'active_trail') {
          $menuLinkID = end($trailIds);
        }
        // Active trail parent.
        else {
          if (!$fixed_to_level) {
            // pop the current link and return the one before it
            array_pop($trailIds);
            $menuLinkID = end($trailIds);
          } else {
            $trailIds = array_values($trailIds);

            foreach ($trailIds as $key => $id) {
              if ($level == ($key + 1)) {
                $menuLinkID = $id;
                break;
              }
            }
          }
        }
      }

      if ($menuLinkID) {
        $parameters->setRoot($menuLinkID);
      }

      // If the starting level is 1, we always want the child links to appear,
      // but the requested tree may be empty if the tree does not contain the
      // active trail.
      if ($level === 1 || $level === '1') {
        // Check if the tree contains links.
        $tree = $this->menuTree->load(NULL, $parameters);
        if (empty($tree)) {
          // Change the request to expand all children and limit the depth to
          // the immediate children of the root.
          $parameters->expandedParents = array();
          $parameters->setMinDepth(1);
          $parameters->setMaxDepth(1);
          // Re-load the tree.
          $tree = $this->menuTree->load(NULL, $parameters);
        }
      }
    }
    else {
      //
      // https://www.drupal.org/files/issues/2811337-13_0.patch
      //
      if ( $level > 1 ) {
        if (count($parameters->activeTrail) >= $level) {
          // Active trail array is child-first. Reverse it, and pull the new menu
          // root based on the parent of the configured start level.
          $menu_trail_ids = array_reverse(array_values($parameters->activeTrail));
          $menu_root = $menu_trail_ids[$level - 1];
          $parameters->setRoot($menu_root)->setMinDepth(1);
          if ($depth > 0) {
            $max_depth = min($level - 1 + $depth - 1, $this->menuTree->maxDepth());
            $parameters->setMaxDepth($max_depth);
          }
        }
        else {
          return array();
        }

      }
    }

    // Load the tree if we haven't already.
    if (!isset($tree)) {
      $tree = $this->menuTree->load($menu_name, $parameters);
    }
    $manipulators = array(
      array('callable' => 'menu.default_tree_manipulators:checkAccess'),
      array('callable' => 'menu.default_tree_manipulators:generateIndexAndSort'),
    );
    $tree = $this->menuTree->transform($tree, $manipulators);
    $build = $this->menuTree->build($tree);

    if (!empty($build['#theme'])) {
      // Add the configuration for use in menu_block_theme_suggestions_menu().
      $build['#menu_block_configuration'] = $this->configuration;
      // Remove the menu name-based suggestion so we can control its precedence
      // better in menu_block_theme_suggestions_menu().
      $build['#theme'] = 'menu';
    }

    return $build;
  }

  /**
   * {@inheritdoc}
   */
  public function defaultConfiguration() {
    return [
      'level' => 1,
      'depth' => 0,
      'expand' => 0,
      'parent' => $this->getDerivativeId() . ':',
      'fixed_to_level' => 0,
      'label_type' => 'block',
      'suggestion' => strtr($this->getDerivativeId(), '-', '_'),
    ];
  }

}
