<?php
class Pagination{
	
	private $totalItems;					// Tổng số phần tử
	private $totalItemsPerPage		= 1;	// Tổng số phần tử xuất hiện trên một trang
	private $pageRange				= 5;	// Số trang xuất hiện
	private $totalPage;						// Tổng số trang
	private $currentPage			= 1;	// Trang hiện tại
	
	public function __construct($totalItems, $pagination){
		$this->totalItems			= $totalItems;
		$this->totalItemsPerPage	= $pagination['totalItemsPerPage'];
		
		if($pagination['pageRange'] %2 == 0) $pagination['pageRange'] = $pagination['pageRange'] + 1;
		
		$this->pageRange			= $pagination['pageRange'];
		$this->currentPage			= $pagination['currentPage'];
		$this->totalPage			= ceil($totalItems/$pagination['totalItemsPerPage']);
	}
	
	public function showPagination($link){
		// Pagination
		$paginationHTML = '';
		if($this->totalPage > 1){
			$start 	= '<li class="page-item disabled"><a href="#" class="page-link"><i class="fas fa-angle-double-left"></i></a></li>';
			$prev 	= '<li class="page-item disabled"><a href="#" class="page-link"><i class="fas fa-angle-left"></i></a></li>';
			if($this->currentPage > 1){
				
				$start 	= '<li class="page-item" ><a href="#" class="page-link" onclick="javascript:changePage(1)" ><i class="fas fa-angle-double-left"></i></a></li>';
				
				$prev 	= '<li class="page-item" ><a href="#" class="page-link" onclick="javascript:changePage('.($this->currentPage-1).')"><i class="fas fa-angle-left"></i></a></li>';
			}
		
			$next 	= '<li class="page-item disabled" ><a href="#" class="page-link"><i class="fas fa-angle-right"></i></a></li>';
			$end 	= '<li class="page-item disabled" ><a href="#" class="page-link"><i class="fas fa-angle-double-right"></i></a></li>';
			if($this->currentPage < $this->totalPage){
				
				$next	= '<li class="page-item" ><a href="#" class="page-link" onclick="javascript:changePage('.($this->currentPage+1).')"><i class="fas fa-angle-right"></i></a></li>';
				$end 	= '<li class="page-item" ><a href="#" class="page-link" onclick="javascript:changePage('.$this->totalPage.')"><i class="fas fa-angle-double-right"></i></a></li>';
			}
		
			if($this->pageRange < $this->totalPage){
				if($this->currentPage == 1){
					$startPage 	= 1;
					$endPage 	= $this->pageRange;
				}else if($this->currentPage == $this->totalPage){
					$startPage		= $this->totalPage - $this->pageRange + 1;
					$endPage		= $this->totalPage;
				}else{
					$startPage		= $this->currentPage - ($this->pageRange-1)/2;
					$endPage		= $this->currentPage + ($this->pageRange-1)/2;
					
					if($startPage < 1){
						$endPage	= $endPage + 1;
						$startPage = 1;
					}
		
					if($endPage > $this->totalPage){
						$endPage	= $this->totalPage;
						$startPage 	= $endPage - $this->pageRange + 1;
					}
				}
			}else{
				$startPage		= 1;
				$endPage		= $this->totalPage;
			}
 
			$listPages = '';
			for($i = $startPage; $i <= $endPage; $i++){
				if($i == $this->currentPage) {
					$listPages .= '<li class="page-item active"><span class="page-link font-weight-bold">'.$i.'</span></li>';
				}else{
					$listPages .= '<li class="page-item" ><a href="#" class="page-link font-weight-bold" onclick="javascript:changePage('.$i.')">'.$i.'</a></li>';
				}
			}
			$paginationHTML  = '<ul class="pagination d-flex justify-content-end">';
			$paginationHTML .=  $start . $prev . $listPages . $next . $end;
			$paginationHTML .= '</ul>';
		}
		return $paginationHTML;
	}

	public function FrontEndPagination($params,$name){
		$controller = $params['controller'];
		$link = URL::createLink($params['module'],$params['controller'],$params['action'],null,"$name/page-");
		
		// Pagination
		$paginationHTML = '';
		if($this->totalPage > 1){

			$start 	= '<li class="page-item disabled"><a href="#" class="page-link"><i class="fas fa-angle-double-left"></i></a></li>';
			$prev 	= '<li class="page-item disabled"><a href="#" class="page-link"><i class="fas fa-angle-left"></i></a></li>';
			if($this->currentPage > 1){
				
				$start 	= '<li class="page-item" ><a href="'.$link.'1" class="page-link" ><i class="fas fa-angle-double-left"></i></a></li>';
				
				$prev 	= '<li class="page-item" ><a href="'.$link.($this->currentPage-1).'" class="page-link"><i class="fas fa-angle-left"></i></a></li>';
			}
		
			$next 	= '<li class="page-item disabled" ><a href="#" class="page-link"><i class="fas fa-angle-right"></i></a></li>';
			$end 	= '<li class="page-item disabled" ><a href="#" class="page-link"><i class="fas fa-angle-double-right"></i></a></li>';
			if($this->currentPage < $this->totalPage){
				
				$next	= '<li class="page-item" ><a href="'.$link.($this->currentPage+1).'" class="page-link"><i class="fas fa-angle-right"></i></a></li>';
				$end 	= '<li class="page-item" ><a href="'.$link.($this->totalPage).'" class="page-link"><i class="fas fa-angle-double-right"></i></a></li>';
			}
		
			if($this->pageRange < $this->totalPage){
				if($this->currentPage == 1){
					$startPage 	= 1;
					$endPage 	= $this->pageRange;
				}else if($this->currentPage == $this->totalPage){
					$startPage		= $this->totalPage - $this->pageRange + 1;
					$endPage		= $this->totalPage;
				}else{
					$startPage		= $this->currentPage - ($this->pageRange-1)/2;
					$endPage		= $this->currentPage + ($this->pageRange-1)/2;
					
					if($startPage < 1){
						$endPage	= $endPage + 1;
						$startPage = 1;
					}
		
					if($endPage > $this->totalPage){
						$endPage	= $this->totalPage;
						$startPage 	= $endPage - $this->pageRange + 1;
					}
				}
			}else{
				$startPage		= 1;
				$endPage		= $this->totalPage;
			}
 
			$listPages = '';
			for($i = $startPage; $i <= $endPage; $i++){
				if($i == $this->currentPage) {
					$listPages .= '<li class="page-item active"><span class="page-link font-weight-bold">'.$i.'</span></li>';
				}else{
					$listPages .= '<li class="page-item" ><a href="'.$link.$i.'" class="page-link font-weight-bold">'.$i.'</a></li>';
				}
			}
			$paginationHTML  = '<ul class="pagination d-flex justify-content-end">';
			$paginationHTML .=  $start . $prev . $listPages . $next . $end;
			$paginationHTML .= '</ul>';
		}
		return $paginationHTML;
	}
}