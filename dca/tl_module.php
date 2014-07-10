<?php
/*
 * Copyright MADE/YOUR/DAY OG <mail@madeyourday.net>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

/**
 * Slider Frontend Module DCA
 *
 * @author Martin Auswöger <martin@madeyourday.net>
 */

$GLOBALS['TL_DCA']['tl_module']['config']['onload_callback'][] = array('MadeYourDay\\Contao\\Slider', 'moduleOnloadCallback');

$GLOBALS['TL_DCA']['tl_module']['palettes']['__selector__'][] = 'rsts_content_type';
$GLOBALS['TL_DCA']['tl_module']['palettes']['rocksolid_slider'] = '{title_legend},name,headline,type,rsts_content_type';
$GLOBALS['TL_DCA']['tl_module']['palettes']['rocksolid_sliderrsts_default'] = '{title_legend},name,headline,type,rsts_content_type;{config_legend},rsts_id,rsts_type,rsts_direction,rsts_random,rsts_loop,rsts_centerContent,rsts_skin,rsts_width,rsts_height,rsts_preloadSlides,rsts_gapSize,rsts_duration,rsts_captions,rsts_scaleMode,rsts_imagePosition;{rsts_navigation_legend},rsts_navType,rsts_deepLinkPrefix,rsts_controls,rsts_keyboard;{rsts_autoplay_legend},rsts_autoplay,rsts_autoplayRestart,rsts_autoplayProgress,rsts_pauseAutoplayOnHover,rsts_videoAutoplay;{rsts_carousel_legend},rsts_slideMaxCount,rsts_prevNextSteps,rsts_slideMinSize,rsts_combineNavItems,rsts_visibleArea,rsts_visibleAreaMax;{template_legend:hide},rsts_template,imgSize;{expert_legend:hide},rsts_customSkin,rsts_cssPrefix,cssID,space';
$GLOBALS['TL_DCA']['tl_module']['palettes']['rocksolid_sliderrsts_news'] = '{title_legend},name,headline,type,rsts_content_type;{rsts_news_legend},news_archives,numberOfItems,news_featured,skipFirst,news_template,news_metaFields;{config_legend},rsts_type,rsts_direction,rsts_random,rsts_loop,rsts_centerContent,rsts_skin,rsts_width,rsts_height,rsts_preloadSlides,rsts_gapSize,rsts_duration,rsts_captions,rsts_scaleMode,rsts_imagePosition;{rsts_navigation_legend},rsts_navType,rsts_deepLinkPrefix,rsts_controls,rsts_keyboard;{rsts_autoplay_legend},rsts_autoplay,rsts_autoplayRestart,rsts_autoplayProgress,rsts_pauseAutoplayOnHover,rsts_videoAutoplay;{rsts_carousel_legend},rsts_slideMaxCount,rsts_prevNextSteps,rsts_slideMinSize,rsts_combineNavItems,rsts_visibleArea,rsts_visibleAreaMax;{template_legend:hide},rsts_template,imgSize;{expert_legend:hide},rsts_customSkin,rsts_cssPrefix,cssID,space';
$GLOBALS['TL_DCA']['tl_module']['palettes']['rocksolid_sliderrsts_events'] = '{title_legend},name,headline,type,rsts_content_type;{rsts_events_legend},cal_calendar,cal_noSpan,cal_format,cal_ignoreDynamic,cal_order,cal_readerModule,cal_limit,cal_template;{config_legend},rsts_type,rsts_direction,rsts_random,rsts_loop,rsts_centerContent,rsts_skin,rsts_width,rsts_height,rsts_preloadSlides,rsts_gapSize,rsts_duration,rsts_captions,rsts_scaleMode,rsts_imagePosition;{rsts_navigation_legend},rsts_navType,rsts_deepLinkPrefix,rsts_controls,rsts_keyboard;{rsts_autoplay_legend},rsts_autoplay,rsts_autoplayRestart,rsts_autoplayProgress,rsts_pauseAutoplayOnHover,rsts_videoAutoplay;{rsts_carousel_legend},rsts_slideMaxCount,rsts_prevNextSteps,rsts_slideMinSize,rsts_combineNavItems,rsts_visibleArea,rsts_visibleAreaMax;{template_legend:hide},rsts_template,imgSize;{expert_legend:hide},rsts_customSkin,rsts_cssPrefix,cssID,space';
$GLOBALS['TL_DCA']['tl_module']['palettes']['rocksolid_sliderrsts_images'] = '{title_legend},name,headline,type,rsts_content_type;{rsts_images_legend},multiSRC;{config_legend},rsts_type,rsts_direction,rsts_random,rsts_loop,rsts_centerContent,rsts_skin,rsts_width,rsts_height,rsts_preloadSlides,rsts_gapSize,rsts_duration,rsts_captions,rsts_scaleMode,rsts_imagePosition;{rsts_navigation_legend},rsts_navType,rsts_deepLinkPrefix,rsts_controls,rsts_keyboard;{rsts_autoplay_legend},rsts_autoplay,rsts_autoplayRestart,rsts_autoplayProgress,rsts_pauseAutoplayOnHover,rsts_videoAutoplay;{rsts_carousel_legend},rsts_slideMaxCount,rsts_prevNextSteps,rsts_slideMinSize,rsts_combineNavItems,rsts_visibleArea,rsts_visibleAreaMax;{template_legend:hide},rsts_template,imgSize;{expert_legend:hide},rsts_customSkin,rsts_cssPrefix,cssID,space';

