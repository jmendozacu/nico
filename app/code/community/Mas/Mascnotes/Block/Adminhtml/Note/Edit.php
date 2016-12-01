<?php
/**
 * Mas_Mascnotes extension by Makarovsoft.com
 * 
 * @category   	Mas
 * @package		Mas_Mascnotes
 * @copyright  	Copyright (c) 2014
 * @license		http://makarovsoft.com/license.txt
 * @author		makarovsoft.com
 */
/**
 * Note admin edit block
 *
 * @category	Mas
 * @package		Mas_Mascnotes
 * 
 */
class Mas_Mascnotes_Block_Adminhtml_Note_Edit extends Mage_Adminhtml_Block_Widget_Form_Container{
	/**
	 * constuctor
	 * @access public
	 * @return void
	 * 
	 */
	public function __construct(){
		parent::__construct();
		$this->_blockGroup = 'mascnotes';
		$this->_controller = 'adminhtml_note';
		$this->_updateButton('save', 'label', Mage::helper('mascnotes')->__('Save Note'));
		$this->_updateButton('delete', 'label', Mage::helper('mascnotes')->__('Delete Note'));
		$this->_addButton('saveandcontinue', array(
			'label'		=> Mage::helper('mascnotes')->__('Save And Continue Edit'),
			'onclick'	=> 'saveAndContinueEdit()',
			'class'		=> 'save',
		), -100);
		$this->_formScripts[] = "
			function saveAndContinueEdit(){
				editForm.submit($('edit_form').action+'back/edit/');
			}
		";
	}
	/**
	 * get the edit form header
	 * @access public
	 * @return string
	 * 
	 */
	public function getHeaderText(){
		if( Mage::registry('note_data') && Mage::registry('note_data')->getId() ) {
			return Mage::helper('mascnotes')->__("Edit Note '%s'", $this->htmlEscape(strip_tags(Mage::registry('note_data')->getNote())));
		} 
		else {
			return Mage::helper('mascnotes')->__('Add Note');
		}
	}
}