<?php
declare(strict_types=1);

namespace Bss\Helloworld\Helper;

use Magento\Framework\App\Helper\AbstractHelper;
use Magento\Store\Model\ScopeInterface;

/**
 * Helper class for retrieving configuration data related to the Helloworld module.
 * This class provides methods to fetch specific configuration values.
 */
class Data extends AbstractHelper
{
    public const XML_PATH_HELLOWORLD = 'helloworld/';

    /**
     * Get a configuration value.
     *
     * @param string $field   The configuration field
     * @param mixed  $storeId The store ID
     * @return mixed The configuration value
     */
    public function getConfigValue(string $field, $storeId = null)
    {
        return $this->scopeConfig->getValue(
            $field,
            ScopeInterface::SCOPE_STORE,
            $storeId
        );
    }

    /**
     * Get a general configuration value.
     *
     * @param string $code    The configuration code
     * @param mixed  $storeId The store ID
     * @return mixed The configuration value
     */
    public function getGeneralConfig(string $code, $storeId = null)
    {
        return $this->getConfigValue(
            self::XML_PATH_HELLOWORLD . 'general/' . $code,
            $storeId
        );
    }
}
