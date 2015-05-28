//检查手机号码是否正确
function checkmobile(mob){
	if(mob==""){
		return false;
	}
	if(mob!=""){
		var reg = /^1[3|4|5|7|8][0-9]{9}$/;
		if(!reg.test(mob)){
		  return false;
		}
	}
	return true;
}

//检查是一个6位的数字
function checkcode(intcode){
	if(intcode==""){
		return false;
	}
	if(intcode!=""){
		var reg = /^[0-9]{6}$/;
		if(!reg.test(intcode)){
		  return false;
		}
	}
	return true;
}

//添加到购物车
function addtobuycart(url,product_no,quantity){
	$.post(url,{'product_no':product_no,'quantity':quantity},function(data){
		if(data.result){			
			alert('成功加入到购物车');
			$('#_gouwuchelist').html('');
			var datas = data.result.datalist.datalist;
			var intshuliang = 0;
			var intprice = 0;
			console.log(datas.length);
			for(var i = 0;i <datas.length;i++){
				var background = (i%2==0)?"1":"c";
				$('#_gouwuchelist').append('<li class="bg-f'+background+'" data-productid="'+datas[i]["product_no"]+'"><div class="del"><a href="javascript:;" title="删除"><i class="icon-trash"></i></a></div><div class="img"><a href="index.php?c=product&a=buycart&product_no=2015050943000024" title="'+datas[i]["product_name"]+'"><img src="'+datas[i]["picture"]+'"></a></div><div class="count"><span class="text-primary">¥'+(datas[i]["shopprice"]*datas[i]["quantity"]).toFixed(2)+'</span></div><div class="num"><a href="javascript:;" title="减">-</a><input type="text" value="'+datas[i]["quantity"]+'" disabled data-singleprice = "'+datas[i]["shopprice"]+'"><a href="javascript:;" title="加">+</a></div><div class="title ell"><a href="index.php?c=product&a=buycart&product_no=2015050943000024">'+datas[i]["product_name"]+'</a></div><div class="info ell">'+datas[i]["sales_name"]+'</div></li>');
				intshuliang += Number(datas[i]['quantity']);
				intprice += parseFloat(datas[i]["shopprice"])*parseFloat(datas[i]["quantity"]);
			}
			$('#_gouwuche').html('购物车（'+intshuliang+'）');
			$('#_upprice').html('¥'+intprice.toFixed(2));
			$('#_downprice').html('¥'+intprice.toFixed(2));
		}else{
			alert(data.error.msg);
		}
	},'json');
}

