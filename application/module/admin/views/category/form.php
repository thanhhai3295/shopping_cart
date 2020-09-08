<?php 
  $nameTable = str_replace('/','',$this->_title);
  $action = explode('/',$this->_title);
  $action = trim($action[1]);
  $form = $this->arrParam??'';
  $picture = '';
  $inputPictureHidden = '';
  if(isset($_GET['id'])) {
    $picture 	= Helper::createImage('category', '60x90-', $form['picture'],['width' => '60','height' => '90']);
    $inputPictureHidden	= Helper::cmsInput('hidden', 'form[picture_hidden]', $form['picture'], 'inputbox', 40);
    if (empty($this->arrParam['picture'])) {
      $picture	= '';
    }
  }

  $arrayForm = [
    [
      'label' => Helper::createLabel('name'),
      'input' => Helper::createInput('text','form[name]',$form['name']??'','Name',$this->errors['name']??'')
    ],
    [
      'label' => Helper::createLabel('ordering'),
      'input' => Helper::createInput('text','form[ordering]',$form['ordering']??'','Ordering',$this->errors['ordering']??'')
    ],
    [
      'label' => Helper::createLabel('status'),
      'select' => Helper::cmsSelectbox('form[status]','form-control',DEFAULT_STATUS,$form['status']??'',null,$this->errors['status']??'')
    ],
    [
      'label' => Helper::createLabel('picture'),
      'input' => Helper::createInput('file','picture',null,'Picture',$this->errors['picture']??'')
    ],
    [
      'label' => '',
      'input'  => $inputPictureHidden,
      'picture'=> $picture
    ]
  ];

  echo Helper::createTitle($this->_title); 
?>
    <!-- Main content -->
<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-8">
        <div class="card card-info">
        <div class="card-header indigo">
          <h3 class="card-title"><?php echo $nameTable ?></h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form class="form-horizontal" method="POST" action="" id="adminForm" enctype="multipart/form-data">
          <?php echo Helper::createForm($arrayForm,$action); ?>
          
        </form>

        </div>

      </div>  <!-- col-md-6 -->
    </div> <!-- row -->
  </div><!-- /.container-fluid -->
</section>