$GLOBALS['TL_DCA']['tl_module']['fields']['news_metaFields']['eval']['tl_class'] .= ' clr';

$GLOBALS['TL_DCA']['tl_module']['fields']['rsts_content_type'] = array(
	'label' => &$GLOBALS['TL_LANG']['tl_module']['rsts_content_type'],
	'default' => 'rsts_default',
	'exclude' => true,
	'inputType' => 'select',
	'options' => array(
		'rsts_default',
		'rsts_news',
		'rsts_events',
		'rsts_images',
	),
	'reference' => &$GLOBALS['TL_LANG']['tl_module']['rsts_content_types'],
	'eval' => array(
		'mandatory' => true,
		'submitOnChange' => true,
		'tl_class' => 'w50',
	),
	'sql' => "varchar(64) NOT NULL default 'rsts_default'",
);
$GLOBALS['TL_DCA']['tl_module']['fields']['rsts_id'] = array(
	'label' => &$GLOBALS['TL_LANG']['tl_module']['rsts_id'],
	'exclude' => true,
	'inputType' => 'select',
	'options_callback' => array('MadeYourDay\\Contao\\Slider', 'getSliderIds'),
	'eval' => array(
		'includeBlankOption' => true,
		'mandatory' => true,
	),
	'sql' => "int(10) unsigned NOT NULL default '0'",
);
$GLOBALS['TL_DCA']['tl_module']['fields']['rsts_template'] = array(
	'label' => &$GLOBALS['TL_LANG']['tl_module']['rsts_template'],
	'default' => 'rsts_default',
	'exclude' => true,
	'inputType' => 'select',
	'options_callback' => array('MadeYourDay\\Contao\\Slider', 'getSliderTemplates'),
	'eval' => array('tl_class' => 'w50'),
	'sql' => "varchar(32) NOT NULL default ''",
);
// slider type (slide, side-slide or fade)
$GLOBALS['TL_DCA']['tl_module']['fields']['rsts_type'] = array(
	'label' => &$GLOBALS['TL_LANG']['tl_module']['rsts_type'],
	'exclude' => true,
	'inputType' => 'select',
	'options' => array('slide' => 'slide', 'side-slide' => 'side-slide', 'fade' => 'fade'),
	'eval' => array('tl_class' => 'w50'),
	'sql' => "varchar(64) NOT NULL default ''",
);
// "x" for horizontal or "y" for vertical
$GLOBALS['TL_DCA']['tl_module']['fields']['rsts_direction'] = array(
	'label' => &$GLOBALS['TL_LANG']['tl_module']['rsts_direction'],
	'exclude' => true,
	'inputType' => 'select',
	'options' => array(
		'x' => $GLOBALS['TL_LANG']['tl_module']['rsts_direction_x'],
		'y' => $GLOBALS['TL_LANG']['tl_module']['rsts_direction_y'],
	),
	'eval' => array('tl_class' => 'w50'),
	'sql' => "varchar(64) NOT NULL default ''",
);
// if true the slides get shuffled once on initialization
$GLOBALS['TL_DCA']['tl_module']['fields']['rsts_random'] = array(
	'label' => &$GLOBALS['TL_LANG']['tl_module']['rsts_random'],
	'exclude' => true,
	'inputType' => 'checkbox',
	'eval' => array('tl_class' => 'w50'),
	'sql' => "char(1) NOT NULL default ''",
);
// if true the slider loops infinitely
$GLOBALS['TL_DCA']['tl_module']['fields']['rsts_loop'] = array(
	'label' => &$GLOBALS['TL_LANG']['tl_module']['rsts_loop'],
	'exclude' => true,
	'inputType' => 'checkbox',
	'eval' => array('tl_class' => 'w50'),
	'sql' => "char(1) NOT NULL default ''",
);
// true, "x" or "y" to center the the slides content
// use the attribute data-rsts-center to set the mode per slide
$GLOBALS['TL_DCA']['tl_module']['fields']['rsts_centerContent'] = array(
	'label' => &$GLOBALS['TL_LANG']['tl_module']['rsts_centerContent'],
	'exclude' => true,
	'inputType' => 'select',
	'options' => array(
		'false',
		'true',
		'x',
		'y',
	),
	'reference' => &$GLOBALS['TL_LANG']['tl_module']['rsts_centerContent_options'],
	'eval' => array('tl_class' => 'w50'),
	'sql' => "varchar(64) NOT NULL default ''",
);
// slider skin (set this to "none" to disable the default skin)
$GLOBALS['TL_DCA']['tl_module']['fields']['rsts_skin'] = array(
	'label' => &$GLOBALS['TL_LANG']['tl_module']['rsts_skin'],
	'exclude' => true,
	'inputType' => 'select',
	'options' => array(
		'',
		'default-content',
		'liquid',
		'dark',
		'light',
		'custom',
	),
	'reference' => &$GLOBALS['TL_LANG']['tl_module']['rsts_skin_options'],
	'eval' => array('tl_class' => 'w50'),
	'sql' => "varchar(64) NOT NULL default ''",
);
// set width and height to one of the following values
// - "css": get the size from the applied css (default)
// - a css lenght value: e.g. "100%", "500px", "50em"
// - "auto": get the size from the active slide dimensions at runtime
//   height can be set to auto only if the direction is "x"
// - "normalize": similar to auto but uses the size of the largest slide
// - a proportion: keep a fixed proportion for the slides, e.g. "480x270"
//   this must not set to both dimensions
$GLOBALS['TL_DCA']['tl_module']['fields']['rsts_width'] = array(
	'label' => &$GLOBALS['TL_LANG']['tl_module']['rsts_width'],
	'exclude' => true,
	'inputType' => 'text',
	'eval' => array('tl_class' => 'w50'),
	'sql' => "varchar(64) NOT NULL default ''",
);
$GLOBALS['TL_DCA']['tl_module']['fields']['rsts_height'] = array(
	'label' => &$GLOBALS['TL_LANG']['tl_module']['rsts_height'],
	'exclude' => true,
	'inputType' => 'text',
	'eval' => array('tl_class' => 'w50'),
	'sql' => "varchar(64) NOT NULL default ''",
);
// number of slides to preload (to the left/right or top/bottom)
$GLOBALS['TL_DCA']['tl_module']['fields']['rsts_preloadSlides'] = array(
	'label' => &$GLOBALS['TL_LANG']['tl_module']['rsts_preloadSlides'],
	'exclude' => true,
	'inputType' => 'select',
	'options' => array(1, 2, 3, 4, 5, 6, 7, 8, 9),
	'eval' => array('tl_class' => 'w50', 'includeBlankOption' => true),
	'sql' => "int(10) unsigned NOT NULL default '0'",
);
// gap between the slides
$GLOBALS['TL_DCA']['tl_module']['fields']['rsts_gapSize'] = array(
	'label' => &$GLOBALS['TL_LANG']['tl_module']['rsts_gapSize'],
	'exclude' => true,
	'inputType' => 'text',
	'eval' => array('tl_class' => 'w50'),
	'sql' => "varchar(64) NOT NULL default '0%'",
);
// duration of the slide animation in milliseconds
$GLOBALS['TL_DCA']['tl_module']['fields']['rsts_duration'] = array(
	'label' => &$GLOBALS['TL_LANG']['tl_module']['rsts_duration'],
	'exclude' => true,
	'inputType' => 'text',
	'eval' => array('tl_class' => 'w50'),
	'sql' => "int(10) unsigned NOT NULL default '0'",
);
// false or the duration between slides in milliseconds
$GLOBALS['TL_DCA']['tl_module']['fields']['rsts_autoplay'] = array(
	'label' => &$GLOBALS['TL_LANG']['tl_module']['rsts_autoplay'],
	'exclude' => true,
	'inputType' => 'text',
	'eval' => array('tl_class' => 'w50'),
	'sql' => "int(10) unsigned NOT NULL default '0'",
);
// true to autoplay videos
$GLOBALS['TL_DCA']['tl_module']['fields']['rsts_videoAutoplay'] = array(
	'label' => &$GLOBALS['TL_LANG']['tl_module']['rsts_videoAutoplay'],
	'exclude' => true,
	'inputType' => 'checkbox',
	'eval' => array('tl_class' => 'w50'),
	'sql' => "char(1) NOT NULL default ''",
);
// false or the duration between user interaction and autoplay
// (must be bigger than autoplay)
$GLOBALS['TL_DCA']['tl_module']['fields']['rsts_autoplayRestart'] = array(
	'label' => &$GLOBALS['TL_LANG']['tl_module']['rsts_autoplayRestart'],
	'exclude' => true,
	'inputType' => 'text',
	'eval' => array('tl_class' => 'w50'),
	'sql' => "int(10) unsigned NOT NULL default '0'",
);
// displays a progress bar
$GLOBALS['TL_DCA']['tl_module']['fields']['rsts_autoplayProgress'] = array(
	'label' => &$GLOBALS['TL_LANG']['tl_module']['rsts_autoplayProgress'],
	'exclude' => true,
	'inputType' => 'checkbox',
	'eval' => array('tl_class' => 'w50'),
	'sql' => "char(1) NOT NULL default ''",
);
// true to pause the autoplay on hover
$GLOBALS['TL_DCA']['tl_module']['fields']['rsts_pauseAutoplayOnHover'] = array(
	'label' => &$GLOBALS['TL_LANG']['tl_module']['rsts_pauseAutoplayOnHover'],
	'exclude' => true,
	'inputType' => 'checkbox',
	'eval' => array('tl_class' => 'w50'),
	'sql' => "char(1) NOT NULL default ''",
);
// navigation type (bullets, numbers, tabs)
$GLOBALS['TL_DCA']['tl_module']['fields']['rsts_navType'] = array(
	'label' => &$GLOBALS['TL_LANG']['tl_module']['rsts_navType'],
	'exclude' => true,
	'inputType' => 'select',
	'options' => array(
		'bullets' => $GLOBALS['TL_LANG']['tl_module']['rsts_navType_bullets'],
		'numbers' => $GLOBALS['TL_LANG']['tl_module']['rsts_navType_numbers'],
		'tabs' => $GLOBALS['TL_LANG']['tl_module']['rsts_navType_tabs'],
		'none' => $GLOBALS['TL_LANG']['tl_module']['rsts_navType_none'],
	),
	'eval' => array('tl_class' => 'w50'),
	'sql' => "varchar(64) NOT NULL default ''",
);
// false to hide the prev and next controls
$GLOBALS['TL_DCA']['tl_module']['fields']['rsts_controls'] = array(
	'label' => &$GLOBALS['TL_LANG']['tl_module']['rsts_controls'],
	'exclude' => true,
	'inputType' => 'checkbox',
	'eval' => array('tl_class' => 'w50'),
	'sql' => "char(1) NOT NULL default '1'",
);
// image scale mode (fit, crop, scale)
// only works if width and height are not set to "auto"
$GLOBALS['TL_DCA']['tl_module']['fields']['rsts_scaleMode'] = array(
	'label' => &$GLOBALS['TL_LANG']['tl_module']['rsts_scaleMode'],
	'exclude' => true,
	'inputType' => 'select',
	'options' => array(
		'fit' => $GLOBALS['TL_LANG']['tl_module']['rsts_scaleMode_fit'],
		'crop' => $GLOBALS['TL_LANG']['tl_module']['rsts_scaleMode_crop'],
		'scale' => $GLOBALS['TL_LANG']['tl_module']['rsts_scaleMode_scale'],
		'none' => $GLOBALS['TL_LANG']['tl_module']['rsts_scaleMode_none'],
	),
	'eval' => array('tl_class' => 'w50 clr'),
	'sql' => "varchar(64) NOT NULL default ''",
);
// image position (center, top, right, bottom, left, top-left, top-right, bottom-left, bottom-right)
// use the attribute data-rsts-position to set it per slide
$GLOBALS['TL_DCA']['tl_module']['fields']['rsts_imagePosition'] = array(
	'label' => &$GLOBALS['TL_LANG']['tl_module']['rsts_imagePosition'],
	'exclude' => true,
	'inputType' => 'select',
	'options' => array('center', 'top', 'right', 'bottom', 'left', 'top-left', 'top-right', 'bottom-left', 'bottom-right'),
	'reference' => &$GLOBALS['TL_LANG']['tl_module']['rsts_imagePositions'],
	'eval' => array('tl_class' => 'w50'),
	'sql' => "varchar(64) NOT NULL default ''",
);
// URL hash prefix or false to disable deep linking, e.g. "slider-"
$GLOBALS['TL_DCA']['tl_module']['fields']['rsts_deepLinkPrefix'] = array(
	'label' => &$GLOBALS['TL_LANG']['tl_module']['rsts_deepLinkPrefix'],
	'exclude' => true,
	'inputType' => 'text',
	'eval' => array('tl_class' => 'w50'),
	'sql' => "varchar(255) NOT NULL default ''",
);
// true to enable keyboard arrow navigation
$GLOBALS['TL_DCA']['tl_module']['fields']['rsts_keyboard'] = array(
	'label' => &$GLOBALS['TL_LANG']['tl_module']['rsts_keyboard'],
	'exclude' => true,
	'inputType' => 'checkbox',
	'eval' => array('tl_class' => 'w50'),
	'sql' => "char(1) NOT NULL default '1'",
);
// true to enable keyboard arrow navigation
$GLOBALS['TL_DCA']['tl_module']['fields']['rsts_captions'] = array(
	'label' => &$GLOBALS['TL_LANG']['tl_module']['rsts_captions'],
	'exclude' => true,
	'inputType' => 'checkbox',
	'eval' => array('tl_class' => 'w50 m12'),
	'sql' => "char(1) NOT NULL default '1'",
);
// maximum number of visible slides
$GLOBALS['TL_DCA']['tl_module']['fields']['rsts_slideMaxCount'] = array(
	'label' => &$GLOBALS['TL_LANG']['tl_module']['rsts_slideMaxCount'],
	'exclude' => true,
	'inputType' => 'select',
	'options' => array(1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20),
	'eval' => array('tl_class' => 'w50', 'includeBlankOption' => true),
	'sql' => "int(10) unsigned NOT NULL default '0'",
);
// number of slides to navigate by clicking prev or next
$GLOBALS['TL_DCA']['tl_module']['fields']['rsts_prevNextSteps'] = array(
	'label' => &$GLOBALS['TL_LANG']['tl_module']['rsts_prevNextSteps'],
	'exclude' => true,
	'inputType' => 'select',
	'options' => array(1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20),
	'eval' => array('tl_class' => 'w50', 'includeBlankOption' => true),
	'sql' => "int(10) unsigned NOT NULL default '0'",
);
// the size of the area for the visible slide (0 = 0%, 1 = 100%)
$GLOBALS['TL_DCA']['tl_module']['fields']['rsts_visibleArea'] = array(
	'label' => &$GLOBALS['TL_LANG']['tl_module']['rsts_visibleArea'],
	'exclude' => true,
	'inputType' => 'text',
	'eval' => array('tl_class' => 'w50 clr'),
	'sql' => "double unsigned NOT NULL default '0'",
);
// maximum size of the area for the visible slide in px
$GLOBALS['TL_DCA']['tl_module']['fields']['rsts_visibleAreaMax'] = array(
	'label' => &$GLOBALS['TL_LANG']['tl_module']['rsts_visibleAreaMax'],
	'exclude' => true,
	'inputType' => 'text',
	'eval' => array('tl_class' => 'w50'),
	'sql' => "double unsigned NOT NULL default '0'",
);
// minimal size of one slide in px
$GLOBALS['TL_DCA']['tl_module']['fields']['rsts_slideMinSize'] = array(
	'label' => &$GLOBALS['TL_LANG']['tl_module']['rsts_slideMinSize'],
	'exclude' => true,
	'inputType' => 'text',
	'eval' => array('tl_class' => 'w50'),
	'sql' => "int(10) unsigned NOT NULL default '0'",
);
// combine navigation items if multiple slides are visible (default true)
$GLOBALS['TL_DCA']['tl_module']['fields']['rsts_combineNavItems'] = array(
	'label' => &$GLOBALS['TL_LANG']['tl_module']['rsts_combineNavItems'],
	'exclude' => true,
	'inputType' => 'checkbox',
	'eval' => array('tl_class' => 'w50 m12'),
	'sql' => "char(1) NOT NULL default '1'",
);
// custom slider skin (rsts_skin gets ignored if this is set)
$GLOBALS['TL_DCA']['tl_module']['fields']['rsts_customSkin'] = array(
	'label' => &$GLOBALS['TL_LANG']['tl_module']['rsts_customSkin'],
	'exclude' => true,
	'inputType' => 'text',
	'eval' => array('tl_class' => 'w50 clr'),
	'sql' => "varchar(64) NOT NULL default ''",
);
// prefix for all RockSolid Slider specific css class names
$GLOBALS['TL_DCA']['tl_module']['fields']['rsts_cssPrefix'] = array(
	'label' => &$GLOBALS['TL_LANG']['tl_module']['rsts_cssPrefix'],
	'exclude' => true,
	'inputType' => 'text',
	'eval' => array('tl_class' => 'w50'),
	'sql' => "varchar(64) NOT NULL default ''",
);
