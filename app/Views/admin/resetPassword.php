<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
<div class="form-gap"></div>
<div class="container">
    <div class="row">
        <div class="col-md-4 col-md-offset-4">
            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="text-center">
                        <h3><i class="fa fa-lock fa-4x"></i></h3>
                        <h2 class="text-center">Forgot Password?</h2>
                        <p>You can reset your password here.</p>
                        <div class="panel-body">

                            <form id="register-form" role="form" autocomplete="off" class="form" method="post">

                                <div class="form-group">
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="glyphicon glyphicon-envelope color-blue"></i></span>
                                        <input id="email" name="email" placeholder="email address" class="form-control"  type="email">

                                    </div>


                                </div>


                                <div class="form-group">
                                    <div class="input-group">
                                        <span class="input-group-addon"><i id="tg" style="font-size: 19px" class="		glyphicon glyphicon-sound-5-1 color-blue">

                                            </i> </span>
                                        <input id="pass" name="code" placeholder="Code" class="form-control"  type="text">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <input name="recover-submit" id="submit" class="btn btn-lg btn-primary btn-block" value="Send Code" type="button">
                                </div>
                                <?= csrf_field() ?>

                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<style>
    .form-gap {
        padding-top: 70px;
    }
</style>
<script>

    var tg =60;
    $('#submit').click(function (){

        if( $('#submit').get(0).type=="button") {
            $.post('', {'email': $('#email').val(), 'csrf': $("input[name=csrf_test_name]").val()}, function (data) {
                $('#submit').get(0).type = 'submit';
                $('#submit').val("Reset Password");
                demthoigian();


                alert(data);
            });
        }
    });


    function demthoigian(){
        if(tg==0){
            $('#submit').get(0).type = 'button';
            $('#submit').val("Send Code");
            tg=60;
        }else{
            tg-=1;
            $('#tg').html(" "+tg);
            setTimeout(demthoigian,1000);

        }
    }

</script>