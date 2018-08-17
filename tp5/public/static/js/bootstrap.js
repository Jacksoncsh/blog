	function fun(a, b) {
		var num = 0;
		var t = setInterval(function() {
			num++;
			$(a).text(num);
			if (num == b) {
				clearInterval(t);
			}
		}, 5);
	}
	fun('#span1', 153);
	fun('#span2', 1050);
	fun('#span3', 275);
	fun('#span4', 220);

	var n = 1;
	var arr1 = ['$42,200', '$55,500', '$58,300'];
	var arr2 = ["Black Cow Ranch --Bc-7", "Pine Mountain Ranch", "Western Heartlands--W-136"];
	var arr3 = ["22.12 acres located 50 miles north of billlings. mti this property",
		"40.7 acres dverlooking the casper valley.views of casper mountain,commuting distance to casper,wy.seller is located in cheyenne.",
		"Located In SEC 24, TWP 58 N, 101 W, In Park County, WY. A Part Of Record Of Survey # 2008-3512 In Cabinet J, Page 19, Page 19, Park County Records"
	];
	$(document).ready(function() {
		$(".clickImg img:first").click(function() {
				$(".money").empty();
				$("#a").empty();
				$("#b").empty();
				if (Math.abs(n % 3) == 1) {
					$(".money").append(arr1[0]);
					$("#a").append(arr2[0]);
					$("#b").append(arr3[0]);
				} else if (Math.abs(n % 3) == 2) {
					$(".money").append(arr1[1]);
					$("#a").append(arr2[1]);
					$("#b").append(arr3[1]);
				} else {
					$(".money").append(arr1[2]);
					$("#a").append(arr2[2]);
					$("#b").append(arr3[2]);
				}
				n++;
				console.log(n);
			}),
			$(".clickImg img:last").click(function() {
				$(".money").empty();
				$("#a").empty();
				$("#b").empty();
				if (Math.abs(n % 3) == 1) {
					$(".money").append(arr1[1]);
					$("#a").append(arr2[1]);
					$("#b").append(arr3[1]);
				} else if (Math.abs(n % 3) == 2) {
					$(".money").append(arr1[2]);
					$("#a").append(arr2[2]);
					$("#b").append(arr3[2]);
				} else {
					$(".money").append(arr1[0]);
					$("#a").append(arr2[0]);
					$("#b").append(arr3[0]);
				}
				n--;
				console.log(n);
			}),
			$(".blank1 img").hover(function() {
				$(this).animate({
					width: "130%"
				}, "slow");
			}, function() {
				$(this).animate({
					width: "100%"
				}, "1000");
			});
	});