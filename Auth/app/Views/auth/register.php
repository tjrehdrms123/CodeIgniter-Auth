<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign In</title>
    <link rel="stylesheet" href="<?= base_url('bootstrap/css/bootstrap.min.css')?>">
</head>
<body>

<div class="container">
    <div class="row" style="margin-top:45px">
        <div class="col-md-4 col-md-offset-4">
            <h4>Sign In</h4><hr>
            <form action="<?= base_url('auth/save');?>" method="post" autocomplete="off">
            <!-- autocomplete : 필드 자동완성 -->
                <?= csrf_field();?>
                <!-- 
                    성공 메시리르 ㄹ표시하는 방법은 세션 플래시 데이터를 받으면 성공 아니면 실패
                 -->
                <?php if(!empty(session()->getFlashdata('fail'))) : ?>
                    <div class="alert alert-danger"><?= session()->getFlashdata('fail');?></div>
                <?php endif ?>
                <?php if(!empty(session()->getFlashdata('success'))) : ?>
                    <div class="alert alert-success"><?= session()->getFlashdata('success');?></div>
                <?php endif ?>
                <div class="form-group">
                    <label for="">Name</label>
                    <input type="text" class="form-control" name="name" placeholder="Enter your name" value="<?= set_value('name')?>">
                    <span class="text-danger"><?= isset($validation) ? display_error($validation, 'name') : ''?></span>
                </div>
                <div class="form-group">
                    <label for="">Email</label>
                    <input type="text" class="form-control" name="email" placeholder="Enter your email" value="<?= set_value('email')?>">
                    <span class="text-danger"><?= isset($validation) ? display_error($validation, 'email') : ''?></span>
                </div>
                <div class="form-group">
                    <label for="">Password</label>
                    <input type="password" class="form-control" name="password" placeholder="Enter Password" >
                    <span class="text-danger"><?= isset($validation) ? display_error($validation, 'password') : ''?></span>
                </div>
                <div class="form-group">
                    <label for="">Confirm Password</label>
                    <input type="password" class="form-control" name="cpassword" placeholder="Enter confirm password" >
                    <span class="text-danger"><?= isset($validation) ? display_error($validation, 'cpassword') : ''?></span>
                </div>
                <div class="form-group">
                    <button class="btn btn-primary btn-block" type="submit">Sign In</button>
                </div>
                <br>
                <a href="<?= site_url('auth')?>">I alreay have account, login now</a>
            </form>
        </div>
    </div>
</div>

</body>
</html>