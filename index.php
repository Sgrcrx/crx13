<?php
require_once "jssdk.php";
$jssdk = new JSSDK("wx0a9e5bf0a3ed7a7e", "963988f369c42f8b1d0b72ab99ed0921");
$signPackage = $jssdk->GetSignPackage();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title></title>
</head>
<body>
  
</body>
<script src="http://res.wx.qq.com/open/js/jweixin-1.4.0.js"></script>
<script>
  /*
   * 注意：
   * 1. 所有的JS接口只能在公众号绑定的域名下调用，公众号开发者需要先登录微信公众平台进入“公众号设置”的“功能设置”里填写“JS接口安全域名”。
   * 2. 如果发现在 Android 不能分享自定义内容，请到官网下载最新的包覆盖安装，Android 自定义分享接口需升级至 6.0.2.58 版本及以上。
   * 3. 常见问题及完整 JS-SDK 文档地址：http://mp.weixin.qq.com/wiki/7/aaa137b55fb2e0456bf8dd9148dd613f.html
   *
   * 开发中遇到问题详见文档“附录5-常见错误及解决办法”解决，如仍未能解决可通过以下渠道反馈：
   * 邮箱地址：weixin-open@qq.com
   * 邮件主题：【微信JS-SDK反馈】具体问题
   * 邮件内容说明：用简明的语言描述问题所在，并交代清楚遇到该问题的场景，可附上截屏图片，微信团队会尽快处理你的反馈。
   */
  wx.config({
    debug: true,
    appId: '<?php echo $signPackage["appId"];?>',
    timestamp: <?php echo $signPackage["timestamp"];?>,
    nonceStr: '<?php echo $signPackage["nonceStr"];?>',
    signature: '<?php echo $signPackage["signature"];?>',
    jsApiList: ['chooseImage',
     'checkJsApi',
        'onMenuShareTimeline',
        'onMenuShareAppMessage',
        'onMenuShareQQ',
        'onMenuShareWeibo',
        'onMenuShareQZone',
        'hideMenuItems',
        'showMenuItems',
        'hideAllNonBaseMenuItem',
        'showAllNonBaseMenuItem',
        'translateVoice',
        'startRecord',
        'stopRecord',
        'onVoiceRecordEnd',
        'playVoice',
        'onVoicePlayEnd',
        'pauseVoice',
        'stopVoice',
        'uploadVoice',
        'downloadVoice',
        'chooseImage',
        'previewImage',
        'uploadImage',
        'downloadImage',
        'getNetworkType',
        'openLocation',
        'getLocation',
        'hideOptionMenu',
        'showOptionMenu',
        'closeWindow',
        'scanQRCode',
        'chooseWXPay',
        'openProductSpecificView',
        'addCard',
        'chooseCard',
        'openCard'
      // 所有要调用的 API 都要加到这个列表中
    ]
  });
  
  
wx.ready(function () {
  			 
  			 // 调用分享给好友的功能
  			 wx.onMenuShareTimeline({ 
		        title: '上海最新放假通知', // 分享标题
		        desc: '因为***原因，决定11月份决定放假20天...', // 分享描述
		        link: 'http://demo.niyinlong.com/demo5/crx001.html', // 分享链接，该链接域名或路径必须与当前页面对应的公众号JS安全域名一致
		        imgUrl: 'http://demo.niyinlong.com/demo5/img/notice.jpg', // 分享图标
		        success: function () {
		          // 设置成功
        	}
  			});
  			// 分享给好友
  			wx.onMenuShareAppMessage({
						title: '上海最新放假通知', // 分享标题
						desc: '因为***原因，决定11月份决定放假20天...', // 分享描述
						link: 'http://demo.niyinlong.com/demo5/crx001.html', // 分享链接，该链接域名或路径必须与当前页面对应的公众号JS安全域名一致
						imgUrl: 'http://demo.niyinlong.com/demo5/img/notice.jpg', // 分享图标
						type: '', // 分享类型,music、video或link，不填默认为link
						dataUrl: '', // 如果type是music或video，则要提供数据链接，默认为空
						success: function () {
						// 用户点击了分享后执行的回调函数
						}
				});
				//图像
				wx.chooseImage({
count: 1, // 默认9
sizeType: ['original', 'compressed'], // 可以指定是原图还是压缩图，默认二者都有
sourceType: ['album', 'camera'], // 可以指定来源是相册还是相机，默认二者都有
success: function (res) {
var localIds = res.localIds; // 返回选定照片的本地ID列表，localId可以作为img标签的src属性显示图片
}
});
//预览图片接口
wx.previewImage({
current: '', // 当前显示图片的http链接
urls: [] // 需要预览的图片http链接列表
});
  });
  //上传图片接口
  wx.uploadImage({
localId: '', // 需要上传的图片的本地ID，由chooseImage接口获得
isShowProgressTips: 1, // 默认为1，显示进度提示
success: function (res) {
var serverId = res.serverId; // 返回图片的服务器端ID
}
});
  
  
  
  wx.error(function(res){
  	alert('res');
  	
    // config信息验证失败会执行error函数，如签名过期导致验证失败，具体错误信息可以打开config的debug模式查看，也可以在返回的res参数中查看，对于SPA可以在这里更新签名。
});
</script>
</html>
