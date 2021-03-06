<?php

namespace Drupal\facets_summary\Plugin\facets_summary\processor;

use Drupal\Core\Form\FormStateInterface;
use Drupal\Core\Link;
use Drupal\facets_summary\FacetsSummaryInterface;
use Drupal\facets_summary\Processor\BuildProcessorInterface;
use Drupal\facets_summary\Processor\ProcessorPluginBase;

/**
 * Provides a processor that allows to reset facet filters.
 *
 * @SummaryProcessor(
 *   id = "reset_facets",
 *   label = @Translation("Adds reset facets link."),
 *   description = @Translation("When checked, this facet will add a link to reset enabled facets."),
 *   stages = {
 *     "build" = 50
 *   }
 * )
 */
class ResetFacetsProcessor extends ProcessorPluginBase implements BuildProcessorInterface {

  /**
   * {@inheritdoc}
   */
  public function build(FacetsSummaryInterface $facets_summary, array $build, array $facets) {
    $conf = $facets_summary->getProcessorConfigs()[$this->getPluginId()];

    // Do nothing if there are no selected facets or reset text is empty.
    if (empty($build['#items']) || empty($conf['settings']['link_text'])) {
      return $build;
    }

    $request = \Drupal::requestStack()->getMasterRequest();
    $query_params = $request->query->all();

    // Bypass all active facets and remove them from the query parameters array.
    foreach ($facets as $facet) {
      $url_alias = $facet->getUrlAlias();
      $filter_key = $facet->getFacetSourceConfig()->getFilterKey() ?: 'f';

      if (isset($query_params[$filter_key])) {
        foreach ($query_params[$filter_key] as $delta => $param) {
          if (strpos($param, $url_alias . ':') !== FALSE) {
            unset($query_params[$filter_key][$delta]);
          }
        }

        if (!$query_params[$filter_key]) {
          unset($query_params[$filter_key]);
        }
      }
    }

    // Lets use any first facet to get correct url.
    $results = reset($facets)->getResults();

    /** @var \Drupal\Core\Url $first_item_url */
    $first_item_url = reset($results)->getUrl();
    $first_item_url = clone ($first_item_url);
    $first_item_url->setOptions(['query' => $query_params]);

    $item = (new Link($conf['settings']['link_text'], $first_item_url))->toRenderable();
    array_unshift($build['#items'], $item);
    return $build;
  }

  /**
   * {@inheritdoc}
   */
  public function buildConfigurationForm(array $form, FormStateInterface $form_state, FacetsSummaryInterface $facets_summary) {
    // By default, there should be no config form.
    $processors = $facets_summary->getProcessors();
    $config = isset($processors[$this->getPluginId()]) ? $processors[$this->getPluginId()] : NULL;

    $build['link_text'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Reset facets link text'),
      '#default_value' => !is_null($config) ? $config->getConfiguration()['link_text'] : $this->defaultConfiguration()['link_text'],
    ];

    return $build;
  }

  /**
   * {@inheritdoc}
   */
  public function defaultConfiguration() {
    return ['link_text' => ''];
  }

  /**
   * {@inheritdoc}
   */
  public function isHidden() {
    return FALSE;
  }

  /**
   * {@inheritdoc}
   */
  public function isLocked() {
    return FALSE;
  }

}
