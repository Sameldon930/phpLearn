//发送短信验证码的ajax

<script>
    
    $("#sendCode").click(function(){
        /* 给发送验证码的按钮绑定点击事件 */
        //获取当前用户的输入的手机号  获取输入框的值
        var tel = $('.tel').val();
        $.ajax({
            url:"{:U('sendCode')}",//后台sendCode方法
            data:{tel:tel},
            type:'POST',
            success:function(msg){//成功回调
                if(msg.status == 0){
                    alert('error');
                }else{
                    alert('ok');
                }
            }
        });

    });
</script>