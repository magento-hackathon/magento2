<?php
/**
 * Magento
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the Open Software License (OSL 3.0)
 * that is bundled with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * http://opensource.org/licenses/osl-3.0.php
 * If you did not receive a copy of the license and are unable to
 * obtain it through the world-wide-web, please send an email
 * to license@magentocommerce.com so we can send you a copy immediately.
 *
 * DISCLAIMER
 *
 * Do not edit or add to this file if you wish to upgrade Magento to newer
 * versions in the future. If you wish to customize Magento for your
 * needs please refer to http://www.magentocommerce.com for more information.
 *
 * @category    Magento
 * @package     Magento_Sales
 * @copyright   Copyright (c) 2014 X.commerce, Inc. (http://www.magentocommerce.com)
 * @license     http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 */

namespace Magento\Sales\Controller\Adminhtml;

/**
 * Adminhtml sales creditmemos controller
 *
 * @author      Magento Core Team <core@magentocommerce.com>
 */
class Creditmemo extends \Magento\Sales\Controller\Adminhtml\Creditmemo\AbstractCreditmemo
{
    /**
     * Export creditmemo grid to CSV format
     */
    public function exportCsvAction()
    {
        $this->_view->loadLayout();
        $fileName = 'creditmemos.csv';
        /** @var \Magento\Backend\Block\Widget\Grid\ExportInterface $exportBlock  */
        $exportBlock = $this->_view->getLayout()->getChildBlock('sales.creditmemo.grid', 'grid.export');
        return $this->_fileFactory->create($fileName, $exportBlock->getCsvFile(), \Magento\App\Filesystem::VAR_DIR);
    }

    /**
     *  Export creditmemo grid to Excel XML format
     */
    public function exportExcelAction()
    {
        $this->_view->loadLayout();
        $fileName = 'creditmemos.xml';
        /** @var \Magento\Backend\Block\Widget\Grid\ExportInterface $exportBlock  */
        $exportBlock = $this->_view->getLayout()->getChildBlock('sales.creditmemo.grid', 'grid.export');
        return $this->_fileFactory->create(
            $fileName,
            $exportBlock->getExcelFile($fileName),
            \Magento\App\Filesystem::VAR_DIR
        );
    }
}
