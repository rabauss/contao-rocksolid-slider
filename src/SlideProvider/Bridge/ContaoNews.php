<?php

/*
 * Copyright MADE/YOUR/DAY OG <mail@madeyourday.net>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace MadeYourDay\RockSolidSlider\SlideProvider\Bridge;

/**
 * Renders slides from news archives.
 *
 * @author Christian Schiffler <c.schiffler@cyberspectrum.de>
 * @author Martin Auswöger <martin@madeyourday.net>
 *
 * @codeCoverageIgnore - This is simply not testable. :-/
 */
class ContaoNews extends \ModuleNewsList
{
    /**
     * Get an array of news articles (HTML output) generated by Contao\ModuleNewsList
     *
     * @return array
     */
    public function getSlides()
    {
        $this->news_archives = $this->sortOutProtected(deserialize($this->news_archives));

        // Return if there are no archives
        if (!is_array($this->news_archives) || !count($this->news_archives)) {
            return [];
        }

        // Dummy template object to receive data from the compile method
        $this->Template = new \stdClass;
        $this->perPage = 0;

        $this->compile();

        if (!is_array($this->Template->articles) || !count($this->Template->articles)) {
            return [];
        }

        $slides = [];
        foreach ($this->Template->articles as $newsArticle) {
            $slides[] = ['text' => $newsArticle];
        }

        return $slides;
    }
}
