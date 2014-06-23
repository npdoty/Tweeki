<?php
/**
 * Tweeki skin (and hooks)
 *
 * @file
 * @ingroup Skins
 * @author Tobias Haider, Garrett LeSage
 */

if( !defined( 'MEDIAWIKI' ) ) die( "This is an extension to the MediaWiki package and cannot be run standalone." );
 
$wgExtensionCredits['skin'][] = array(
        'path' => __FILE__,
        'name' => 'Tweeki',
        'version' => '0.1.1',
        'url' => "http://tweeki.thai-land.at",
        'author' => 'Tobias Haider (based on the work of Garrett LeSage)',
        'descriptionmsg' => 'tweeki-desc',
);

$wgValidSkinNames['tweeki'] = 'Tweeki';
$wgAutoloadClasses['SkinTweeki'] = dirname(__FILE__).'/Tweeki.skin.php';
$wgAutoloadClasses['TweekiHooks'] = dirname( __FILE__ ) . '/Tweeki.hooks.php';
$wgExtensionMessagesFiles['SkinTweeki'] = dirname(__FILE__).'/Tweeki.i18n.php';
$wgExtensionMessagesFiles['TweekiMagic'] = dirname( __FILE__ ) . '/Tweeki.i18n.magic.php';
 
$wgHooks['GetPreferences'][] = 'TweekiHooks::getPreferences';
$wgHooks['ParserFirstCallInit'][] = 'TweekiHooks::ButtonsSetup';
$wgHooks['ParserFirstCallInit'][] = 'TweekiHooks::TweekiHideSetup';

# Styles and Scripts have to be splitted in order to get the dependencies right
$wgResourceModules['skins.tweeki.styles'] = array(
  'styles' => array(
		'tweeki/bootstrap/css/bootstrap.min.css' => array( 'media' => 'screen' ),
		'tweeki/bootstrap/css/bootstrap-theme.min.css' => array( 'media' => 'screen' ),
		'tweeki/bootstrap/awesome/css/font-awesome.css' => array( 'media' => 'screen' ),
		'tweeki/screen.css' => array( 'media' => 'screen' ),
		'tweeki/theme.css' => array( 'media' => 'screen' ),
	),
  'remoteBasePath' => &$GLOBALS['wgStylePath'],
  'localBasePath' => &$GLOBALS['wgStyleDirectory'],
);

$wgResourceModules['skins.tweeki.scripts'] = array(
	'scripts' => array(
		'tweeki/bootstrap/js/bootstrap.js',
		'tweeki/jquery.mousewheel.min.js',
		'tweeki/jquery.smoothDivScroll-1.3.js',
		'tweeki/tweeki.js',
	),
	'dependencies' => array(
		'jquery.ui.widget',
	),
  'remoteBasePath' => &$GLOBALS['wgStylePath'],
  'localBasePath' => &$GLOBALS['wgStyleDirectory'],
);

# Default options
$wgTweekiSkinHideAll = array( 'footer-info' );
$wgTweekiSkinHideable = array( 'firstHeading' );
$wgTweekiSkinHideAnon = array( 'navbar' );
$wgTweekiSkinHideNonPoweruser = array( 'TOOLBOX', 'EDIT-EXT-special' );
$wgTweekiSkinFooterIcons = true;