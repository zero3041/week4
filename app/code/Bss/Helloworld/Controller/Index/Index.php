<?php
declare(strict_types=1);

namespace Bss\Helloworld\Controller\Index;

use Bss\Helloworld\Helper\Data;
use Magento\Framework\App\Action\HttpGetActionInterface;
use Magento\Framework\View\Result\PageFactory;

/**
 * Class Index
 * Returns data configuration
 */
class Index implements HttpGetActionInterface
{
    /**
     * @var PageFactory
     */
    private $pageFactory;

    /**
     * @var Data
     */
    protected $helperData;

    /**
     * Constructor for Index class.
     *
     * @param PageFactory $pageFactory
     * @param Data $helperData
     */
    public function __construct(
        PageFactory $pageFactory,
        Data $helperData
    ) {
        $this->helperData = $helperData;
        $this->pageFactory = $pageFactory;
    }

    /**
     * Executes the action and returns the result page.
     *
     * @return \Magento\Framework\App\ResponseInterface|\Magento\Framework\Controller\ResultInterface|\Magento\Framework\View\Result\Page
     */
    public function execute()
    {
        $displayText = $this->helperData->getGeneralConfig('display_text');
        $descriptionText = $this->helperData->getGeneralConfig('description_text');
        $resultPage = $this->pageFactory->create();

        // Set data to the block
        $resultPage->getLayout()->getBlock('helloworld_index_index')
            ->setData('display_text', $displayText)
            ->setData('description_text', $descriptionText);

        return $resultPage;
    }
}
