<?php
/**
 * Aimane Couissi - https://aimanecouissi.com
 * Copyright © Aimane Couissi 2026–present. All rights reserved.
 * Licensed under the MIT License. See LICENSE for details.
 */

declare(strict_types=1);

namespace AimaneCouissi\LoginAsCustomerAssistanceEnforce\Plugin\Magento\Customer\Api;

use AimaneCouissi\LoginAsCustomerAssistanceEnforce\Model\Config;
use Magento\Customer\Api\CustomerRepositoryInterface;
use Magento\Customer\Api\Data\CustomerInterface;
use Magento\LoginAsCustomerApi\Api\ConfigInterface as LoginAsCustomerConfig;
use Magento\LoginAsCustomerAssistance\Api\IsAssistanceEnabledInterface;

class CustomerRepositoryInterfacePlugin
{
    /**
     * @param LoginAsCustomerConfig $loginAsCustomerConfig
     * @param Config $config
     */
    public function __construct(
        private readonly LoginAsCustomerConfig $loginAsCustomerConfig,
        private readonly Config                $config,
    )
    {
    }

    /**
     * Forces the assistance_allowed extension attribute when enforcement is enabled.
     *
     * @param CustomerRepositoryInterface $subject
     * @param CustomerInterface $customer
     * @param string|null $passwordHash
     * @return array
     */
    public function beforeSave(CustomerRepositoryInterface $subject, CustomerInterface $customer, ?string $passwordHash = null): array
    {
        if ($this->loginAsCustomerConfig->isEnabled() && $this->config->isShoppingAssistanceEnforced()) {
            $extensionAttributes = $customer->getExtensionAttributes();
            $extensionAttributes->setAssistanceAllowed(IsAssistanceEnabledInterface::ALLOWED);
            $customer->setExtensionAttributes($extensionAttributes);
        }
        return [$customer, $passwordHash];
    }
}
