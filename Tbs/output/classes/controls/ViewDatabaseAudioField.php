<?php
class ViewDatabaseAudioField extends ViewControl
{
	public function showDBValue(&$data, $keylink)
	{	
		$value = "";
		$title = "";
		$titleField = $this->container->pSet->getAudioTitleField($this->field);
		if ($titleField)
			$title = runner_htmlspecialchars( $data[$titleField] );
		
		if (@$data[$this->field] != NULL && $this->container->pageType != PAGE_PRINT)
		{
			if( !$title)
				$title = "Track.mp3";
			$href = GetTableLink('getfile', '', 'table='.GetTableURL($this->container->pSet->_table).'&field='.rawurlencode($this->field).$keylink.'&filename='.$title);
			$link = '<a title="'.$title.'" href="'.$href.'">'.$title.'</a>';
			$value = '<audio controls preload="none" src="'.$href.'">'.$link.'</audio>';
		}
		else
			$value = $title;
		
		return $value;
	}
	
	/**
	 * Get the field's content that will be exported
	 * @prarm &Array data
	 * @prarm String keylink
	 * @return String
	 */
	public function getExportValue(&$data, $keylink = "")
	{
		return "LONG BINARY DATA - CANNOT BE DISPLAYED";
	}
}
?>