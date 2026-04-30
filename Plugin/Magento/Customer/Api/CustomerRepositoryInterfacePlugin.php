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
        private readonly Config                $config
    )
    {
    }

    /**
     * @param CustomerRepositoryInterface $subject
     * @param CustomerInterface $customer
     * @param string|null $passwordHash
     * @return array
     */
    public function beforeSave(
        CustomerRepositoryInterface $subject,
        CustomerInterface           $customer,
        ?string                     $passwordHash = null
    ): array
    {
        if ($this->shouldEnforceShoppingAssistance($customer)) {
            $extensionAttributes = $customer->getExtensionAttributes();
            $extensionAttributes->setAssistanceAllowed(IsAssistanceEnabledInterface::ALLOWED);
            $customer->setExtensionAttributes($extensionAttributes);
        }
        return [$customer, $passwordHash];
    }

    /**
     * @param CustomerInterface $customer
     * @return bool
     */
    private function shouldEnforceShoppingAssistance(CustomerInterface $customer): bool
    {
        return $this->loginAsCustomerConfig->isEnabled()
            && $this->config->isShoppingAssistanceEnforcementEnabled((int)$customer->getWebsiteId());
    }
}
