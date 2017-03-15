<?php
/**
 * RKD Banklink.
 *
 * @link https://github.com/renekorss/Banklink/
 *
 * @author Rene Korss <rene.korss@gmail.com>
 * @copyright 2016 Rene Korss
 * @license MIT
 */
namespace RKD\Banklink;

use RKD\Banklink\Protocol\IPizza;

/**
 * Banklink settings for SEB.
 *
 * For more information, please visit:
 * http://www.seb.ee/eng/business/everyday-banking/collection-payments/collection-payments-internet
 *
 * @author  Rene Korss <rene.korss@gmail.com>
 */
class SEB extends Banklink
{
    /**
     * Request url.
     *
     * @var string
     */
    protected $requestUrl = 'https://www.seb.ee/cgi-bin/unet3.sh/ipank.r';

    /**
     * Test request url.
     *
     * @var string
     */
    protected $testRequestUrl = 'http://localhost:8080/banklink/seb-common';

    /**
     * Force SEB class to use IPizza protocol.
     *
     * @param RKD\Banklink\Protocol\IPizza $protocol   Protocol used
     */
    public function __construct(IPizza $protocol)
    {
        parent::__construct($protocol);
    }

    /**
     * Override encoding field.
     */
    protected function getEncodingField()
    {
        return 'VK_ENCODING';
    }

    /**
     * SEB uses UTF-8.
     *
     * @return array Array of additional fields to send to bank
     */
    protected function getAdditionalFields()
    {
        return array(
            'VK_ENCODING' => $this->requestEncoding,
        );
    }
}
