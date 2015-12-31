<?php

/*
 * This file is part of the ONGR package.
 *
 * (c) NFQ Technologies UAB <info@nfq.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace ONGR\CurrencyExchangeBundle\Document;

use ONGR\ElasticsearchBundle\Annotation as ES;
use ONGR\ElasticsearchBundle\Document\DocumentTrait;

/**
 * Stores currency rates.
 *
 * @ES\Document(type="currency", ttl={"enabled":true, "default": "14d"})
 */
class CurrencyDocument
{
    use DocumentTrait;

    /**
     * @var RatesObject
     *
     * @ES\Embedded(class="ONGRCurrencyExchangeBundle:RatesObject", multiple=true)
     */
    public $rates;

    /**
     * @var \DateTime
     *
     * @ES\Property(type="date")
     */
    public $createdAt;

    /**
     * @return RatesObject
     */
    public function getRates()
    {
        return $this->rates;
    }

    /**
     * @param RatesObject $rates
     */
    public function setRates($rates)
    {
        $this->rates = $rates;
    }

    /**
     * @return \DateTime
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * @param \DateTime $createdAt
     */
    public function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;
    }
}
