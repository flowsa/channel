<?php
/**
 * channel plugin for Craft CMS 3.x
 *
 * Gets a list of all sections available for current site
 *
 * @link      www.flowsa.com
 * @copyright Copyright (c) 2019 Flow
 */

namespace flowsa\channel\utilities;

use flowsa\channel\Channel;
use flowsa\channel\assetbundles\channelutilityutility\ChannelUtilityUtilityAsset;

use Craft;
use craft\base\Utility;

/**
 * channel Utility
 *
 * Utility is the base class for classes representing Control Panel utilities.
 *
 * https://craftcms.com/docs/plugins/utilities
 *
 * @author    Flow
 * @package   Channel
 * @since     1.0.0
 */
class ChannelUtility extends Utility
{
    // Static
    // =========================================================================

    /**
     * Returns the display name of this utility.
     *
     * @return string The display name of this utility.
     */
    public static function displayName(): string
    {
        return Craft::t('channel', 'ChannelUtility');
    }

    /**
     * Returns the utility’s unique identifier.
     *
     * The ID should be in `kebab-case`, as it will be visible in the URL (`admin/utilities/the-handle`).
     *
     * @return string
     */
    public static function id(): string
    {
        return 'channel-channel-utility';
    }

    /**
     * Returns the path to the utility's SVG icon.
     *
     * @return string|null The path to the utility SVG icon
     */
    public static function iconPath()
    {
        return Craft::getAlias("@flowsa/channel/assetbundles/channelutilityutility/dist/img/ChannelUtility-icon.svg");
    }

    /**
     * Returns the number that should be shown in the utility’s nav item badge.
     *
     * If `0` is returned, no badge will be shown
     *
     * @return int
     */
    public static function badgeCount(): int
    {
        return 0;
    }

    /**
     * Returns the utility's content HTML.
     *
     * @return string
     */
    public static function contentHtml(): string
    {
        Craft::$app->getView()->registerAssetBundle(ChannelUtilityUtilityAsset::class);

        $someVar = 'Have a nice day!';
        return Craft::$app->getView()->renderTemplate(
            'channel/_components/utilities/ChannelUtility_content',
            [
                'someVar' => $someVar
            ]
        );
    }
}
