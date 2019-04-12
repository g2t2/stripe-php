<?php

namespace Stripe;

class TaxIdTest extends TestCase
{
    const TEST_CUSTOMER_ID = 'cus_123';
    const TEST_RESOURCE_ID = 'txi_123';

    public function testHasCorrectUrl()
    {
        $resource = \Stripe\Account::retrieveTaxId(self::TEST_CUSTOMER_ID, self::TEST_RESOURCE_ID);
        $this->assertSame(
            "/v1/customers/" . self::TEST_CUSTOMER_ID . "/tax_ids/" . self::TEST_RESOURCE_ID,
            $resource->instanceUrl()
        );
    }

    /**
     * @expectedException \Stripe\Error\InvalidRequest
     */
    public function testIsNotDirectlyRetrievable()
    {
        TaxId::retrieve(self::TEST_RESOURCE_ID);
    }
}
