<?php
namespace verbb\wishlist\helpers;

/**
 * Reusser Feature Flags Helper
 *
 * Checks environment variables for feature flags.
 * All features are disabled by default and enabled via environment variables.
 *
 * Pattern: WISHLIST_REUSSER_{FEATURE_NAME}=true
 */
class ReusserFeatures
{
    /**
     * Check if a feature is enabled via environment variable
     *
     * @param string $feature The feature name (will be converted to uppercase)
     * @return bool
     */
    public static function isEnabled(string $feature): bool
    {
        $envKey = 'WISHLIST_REUSSER_' . strtoupper($feature);
        $value = getenv($envKey);

        if ($value === false) {
            return false;
        }

        return $value === '1' || $value === 'true' || strtolower($value) === 'true';
    }

    /**
     * Check if enhanced list view is enabled
     * Adds additional table columns: Customer Name, Email, Quote Status, Item Count
     *
     * @return bool
     */
    public static function enhancedListView(): bool
    {
        return self::isEnabled('ENHANCED_LIST_VIEW');
    }

    /**
     * Check if bulk actions are enabled
     * Adds bulk approve/deny actions to the list view
     *
     * @return bool
     */
    public static function bulkActions(): bool
    {
        return self::isEnabled('BULK_ACTIONS');
    }

    /**
     * Check if enhanced item view is enabled
     * Adds SKU, pricing columns to item tables
     *
     * @return bool
     */
    public static function enhancedItems(): bool
    {
        return self::isEnabled('ENHANCED_ITEMS');
    }

    /**
     * Check if quick export is enabled
     * Adds export button to toolbar
     *
     * @return bool
     */
    public static function quickExport(): bool
    {
        return self::isEnabled('QUICK_EXPORT');
    }
}
