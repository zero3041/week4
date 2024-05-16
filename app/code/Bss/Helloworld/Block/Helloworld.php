<?php
declare(strict_types=1);

namespace Bss\Helloworld\Block;

use Magento\Framework\View\Element\Template;

/**
 * Class Helloworld
 *
 * This class shows text
 */
class Helloworld extends Template
{
    /**
     * Get Helloworld Data
     *
     * This function returns the Helloworld data.
     *
     * @return string
     */
    public function getHelloworldData(): string
    {
        return 'BSS Helloworld block file call successfully';
    }

    /**
     * Get Display Text
     *
     * This function returns the display text set by the controller.
     *
     * @return string|null
     */
    public function getDisplayText(): ?string
    {
        return $this->getData('display_text');
    }

    /**
     * Get Description Text
     *
     * This function returns the description text set by the controller.
     *
     * @return string|null
     */
    public function getDescriptionText(): ?string
    {
        return $this->getData('description_text');
    }
}
