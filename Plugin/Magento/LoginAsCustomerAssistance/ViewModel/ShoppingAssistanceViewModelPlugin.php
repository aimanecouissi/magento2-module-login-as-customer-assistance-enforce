<?php
/**
 * Aimane Couissi - https://aimanecouissi.com
 * Copyright © Aimane Couissi 2026–present. All rights reserved.
 * Licensed under the MIT License. See LICENSE for details.
 */

declare(strict_types=1);

namespace AimaneCouissi\LoginAsCustomerAssistanceEnforce\Plugin\Magento\LoginAsCustomerAssistance\ViewModel;

use AimaneCouissi\LoginAsCustomerAssistanceEnforce\Model\Config;
use Magento\Customer\Model\Session as CustomerSession;
use Magento\LoginAsCustomerAssistance\ViewModel\ShoppingAssistanceViewModel;

class ShoppingAssistanceViewModelPlugin
{
    /**
     * @param Config $config
     * @param CustomerSession $customerSession
     */
    public function __construct(
        private readonly Config          $config,
        private readonly CustomerSession $customerSession
    )
    {
    }

    /**
     * @param ShoppingAssistanceViewModel $subject
     * @param bool $result
     * @return bool
     */
    public function afterIsLoginAsCustomerEnabled(ShoppingAssistanceViewModel $subject, bool $result): bool
    {
        return $result && !$this->config->isShoppingAssistanceEnforcementEnabled();
    }

    /**
     * @param ShoppingAssistanceViewModel $subject
     * @param bool $result
     * @return bool
     */
    public function afterIsAssistanceAllowed(ShoppingAssistanceViewModel $subject, bool $result): bool
    {
        if ($this->config->isShoppingAssistanceEnforcementEnabled() || $this->customerSession->isLoggedIn()) {
            return $result;
        }
        return $result || $this->config->isShoppingAssistanceAutoCheckEnabled();
    }
}
