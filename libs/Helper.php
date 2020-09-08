<?php
class Helper{
	
	// Create Button
	public static function cmsButton($name, $id, $link, $icon, $type = 'new'){
		$xhtml  = '<li class="button" id="'.$id.'">';
		if($type == 'new'){
			$xhtml .= '<a class="modal" href="'.$link.'"><span class="'.$icon.'"></span>'.$name.'</a>';
		}else if($type == 'submit'){
			$xhtml .= '<a class="modal" href="#" onclick="javascript:submitForm(\''.$link.'\');"><span class="'.$icon.'"></span>'.$name.'</a>';
		}
		$xhtml .= '</li>';
		
		return $xhtml;
	}
	
	// Create Icon Status
	public static function cmsStatus($statusValue, $link, $id){
		$strStatus = ($statusValue == 0) ? 'unpublish' : 'publish';

		$xhtml		= '<a class="jgrid" id="status-'.$id.'" href="javascript:changeStatus(\''.$link.'\');">
							<span class="state '.$strStatus.'"></span>
						</a>';
		return $xhtml;
	}
	
	// Create Icon Special
	public static function cmsSpecial($statusValue, $link, $id){
		$strStatus = ($statusValue == 0) ? 'unpublish' : 'publish';
	
		$xhtml		= '<a class="jgrid" id="special-'.$id.'" href="javascript:changeSpecial(\''.$link.'\');">
							<span class="state '.$strStatus.'"></span>
						</a>';
		return $xhtml;
	}
	
	// Create Icon Group ACP
	public static function cmsGroupACP($groupAcpValue, $link, $id){
		$strGroupACP 	= ($groupAcpValue == 0) ? 'unpublish' : 'publish';
	
		$xhtml			= '<a class="jgrid" id="group-acp-'.$id.'" href="javascript:changeGroupACP(\''.$link.'\');">
								<span class="state '.$strGroupACP.'"></span>
							</a>';
		return $xhtml;
	}
	
	// Create Title sort
	public static function cmsLinkSort($name, $column, $columnPost, $orderPost){
		$icon	= '';
		$order	= ($orderPost == 'asc') ? 'desc' : 'asc';
		if($column == $columnPost){
			$icon	= ($order == 'asc') ? ' <i class="fas fa-arrow-down"></i>' : ' <i class="fas fa-arrow-up"></i>';
		}
		$xhtml = '<span style="cursor:pointer;" onclick="javascript:sortList(\''.$column.'\',\''.$order.'\')">'.$name.$icon.'</span>';
		return $xhtml;
	}
	
	// Create Message
	public static function cmsMessage($message){
		$xhtml = '';
		if(!empty($message)){
			$xhtml = '<dl id="system-message">
							<dt class="'.$message['class'].'">'.ucfirst($message['class']).'</dt>
							<dd class="'.$message['class'].' message">
								<ul>
									<li>'.$message['content'].'</li>
								</ul>
							</dd>
						</dl>';
		}
		return $xhtml;
	}
	
	// Create Selectbox
	public static function cmsSelectbox($name, $class, $arrValue, $keySelect = 'default' ,$style = null, $error = null,$event = null){
		$onchange = ($event != null)? 'onChange="'.$event.'();"' : '';
		$xhtml = '<select style="'.$style.'" name="'.$name.'" class="'.$class.'" '.$onchange.' >';
		foreach($arrValue as $key => $value){
			if($key == $keySelect){
				$xhtml .= '<option selected="selected" value = "'.$key.'">'.$value.'</option>';
			}else{
				$xhtml .= '<option value = "'.$key.'">'.$value.'</option>';
			}
		}
		$xhtml .= '</select>';
		if($error != null) $xhtml .= Helper::createError($error);
		return $xhtml;
	}
	
	// Create Input
	public static function cmsInput($type, $name, $value, $class = null, $size = null){
		$strSize	=	($size==null) ? '' : "size='$size'";
		$strClass	=	($class==null) ? '' : "class='$class'";
		
		$xhtml = "<input type='$type' name='$name'  value='$value' $strClass $strSize>";
		
		return $xhtml;
	}
	
	// Create Row - ADMIN
	public static function cmsRowForm($lblName, $input, $require = false){
		$strRequired = '';
		if($require == true ) $strRequired = '<span class="star">&nbsp;*</span>';
		$xhtml = '<li><label>'.$lblName.$strRequired.'</label>'.$input.'</li>';
	
		return $xhtml;
	}
	
