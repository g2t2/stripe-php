<?php

namespace Stripe;

/**
 * Class TaxId
 *
 * @package Stripe
 *
 * @property string $id
 * @property string $object
 * @property string $country
 * @property int $created
 * @property string $customer
 * @property bool $deleted
 * @property bool $livemode
 * @property type $type
 * @property string $value
 * @property mixed $verification
 */
class TaxId extends ApiResource
{

    const OBJECT_NAME = "tax_id";

    use ApiOperations\Delete;

    /**
     * Possible string representations of a tax id's type.
     * @link https://stripe.com/docs/api/customers/tax_id_object#tax_id_object-type
     */
    const TYPE_AU_ABN  = 'au_abn';
    const TYPE_EU_VAT  = 'eu_vat';
    const TYPE_NZ_GST  = 'nz_gst';
    const TYPE_UNKNOWN = 'unknown';

    /**
     * @return string The API URL for this tax id.
     */
    public function instanceUrl()
    {
        $id = $this['id'];
        $customer = $this['customer'];
        if (!$id) {
            throw new Error\InvalidRequest(
                "Could not determine which URL to request: class instance has invalid ID: $id",
                null
            );
        }
        $id = Util\Util::utf8($id);
        $customer = Util\Util::utf8($customer);

        $base = Account::classUrl();
        $customerExtn = urlencode($customer);
        $extn = urlencode($id);
        return "$base/$customerExtn/tax_ids/$extn";
    }

    /**
     * @param array|string $_id
     * @param array|string|null $_opts
     *
     * @throws \Stripe\Error\InvalidRequest
     */
    public static function retrieve($_id, $_opts = null)
    {
        $msg = "Tax Ids cannot be accessed without a customer ID. " .
               "Retrieve a Tax Id using \$account->retrieveTaxId('tax_id') instead.";
        throw new Error\InvalidRequest($msg, null);
    }
}
