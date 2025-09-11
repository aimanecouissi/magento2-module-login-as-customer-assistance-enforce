<?php

declare(strict_types=1);

namespace AimaneCouissi\LoginAsCustomerAssistanceEnforce\Plugin\LoginAsCustomerAssistance\ViewModel;

use AimaneCouissi\LoginAsCustomerAssistanceEnforce\Helper\Data as ModuleDataHelper;
use Magento\LoginAsCustomerAssistance\ViewModel\ShoppingAssistanceViewModel;

class ShoppingAssistanceViewModelPlugin
{
    /**
     * @param ModuleDataHelper $moduleDataHelper
     */
    public function __construct(private readonly ModuleDataHelper $moduleDataHelper)
    {
    }

    public function afterIsLoginAsCustomerEnabled(ShoppingAssistanceViewModel $subject, bool $result): bool
    {
        return $result && !$this->moduleDataHelper->shouldEnforceShoppingAssistance();
    }
}