	// Create Row - PUBLIC
	public static function cmsRow($lblName, $input, $submit = false){
		if($submit==false){
			$xhtml = '<div class="form_row"><label class="contact"><strong>'.$lblName.':</strong></label>'.$input.'</div>';
		}else{
			$xhtml = '<div class="form_row">'.$input.'</div>';
		}
		return $xhtml;
	}
	
	// Formate Date
	public static function formatDate($format, $value){
		$result = '';
		if(!empty($value) && $value != '0000-00-00' ){
			$result = date($format, strtotime($value));
		}
		return $result;
	}

	// Create Image
	public static function createImage($folder, $prefix, $pictureName, $attribute = null){

		$class	= !empty($attribute['class']) ? $attribute['class'] : '';
		$width	= !empty($attribute['width']) ? $attribute['width'] : '';
		$height	= !empty($attribute['height']) ? $attribute['height'] : '';
		$strAttribute	= "class='$class' width='$width' height='$height'";
		
		$picturePath	= UPLOAD_PATH . $folder . DS . $prefix . $pictureName;
		if(file_exists($picturePath)==true){
			$picture		= '<img  '.$strAttribute.' src="'.UPLOAD_URL . $folder . DS . $prefix . $pictureName.'">';
		}else{
			$picture	= '<img '.$strAttribute.' src="'.UPLOAD_URL . $folder . DS . $prefix . 'default.jpg' .'">';
		}
		
		return $picture;
	}
	
	// Create Title - Default
	public static function createTitle($titleName){
		$xhtml = '<div class="content-header">
                <div class="container-fluid">
                  <div class="row mb-2">
                    <div class="col-sm-6">
                      <h1 class="m-0 text-dark">'.$titleName.'</h1>
                    </div>
                  </div>
                </div>
            </div>';
		return $xhtml;

	}
  
  public static function keepURL($nameFile = 'index.php',$exception = '') {
    $str = $nameFile.'?';
    foreach($_GET as $key => $value) {
      if($key != $exception) $str .= $key.'='.$value.'&';
    }
    $str = substr($str,0,strlen($str) - 1);
    return $str;
  }
  
  public static function createMessage(){
		$str = ''; $type = ''; 
      if (count($_SESSION) > 1) {
        foreach ($_SESSION as $key => $value) {
          if ($key == 'success' || $key == 'error') {
            $str = $value;
            $type = $key;
            unset($_SESSION[$key]);
            echo "<script>message('$str','$type');</script>";
          }
        }
      } else {
        return ;
      }
  }

