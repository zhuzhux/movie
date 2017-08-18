$(function(){
	
	
	function movieIndex() {
		mui.ajax("http://movie.wxjii.cn/php/movieB.php", {
			data: {
				type: 1
			},
			async: false,
			dataType: 'json',
			type: 'POST',
			timeout: 1000,
			success: function(data) {
				var str = '';
				for(var i = 0; i < data.data.length; i++) {
					str += '<div class="mui-card"><div class="mui-card-content"><h5 class="mui-text-center">'+data.data[i].title+'</h5></div></div>';
					for(var j = 0; j < data.data[i].data.length; j++) {
						str += '<li class="mui-table-view-cell mui-media mui-col-xs-4"><div class="lia mui-card" id="list_'+j+'" data-href="'+data.data[i].data[j].href+'" ><img class="mui-media-object" src="'+data.data[i].data[j].imgSrc+'"><p class="mui-media-body">'+data.data[i].data[j].filmName+'</p><p class="mui-media-body p-actor" >'+data.data[i].data[j].actor+'</p></div></li>';
						$('#scroll1 ul.mui-table-view').html(str);
					}
				}	
				imgWH();
			}
		});
	}
	movieIndex();
	//监听侧滑,
	var item2Show = false,
		item3Show = false,
		item4Show = false,
		item5Show = false,
		item6Show = false,
		item7Show = false,
		item8Show = false,
		item9Show = false,
		item10Show = false,
		item11Show = false,
		item12Show = false; 
		item13Show = false; //子选项卡是否显示标志
	document.getElementById('slider').addEventListener('slide', function(e) {

		i_page = 2; //
		if(event.detail.slideNumber === 1 && !item2Show) {
			//切换到第二个选项卡
			//动态获得第二个选项卡内容
			//显示内容
			movieHome(8, 1, $('#item2mobile'));
			//改变标志位，下次直接显示
			item2Show = true;
		} else if(event.detail.slideNumber === 2 && !item3Show) {
			movieHome(9, 1, $('#item3mobile'));
			item3Show = true;
		} else if(e.detail.slideNumber == 3 && !item4Show) {
			movieHome(10, 1, $('#item4mobile'));
			item4Show = true;
		} else if(e.detail.slideNumber == 4 && !item5Show) {
			movieHome(11, 1, $('#item5mobile'));
			item5Show = true;
		} else if(e.detail.slideNumber == 5 && !item6Show) {
			movieHome(12, 1, $('#item6mobile'));
			item6Show = true;
		} else if(e.detail.slideNumber == 6 && !item7Show) {
			movieHome(13, 1, $('#item7mobile'));
			item7Show = true;
		} else if(e.detail.slideNumber == 7 && !item8Show) {
			movieHome(15, 1, $('#item8mobile'));
			item8Show = true;
		} else if(e.detail.slideNumber == 8 && !item9Show) {
			movieHome(16, 1, $('#item9mobile'));
			item9Show = true;
		} else if(e.detail.slideNumber == 9 && !item10Show) {
			movieHome(17, 1, $('#item10mobile'));
			item10Show = true;
		} else if(e.detail.slideNumber == 10 && !item11Show) {
			movieHome(18, 1, $('#item11mobile'));
			item11Show = true;
		} else if(e.detail.slideNumber == 11 && !item12Show) {
			movieHome(19, 1, $('#item12mobile'));
			item12Show = true;
		} else if(e.detail.slideNumber == 12 && !item13Show) {
			movieHome(14, 1, $('#item13mobile'));
			item12Show = true;
		}
	});
	function movieHome(pid, page, getId) {
		mui.ajax("http://movie.wxjii.cn/php/movieHome.php", {
			data: {
				type: 1,
				pid: pid,
				page: page
			},
			//		async:false,
			dataType: 'json',
			type: 'POST',
			timeout: 1000,
			success: function(data) {
				var str = '';
				for(var i = 0; i < data.data.length; i++) {
					str += '<li class="mui-table-view-cell mui-media mui-col-xs-4"><div class="lia" id="list_' + i + '" data-href="' + data.data[i].href + '"><img class="mui-media-object" src="' + data.data[i].imgSrc + '"><p class="mui-media-body">' + data.data[i].filmName + '</p><p class="mui-media-body p-actor">' + data.data[i].actor + '</p></div></li>';
				}
				getId.find('.mui-loading').remove();
				getId.find('ul.mui-table-view').html(str);
				imgWH();
			}
		});
	}
});
