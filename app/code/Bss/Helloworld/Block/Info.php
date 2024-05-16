<?php
declare(strict_types=1);

namespace Bss\Helloworld\Block;

use Magento\Framework\View\Element\Template;

/**
 * abc
 */
class Info extends Template
{
    /**
     * Retrieve information data
     *
     * @return array
     */
    public function getInfoData(): array
    {
        return [
            'name' => $this->getData('name') ?: 'b',
            'dob' => $this->getData('dob') ?: '1',
            'address' => $this->getData('address') ?: '1',
            'description' => $this->getData('description') ?: '1',
        ];
    }
}
