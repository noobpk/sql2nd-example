<div class="container">
    <div class="row main">
        <div class="panel-heading">
           <div class="panel-title text-center">
                <h1 class="title">Tìm kiếm nội dung</h1>
                <hr />
            </div>
        </div> 
        <div class="main-login main-center animated shake">
            <form class="form-horizontal" method="POST" action="" role="form">
                <div class="form-group">
                    <label for="name" class="cols-sm-2 control-label">Search</label>
                    <div class="cols-sm-10">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-lock fa-lg" aria-hidden="true"></i></span>
                            <input type="text" class="form-control" name="txtNoiDung" id="txtNoiDung" placeholder="Search..."/>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <button type="submit" name="timkiem" class="btn btn-primary btn-lg btn-block login-button">Tìm kiếm</button>
                </div>
            </form>
        </div>
    </div>
</div>

<?php
    if(isset($_POST['timkiem'])){
        if(empty($_POST['txtNoiDung'])){
            echo '
                <div class="container thongbao">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="alert alert-danger">
                                <strong>Một số trường bắt buộc nhập.</strong>
                            </div>
                        </div>
                    </div>
                </div>
            ';
        }else{
            $noidung = $_POST["txtNoiDung"];
            echo '
                <div class="container thongbao">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="alert alert-success">
                                <strong>'. $noidung .'</strong>
                            </div>
                        </div>
                    </div>
                </div>
            ';
        }
    }
?>