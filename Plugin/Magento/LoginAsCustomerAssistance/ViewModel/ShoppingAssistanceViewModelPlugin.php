<?php
/**
 * Aimane Couissi - https://aimanecouissi.com
 * Copyright © Aimane Couissi 2026–present. All rights reserved.
 * Licensed under the MIT License. See LICENSE for details.
 */

declare(strict_types=1);

namespace AimaneCouissi\LoginAsCustomerAssistanceEnforce\Plugin\Magento\LoginAsCustomerAssistance\ViewModel;

use AimaneCouissi\LoginAsCustomerAssistanceEnforce\Model\Config;
use Magento\LoginAsCustomerAssistance\ViewModel\ShoppingAssistanceViewModel;

class ShoppingAssistanceViewModelPlugin
{
    /**
     * @param Config $config
     */
    public function __construct(private readonly Config $config)
    {
    }

    /**
     * Returns false when enforcement is enabled to suppress the opt-in checkbox.
     *
     * @param ShoppingAssistanceViewModel $subject
     * @param bool $result
     * @return bool
     */
    public function afterIsLoginAsCustomerEnabled(ShoppingAssistanceViewModel $subject, bool $result): bool
    {
        return $result && !$this->config->isShoppingAssistanceEnforced();
    }
}
