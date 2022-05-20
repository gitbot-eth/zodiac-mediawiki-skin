<?php
/**
 * Skin file for skin Zodiac.
 *
 * @file
 * @ingroup Skins
 */


/**
 * SkinTemplate class for Zodiac skin
 * @ingroup Skins
 */
class SkinZodiac extends SkinTemplate {
	/**
	 * This function adds JavaScript via ResourceLoader
	 *
	 * Use this function if your skin has a JS file(s).
	 * Otherwise you won't need this function and you can safely delete it.
	 *
	 * @param OutputPage $out
	 */

	public function initPage( OutputPage $out ) {
		parent::initPage( $out );
		// Consider replacing with "responsive": true argument in skin.json
		$out->addMeta( 'viewport', 'width=device-width, initial-scale=1' );
		$out->addBodyClasses( 'text-gray-200' );
		$out->addLink( array(
			'rel' => 'preconnect',
			'href' => 'https://fonts.googleapis.com',
		) );
		$out->addLink( array(
			'rel' => 'preconnect',
			'href' => 'https://fonts.gstatic.com',
			'crossorigin' => true,
		) );
		$out->addLink( array(
			'rel' => 'stylesheet',
			'href' => 'https://fonts.googleapis.com/css2?family=Roboto+Mono:wght@400;600&family=Spectral:wght@400;600&display=swap',
		) );
	}
}
