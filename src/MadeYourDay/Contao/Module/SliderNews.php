<?php
/*
 * Copyright MADE/YOUR/DAY OG <mail@madeyourday.net>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace MadeYourDay\Contao\Module;

/**
 * Slider News Module
 *
 * @author Martin Auswöger <martin@madeyourday.net>
 */
class SliderNews extends \ModuleNewsList
{
	/**
	 * Get an array of news articles (HTML output) generated by Contao\ModuleNewsList
	 *
	 * @return array News HTML output or an empty array if no news are found.
	 */
	public function getNewsArticles()
	{
		$this->news_archives = $this->sortOutProtected(deserialize($this->news_archives));

		// Return if there are no archives
		if (!is_array($this->news_archives) || !count($this->news_archives)) {
			return array();
		}

		// Dummy template object to retrive data from the compile method
		$this->Template = new \stdClass;
		$this->perPage = 0;

		$this->compile();

		if (!is_array($this->Template->articles) || !count($this->Template->articles)) {
			return array();
		}

		return $this->Template->articles;
	}
}