<?php
declare(strict_types=1);

namespace Bss\Helloworld\Controller\Index;

use Magento\Framework\App\Action\Context;
use Magento\Framework\App\Action\HttpGetActionInterface;
use Magento\Framework\App\RequestInterface;
use Magento\Framework\View\Result\PageFactory;

/**
 * Controller to provide information.
 */
class Info implements HttpGetActionInterface
{
    /**
     * @var Context
     */
    protected $context;

    /**
     * @var PageFactory
     */
    protected $resultPageFactory;

    /**
     * @var RequestInterface
     */
    protected $request;

    /**
     * Constructor
     *
     * @param Context $context
     * @param PageFactory $resultPageFactory
     * @param RequestInterface $request
     */
    public function __construct(
        Context $context,
        PageFactory $resultPageFactory,
        RequestInterface $request
    ) {
        $this->context = $context;
        $this->resultPageFactory = $resultPageFactory;
        $this->request = $request;
    }

    /**
     * Executes the action and returns the result page.
     *
     * @return \Magento\Framework\View\Result\Page
     */
    public function execute()
    {
        $params = $this->request->getParams();
        return $this->createPage($params);
    }

    /**
     * Create a page with provided data.
     *
     * @param array $data
     * @return \Magento\Framework\View\Result\Page
     */
    private function createPage($data = [])
    {
        $resultPage = $this->resultPageFactory->create();
        $block = $resultPage->getLayout()->getBlock('helloworld_index_info');
        if ($block && !empty($data)) {
            $block->setData($data);
        }
        return $resultPage;
    }
}
