var video = document.getElementById("videoObj");
//				videoH = $("#media").width() * 9 / 16;
//				$("#media").height(videoH);
var timer;
video.addEventListener("click", function() {
	clearTimeout(timer);
	timer = setTimeout(function(){
		$("#kj").hide();
	},3000);
	$("#kj").on("tap",function() {
		clearTimeout(timer);
		timer = setTimeout(function(){
			$("#kj").hide();
		},3000);
	})
	$("#kj").toggle();
});

var controls = {
	setTimeBack: function() {
		video.currentTime = video.currentTime - 15;
	},
	setTimeForward: function() {
		video.currentTime = video.currentTime + 15;
	},
	setPlaySpeed: function() {
		$(".setPlaySpeed").toggleClass("icon-beisudu1");
		if($(".setPlaySpeed").is(".icon-beisudu1")){
			video.playbackRate=2;
		}else {
			video.playbackRate=1;
		}
	},
	setPlay: function() {
		$(".setPlay").toggleClass("icon-bofang");
		if(video.paused == true){
			video.play();//暂停状态,点击播放
		}else {
			video.pause();//播放状态,点击暂停
		}
	}
}		
if(video.paused == true){
	$(".setPlay").addClass("icon-bofang");
}
video.addEventListener('play',function(){
	$(".setPlay").removeClass("icon-bofang");
	$(".setPlay").addClass("icon-zantingbofang");
});
video.addEventListener('pause',function(){
	$(".setPlay").addClass("icon-bofang");
})	

						