  public static function createFilter($params, $count, $selectBox = null){
		$filterStatus = $params['filter_status'] ?? '';
		$filterSearch = $params['filter_search'] ?? '';
		$url = URL::createLink($params['module'],$params['controller'],$params['action']);
		$btn = '<a href="'.$url.'" class="btn btn-outline-primary btn-sm mx-1">Clear</a>';

		foreach ($count as $key => $value) {
			$status = $value['status'];
			$style  = $value['status'] == 'inactive' ? 'warning' : 'success';
			$bg = '';
			if(!empty($filterStatus)) {
				if($filterStatus == 'active' && $filterStatus == $status) {
					$bg = "style='background:#28a745;color:#fff'";
				} else if ($filterStatus == 'inactive' && $filterStatus == $status) {
					$bg = "style='background:#ffc107;color:#000'";
				} else {
					$bg = "";
				}
			}
			$btn .= '<a href="#" '.$bg.' class="btn btn-outline-'.$style.' btn-sm mx-1" onclick="filterStatus(\''.$status.'\')">'.$status.'('.$value['count'].')</a>';
			
		}
		$urlMultiDelete = URL::CreateLink($params['module'],$params['controller'],'multiDelete');
		$multiDelete = '<a href="#" class="btn btn-outline-danger btn-sm mx-1" onClick="multiDelete(\''.$urlMultiDelete.'\');">Multi Delete<span id="countMultiDelete"></span></a>';
		$selectBox = ($selectBox != null) ? $selectBox : '';
		$xhtml = '<input type="hidden" name="filter_status" value="'.$filterStatus.'" />';
		$xhtml .= '<div class="card-tools">    
									
									<div class="input-group input-group-sm">    
									'.$selectBox.'
                    <div class="filter mx-1">'.$btn.'</div>
                    <input type="text" name="filter_search" class="form-control float-right" placeholder="Search" value="'.$filterSearch.'">
                    <div class="input-group-append">
                        <button type="submit" class="btn btn-default"><i class="fas fa-search"></i></button>
										</div>
										'.$multiDelete.'
                  </div>
              </div>';
    return $xhtml;          
	}
	public static function createTextArea($name, $value, $placeholder, $error = NULL){	
		$invalid = ($error != NULL) ? 'is-invalid' : '';
		$xhtml = '<textarea name="'.$name.'" class="form-control '.$invalid.'" placeholder="'.$placeholder.'" rows="7">'.$value.'</textarea>';
		$xhtml .= Helper::createError($error);
		return $xhtml;
	}
	public static function createInput($type, $name, $value, $placeholder, $error = NULL){	
		$invalid = ($error != NULL) ? 'is-invalid' : '';
		$xhtml = '<input type="'.$type.'" name="'.$name.'" class="form-control '.$invalid.'" value="'.$value.'" placeholder="'.$placeholder.'" />';
		$xhtml .= Helper::createError($error);
		return $xhtml;
	}
	public static function createUpload($name, $error = NULL){	
		$invalid = ($error != NULL) ? 'is-invalid' : '';
		$xhtml = '<div class="input-group mb-3">
								<div class="custom-file">
									<input type="file" name="'.$name.'" class="custom-file-input '.$invalid.'" id="inputGroupFile02">
									<label class="custom-file-label" for="inputGroupFile02">Choose file</label>
								</div>
								<div class="input-group-append">
									<span class="input-group-text" id="">Upload</span>
								</div>
							</div>';
	
		$xhtml .= Helper::createError($error);
		return $xhtml;
	}
	public static function createError($error) {
		return '<span id="exampleInputEmail1-error" class="error invalid-feedback d-block">'.$error.'</span>';
	}
	public static function select($option) {
			
		$data = ['default','active','inactive'];
		$xhtml = '<select class="form-control" style="width: 100%;" name="form[status]">';
		foreach($data as $key => $value) {
			$select = ($value == $option) ? 'selected' : '';
			$xhtml .= '<option value="'.$value.'"'.$select.'>'.ucfirst($value).'</option>';
		}
		$xhtml .= '</select>';
		echo $xhtml;
	}

	public static function createLabel($value){
		return '<label for="inputEmail3" class="col-sm-2 col-form-label">'.ucfirst($value).'</label>';
	}
	public static function createForm($data,$action){
		$xhtml = '<div class="card-body">';
		foreach ($data as $key => $value) {
			$xhtml .= '<div class="form-group row">';
			$xhtml .= $value['label'];
			$xhtml .= '<div class="col-sm-10">';
				foreach ($value as $key02 => $value02) {
					if($key02 == 'label') continue;
					$xhtml .= $value02;
				}
			$xhtml .= '</div>';
			$xhtml .= '</div>';
		}

		$xhtml .= '</div><div class="card-footer">
								<a href="#" onclick="submitForm();" class="btn btn-info indigo">'.$action.'</a>
							</div>';
		$xhtml .= Helper::cmsInput('hidden','form[token]',time());
		return $xhtml;
	}
	public static function statistics($data, $count, $params) {
		$xhtml = '';
		foreach ($data as $key => $value) {
			$link = URL::createLink($params['module'],$key,'list');
			$xhtml .= '<div class="col-lg-3 col-6">
									<div class="small-box '.$value['bg'].'">
										<div class="inner text-white">
											<h3>'.$count[$key].'</h3>
											<p>'.ucfirst($key).'</p>
										</div>
										<div class="icon text-white">
											<i class="fas '.$value['icon'].'" ></i>
										</div>
										<a href="'.$link.'" class="small-box-footer" style="color: #fff!important;">More info <i class="fas fa-arrow-circle-right"></i></a>
									</div>
								</div>';
		}
		return $xhtml;
	}
	public static function noData($col) {
		return '<tr><td colspan="'.$col.'" class="p-0">
						<div class="alert alert-danger alert-dismissible m-0">
						<h5 class="m-0"><i class="icon fas fa-ban"></i>NO DATA FOUND</h5>
						</div></td></tr>';
	} 
	public static function cutString($string, $whitespace) {
		if(strlen($string) < $whitespace) {
			return $string;
		} else {
			$index = strpos($string,' ',$whitespace);
			if($index == null) return $string; 
			else return substr($string,0,$index).'...';
		}
	}
	public static function replaceString($string, $replace){
		return str_replace(' ',$replace,$string);
	}
}