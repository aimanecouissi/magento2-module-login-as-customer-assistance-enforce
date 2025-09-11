<?php

declare(strict_types=1);

namespace AimaneCouissi\LoginAsCustomerAssistanceEnforce\Plugin\Customer\Api;

use AimaneCouissi\LoginAsCustomerAssistanceEnforce\Helper\Data as ModuleDataHelper;
use Magento\Customer\Api\CustomerRepositoryInterface;
use Magento\Customer\Api\Data\CustomerInterface;
use Magento\LoginAsCustomerApi\Api\ConfigInterface as LoginAsCustomerConfig;
use Magento\LoginAsCustomerAssistance\Api\IsAssistanceEnabledInterface;

class CustomerRepositoryInterfacePlugin
{
    /**
     * @param LoginAsCustomerConfig $loginAsCustomerConfig
     * @param ModuleDataHelper $moduleDataHelper
     */
    public function __construct(
        private readonly LoginAsCustomerConfig $loginAsCustomerConfig,
        private readonly ModuleDataHelper      $moduleDataHelper,
    )
    {
    }

    /**
     * Force assistance_allowed extension attribute when enforcement is enabled.
     *
     * @param CustomerRepositoryInterface $subject
     * @param CustomerInterface $customer
     * @param $passwordHash
     * @return array
     */
    public function beforeSave(CustomerRepositoryInterface $subject, CustomerInterface $customer, $passwordHash = null): array
    {
        if ($this->loginAsCustomerConfig->isEnabled() && $this->moduleDataHelper->shouldEnforceShoppingAssistance()) {
            $extensionAttributes = $customer->getExtensionAttributes();
            $extensionAttributes->setAssistanceAllowed(IsAssistanceEnabledInterface::ALLOWED);
            $customer->setExtensionAttributes($extensionAttributes);
        }
        return [$customer, $passwordHash];
    }
}
