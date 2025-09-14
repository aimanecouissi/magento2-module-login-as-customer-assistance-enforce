# AimaneCouissi_LoginAsCustomerAssistanceEnforce

Enforces **Login as Customer – Shopping Assistance** and removes the storefront opt-out checkbox.

## Installation
```bash
composer require aimanecouissi/module-login-as-customer-assistance-enforce
bin/magento module:enable AimaneCouissi_LoginAsCustomerAssistanceEnforce
bin/magento setup:upgrade
bin/magento cache:flush
```

## Configuration
- **Stores → Configuration → Customers → Login as Customer → Login as Customer Settings → Enforce Shopping Assistance**  
- Set to **Yes** to enforce shopping assistance and hide the opt-out option from customers during account creation.

## Usage
When enforcement is enabled, customers cannot opt out of shopping assistance on the storefront.  
To verify:
- Check that the **Shopping Assistance** opt-out checkbox is not shown during account creation on storefront.
- Go to **Customers → All Customers → Edit** → *Account Information*; the **Shopping Assistance** field is enabled and cannot be turned off.

## Uninstall
```bash
bin/magento module:disable AimaneCouissi_LoginAsCustomerAssistanceEnforce
composer remove aimanecouissi/module-login-as-customer-assistance-enforce
bin/magento setup:upgrade
bin/magento cache:flush
```

## License
[MIT](LICENSE)
