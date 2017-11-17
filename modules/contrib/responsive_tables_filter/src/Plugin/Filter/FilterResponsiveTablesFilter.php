<?php

namespace Drupal\responsive_tables_filter\Plugin\Filter;

use Drupal\filter\FilterProcessResult;
use Drupal\filter\Plugin\FilterBase;

/**
 * Responsive Tables Filter class. Implements process() method only.
 *
 * @Filter(
 *   id = "filter_responsive_tables_filter",
 *   title = @Translation("Responsive Tables Filter"),
 *   description = @Translation("Make tables in WYSIWYG fields responsive."),
 *   type = Drupal\filter\Plugin\FilterInterface::TYPE_MARKUP_LANGUAGE,
 * )
 */
class FilterResponsiveTablesFilter extends FilterBase {

  /**
   * {@inheritdoc}
   */
  public function process($text, $langcode) {
    if ($filtered = _responsive_tables_filter_process($text)) {
      $result = new FilterProcessResult($filtered);
      // Attach Tablesaw library assets to this page.
      $result->setAttachments(array(
        'library' => array('responsive_tables_filter/tablesaw-filter'),
      ));
    }
    else {
      $result = new FilterProcessResult($text);
    }

    return $result;
  }

}
