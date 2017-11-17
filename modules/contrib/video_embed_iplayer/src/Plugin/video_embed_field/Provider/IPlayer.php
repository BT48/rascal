<?php

namespace Drupal\video_embed_iplayer\Plugin\video_embed_field\Provider;

use Drupal\video_embed_field\ProviderPluginBase;

/**
 * @VideoEmbedProvider(
 *   id = "iplayer",
 *   title = @Translation("BBC iPlayer")
 * )
 */
class IPlayer extends ProviderPluginBase {

  /**
   * @var array|null
   */
  protected $oEmbedData = NULL;

  /**
   * {@inheritdoc}
   */
  public function renderEmbedCode($width, $height, $autoplay) {
    return [
      '#type' => 'html_tag',
      '#tag' => 'iframe',
      '#attributes' => [
        'width' => $width,
        'height' => $height,
        'frameborder' => '0',
        'allowfullscreen' => 'allowfullscreen',
		'scrolling' => 'no',
        'src' => '//www.bbc.co.uk/' . $this->getVideoId() . '/embed',
      ],
    ];
  }

  /**
   * {@inheritdoc}
   */
  public function getRemoteThumbnailUrl() {
    throw new \Exception('BBC iPlayer provider does not currently support thumbnails.');
  }

  /**
   * {@inheritdoc}
   */
  public static function getIdFromInput($input) {
    if (preg_match('/bbc.co.uk\/([a-zA-Z0-9\/-]*)/i', $input, $matches)) {
      return $matches[1];
    }
  }

}
