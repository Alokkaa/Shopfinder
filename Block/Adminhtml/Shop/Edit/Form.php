<?php
namespace Alokka\Shopfinder\Block\Adminhtml\Shop\Edit;

/**
 * Adminhtml Add New Row Form.
 */
class Form extends \Magento\Backend\Block\Widget\Form\Generic
{
    /**
     * @var \Magento\Store\Model\System\Store
     */
    protected $_systemStore;
    protected $_countryFactory;
    /**
     * @param \Magento\Backend\Block\Template\Context $context,
     * @param \Magento\Framework\Registry $registry,
     * @param \Magento\Framework\Data\FormFactory $formFactory,
     * @param \Alokka\Shopfinder\Model\Status $options,
     */
    public function __construct(
        \Magento\Backend\Block\Template\Context $context,
        \Magento\Framework\Registry $registry,
        \Magento\Framework\Data\FormFactory $formFactory,
        \Alokka\Shopfinder\Model\Status $options,
        \Magento\Directory\Model\Config\Source\Country $countryFactory,
        array $data = []
    ) {
        $this->_options = $options;
        $this->_countryFactory = $countryFactory;
        parent::__construct($context, $registry, $formFactory, $data);
    }

    /**
     * Prepare form.
     *
     * @return $this
     */
    protected function _prepareForm()
    {
        $dateFormat = $this->_localeDate->getDateFormat(\IntlDateFormatter::SHORT);
        $model = $this->_coreRegistry->registry('row_data');
        $form = $this->_formFactory->create(
            ['data' => [
                            'id' => 'edit_form',
                            'enctype' => 'multipart/form-data',
                            'action' => $this->getData('action'),
                            'method' => 'post'
                        ]
            ]
        );

        if ($model->getEntityId()) {
            $fieldset = $form->addFieldset(
                'base_fieldset',
                ['legend' => __('Edit Row Data'), 'class' => 'fieldset-wide']
            );
            $fieldset->addField('entity_id', 'hidden', ['name' => 'entity_id']);
        } else {
            $fieldset = $form->addFieldset(
                'base_fieldset',
                ['legend' => __('Add Row Data'), 'class' => 'fieldset-wide']
            );
        }

        $fieldset->addField(
            'shop_name',
            'text',
            [
                'name' => 'shop_name',
                'label' => __('Shop Name'),
                'id' => 'shop_name',
                'title' => __('Shop Name'),
                'class' => 'required-entry',
                'required' => true,
            ]
        );

        $fieldset->addField(
            'identifier',
            'text',
            [
                'name' => 'identifier',
                'label' => __('Identifier'),
                'id' => 'identifier',
                'title' => __('Identifier'),
                'class' => 'required-entry',
                'required' => true,
            ]
        );

        $fieldset->addField(
            'country',
            'select',
            [
                'name' => 'country',
                'label' => __('Country'),
                'id' => 'country',
                'title' => __('Country'),
                'class' => 'required-entry',
                'required' => true,
                'values' => $this->_countryFactory->toOptionArray(),
            ]
        );

        $fieldset->addField(
            'image',
            'image',
            [
                'name' => 'image',
                'label' => __('Image'),
                'id' => 'image',
                'title' => __('Image'),
                'required' => false,
                'note' => 'Allow image type: jpg, jpeg, gif, png',
            ]
        );

        $form->setValues($model->getData());
        $form->setUseContainer(true);
        $this->setForm($form);

        return parent::_prepareForm();
    }
}
