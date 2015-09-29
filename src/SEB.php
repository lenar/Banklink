<?php
namespace RKD\Banklink;

use RKD\Banklink\Protocol\iPizza;

/**
 * Banklink settings for SEB
 *
 * For more information, please visit: http://www.seb.ee/eng/business/everyday-banking/collection-payments/collection-payments-internet
 *
 * @author  Rene Korss <rene.korss@gmail.com>
 */

class SEB extends Banklink{

    protected $responseUrl     = 'https://www.seb.ee/cgi-bin/unet3.sh/un3min.r';
    protected $testResponseUrl = 'http://localhost:8080/banklink/seb-common';

    /**
     * Force SEB class to use iPizza protocol
     *
     * @param RKD\Banklink\Protocol\iPizza $protocol
     * @param boolean Is in debug mode?
     * @param string Response URL
     *
     * @return void
     */

    public function __construct(iPizza $protocol, $debug = false, $requestUrl = null){
        parent::__construct($protocol, $debug, $requestUrl);
    }

    /**
     * Override encoding field
     */

    protected function getEncodingField(){
        return 'VK_CHARSET';
    }

    /**
     * SEB uses UTF-8
     *
     * @return array Array of additiona fields to send to bank
     */
    protected function getAdditionalFields(){
        return array(
            'VK_CHARSET' => $this->requestEncoding
        );
    }
}