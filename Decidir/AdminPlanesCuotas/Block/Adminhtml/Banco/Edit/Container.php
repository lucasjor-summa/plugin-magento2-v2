<?php

namespace Decidir\AdminPlanesCuotas\Block\Adminhtml\Banco\Edit;

/**
 * Class Container
 *
 * @description Contenedor del formulario para editar una banco de credito.
 *
 */
class Container extends \Magento\Backend\Block\Widget\Form\Container
{
    /**
     * Core registry.
     *
     * @var \Magento\Framework\Registry
     */
    protected $_coreRegistry = null;

    /**
     * @param \Magento\Backend\Block\Widget\Context $context
     * @param \Magento\Framework\Registry           $registry
     * @param array                                 $data
     */
    public function __construct(
        \Magento\Backend\Block\Widget\Context $context,
        \Magento\Framework\Registry $registry,
        array $data = []
    )
    {
        $this->_coreRegistry = $registry;
        parent::__construct($context, $data);
    }

    /**
     * Initialize Imagegallery Images Edit Block.
     */
    protected function _construct()
    {
        $this->_objectId   = 'row_id';
        $this->_blockGroup = 'Decidir_AdminPlanesCuotas';
        $this->_controller = 'adminhtml_banco';
        parent::_construct();

        if ($this->_isAllowedAction('Decidir_AdminPlanesCuotas::banco_save'))
        {
            $this->buttonList->update('save', 'label', __('Save'));
        } else
        {
            $this->buttonList->remove('save');
        }
        $this->buttonList->remove('reset');

        $this->buttonList->update('back', 'onclick', "setLocation('" . $this->getUrl('adminplanescuotas/banco/admin') . "')");
    }

    /**
     * Retrieve text for header element depending on loaded image.
     *
     * @return \Magento\Framework\Phrase
     */
    public function getHeaderText()
    {
        return __('Add RoW Data');
    }

    /**
     * Check permission for passed action.
     *
     * @param string $resourceId
     *
     * @return bool
     */
    protected function _isAllowedAction($resourceId)
    {
        return $this->_authorization->isAllowed($resourceId);
    }

    /**
     * Get form action URL.
     *
     * @return string
     */
    public function getFormActionUrl()
    {
        if ($this->hasFormActionUrl())
        {
            return $this->getData('form_action_url');
        }

        return $this->getUrl('*/*/save');
    }
}