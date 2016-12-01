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
 * Note - product relation resource model collection
 *
 * @category	Mas
 * @package		Mas_Mascnotes
 * 
 */
class Mas_Mascnotes_Model_Resource_Note_Customer_Collection extends Mage_Customer_Model_Resource_Customer_Collection {
	/**
	 * remember if fields have been joined
	 * @var bool
	 */
	protected $_joinedFields = false;
	/**
	 * join the link table
	 * @access public
	 * @return Mas_Mascnotes_Model_Resource_Note_Customer_Collection
	 * 
	 */
	public function joinFields(){
		if (!$this->_joinedFields){
			$this->getSelect()->join(
				array('related' => $this->getTable('mascnotes/note_customer')),
				'related.customer_id = e.entity_id',
				array('position')
			);
			$this->_joinedFields = true;
		}
		return $this;
	}
	/**
	 * add note filter
	 * @access public
	 * @param Mas_Mascnotes_Model_Note | int $note
	 * @return Mas_Mascnotes_Model_Resource_Note_Customer_Collection
	 * 
	 */
	public function addNoteFilter($note){
		if ($note instanceof Mas_Mascnotes_Model_Note){
			$note = $note->getId();
		}
		if (!$this->_joinedFields){
			$this->joinFields();
		}
		$this->getSelect()->where('related.note_id = ?', $note);
		return $this;
	}
}