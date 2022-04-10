//controler halaman//
$(document).ready(function () {
	$(".nav-menu").click(function (e) {
		e.preventDefault();
		let url = $(this).attr("url");
		ajax.ajaxGet(url, function (res) {
			$("#taarget").html(res);
		});
	});
});
	$(document).ready(function () {
		$(".click").click(function (e) {
			e.preventDefault();
			let url = $(this).attr("url");
			let data = {"data":$(this).attr("data")};
			ajax.ajaxPost(url,data,function (res) {
				$("#target").html(res);
			});
		});
	});
	$(document).ready(function () {
		$(".menu").click(function (e) {
			e.preventDefault();
			let url = $(this).attr("url");
			let data = {"divisi":$(this).attr("data")};
			ajax.ajaxPost(url,data,function (res) {
				$("#targett").html(res);
			});
		});
	});

