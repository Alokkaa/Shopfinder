<?php
namespace Alokka\Shopfinder\Controller\Adminhtml\Shop;

class Save extends \Magento\Backend\App\Action
{
    /**
     * @var \Magento\Framework\Image\AdapterFactory
     */
    protected $adapterFactory;
    /**
     * @var \Magento\MediaStorage\Model\File\UploaderFactory
     */
    protected $uploader;
    /**
     * @var \Magento\Framework\Filesystem
     */
    protected $filesystem;

    /**
     * @var \Alokka\Shopfinder\Model\ShopFactory
     */
    var $shopFactory;

    /**
     * @param \Magento\Backend\App\Action\Context $context
     * @param \Alokka\Shopfinder\Model\ShopFactory $shopFactory
     */
    public function __construct(
        \Magento\Backend\App\Action\Context $context,
        \Magento\Framework\Image\AdapterFactory $adapterFactory,
        \Magento\MediaStorage\Model\File\UploaderFactory $uploader,
        \Magento\Framework\Filesystem $filesystem,
        \Alokka\Shopfinder\Model\ShopFactory $shopFactory
    ) {
        $this->adapterFactory = $adapterFactory;
        $this->uploader = $uploader;
        $this->filesystem = $filesystem;
        parent::__construct($context);
        $this->shopFactory = $shopFactory;
    }

    public function execute()
    {
        $data = $this->getRequest()->getPostValue();
        if (!$data) {
            $this->_redirect('shop/shop/addrow');
            return;
        }

        if (isset($_FILES['image']) && isset($_FILES['image']['name']) && strlen($_FILES['image']['name'])) {

        }
            try {
                if (isset($_FILES['image']) && isset($_FILES['image']['name']) && strlen($_FILES['image']['name'])) {
                    $base_media_path = 'alokka/test/images';
                    $uploader = $this->uploader->create(
                        ['fileId' => 'image']
                    );
                    $uploader->setAllowedExtensions(['jpg', 'jpeg', 'gif', 'png']);
                    $imageAdapter = $this->adapterFactory->create();
                    $uploader->addValidateCallback('image', $imageAdapter, 'validateUploadFile');
                    $uploader->setAllowRenameFiles(true);
                    $uploader->setFilesDispersion(true);
                    $mediaDirectory = $this->filesystem->getDirectoryRead(\Magento\Framework\App\Filesystem\DirectoryList::MEDIA);
                    $result = $uploader->save(
                        $mediaDirectory->getAbsolutePath($base_media_path)
                    );
                    $data['image'] = $base_media_path . $result['file'];
                }

                $rowData = $this->shopFactory->create();
                $rowData->setData($data);
                if (isset($data['id'])) {
                    $rowData->setEntityId($data['id']);
                }
                $rowData->save();
                $this->messageManager->addSuccess(__('Row data has been successfully saved.'));
        } catch (\Exception $e) {
            $this->messageManager->addError(__($e->getMessage()));
        }
        $this->_redirect('shop/shop/index');
    }

    /**
     * @return bool
     */
    protected function _isAllowed()
    {
        return $this->_authorization->isAllowed('Alokka_Shopfinder::save');
    }
}
