<?php

class Comment
{
	private $data = array();
	
	public function __construct($row)
	{
		/*
		/	The constructor
		*/
		
		$this->data = $row;
	}
	
	public function markup()
	{
		/*
		/	This method outputs the XHTML markup of the comment
		*/
		
		// Setting up an alias, so we don't have to write $this->data every time:
		$d = &$this->data;
		
		return '
		
			<div class="comment">
				<div class="avatar">
					<img src="images/default_avatar.gif" />
				</div>
				
				<div class="name">Anonimous</div>
				<div class="date" title="Added at '.date(DATE_RFC822, $d['timestamp_insert']).'">'.date(DATE_RFC822, $d['timestamp_insert']).'</div>
				<p>'.$d['comment'].'</p>
			</div>
		';
	}
	
	public static function validate(&$arr)
	{
		/*
		/	This method is used to validate the data sent via AJAX.
		/
		/	It return true/false depending on whether the data is valid, and populates
		/	the $arr array passed as a paremter (notice the ampersand above) with
		/	either the valid input data, or the error messages.
		*/
		
		$errors = array();
		$data	= array();
		
		// Using the filter_input function introduced in PHP 5.2.0
		
		// Using the filter with a custom callback function:		
		if(!($data['comment'] = filter_input(INPUT_POST,'comment',FILTER_CALLBACK,array('options'=>'Comment::validate_text'))))
		{
			$errors['comment'] = 'Please enter a comment body.';
		}
		
		if(!($data['vote'] = filter_input(INPUT_POST,'vote',FILTER_CALLBACK,array('options'=>'Comment::validate_text'))))
		{
			$errors['vote'] = 'Please enter a vote.';
		}
		
		if(!($data['video_ID'] = filter_input(INPUT_POST,'video_ID',FILTER_CALLBACK,array('options'=>'Comment::validate_text'))))
		{
			$errors['video_ID'] = 'Please enter a vote.';
		}
		
		if(!empty($errors)){
			
			// If there are errors, copy the $errors array to $arr:
			
			$arr = $errors;
			return false;
		}
		
		// If the data is valid, sanitize all the data and copy it to $arr:
		
		foreach($data as $k=>$v){
			$arr[$k] = mysql_real_escape_string($v);
		}
		
		return true;
		
	}

	private static function validate_text($str)
	{
		/*
		/	This method is used internally as a FILTER_CALLBACK
		*/
		
		if(mb_strlen($str,'utf8')<1)
			return false;
		
		// Encode all html special characters (<, >, ", & .. etc) and convert
		// the new line characters to <br> tags:
		
		$str = nl2br(htmlspecialchars($str));
		
		// Remove the new line characters that are left
		$str = str_replace(array(chr(10),chr(13)),'',$str);
		
		return $str;
	}

}

?>