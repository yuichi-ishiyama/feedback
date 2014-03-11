// JavaScript Document

$(function() {

	var scrollTop;
	var scrollTop2;
    var topBtn = $('.sample');   
    var topBtn2 = $('#feedback');
    var topBtn3 = $('.sample0'); 
	var topBtn4 = $('.sample1');
    var topBtn5 = $('#feedback .submit');

	topBtn2.hide();
	topBtn3.hide();
	
    topBtn.click(function () {
    	topBtn2.fadeIn();
		topBtn4.fadeOut();
		
		$('#header').hide();
		scrollTop = $(window).scrollTop();
		$('body').addClass('noscroll').css('top', (-scrollTop) + 'px');
		scrollTop2 = scrollTop;
		
		$('#cancelEnter').bind('keydown', function(event) {
			if(!event.shiftKey){
				if (event.which == 13) {
	    			// 貼りつけられたテキストの改行コードの変更の条件を指定して改行処理を調整している
					//（shiftKeyを外したときの処理：文章が１行目以上の場合、つまり入力途中のとき [ Enter ] で強制的に変換しないようにしている）
    				var $textarea = $(this),
       				text = $textarea.val(),
        			new_text = text.replace(/\n/g, '\n');
    				if (new_text != text) {
						var input_text = document.getElementById('cancelEnter').value;
						arr = input_text.split('\n');
						if(input_text.split('\n').length < 1){
  	    	  				$textarea.val(new_text);
						}
    				}
					return false;
				}
			}
		});

		$('#cancelEnter').bind('keydown', function (event){
			if(event.shiftKey){
				if(event.which == 13){
					var $textarea = $(this),
       				text = $textarea.val(),
        			new_text = text.replace(/\n/g, '\n');
    				if (new_text != text) {
        				$textarea.val(new_text);
    				}
				}
			}
		}).bind('blur', function() {
    		// 貼りつけられたテキストの改行コードをそのまま利用して改行できるようにしている
    		var $textarea = $(this),
       		text = $textarea.val(),
        	new_text = text.replace(/\n/g, '\n');
    		if (new_text != text) {
        		$textarea.val(new_text);
    		}
		});
		
		$('#cancelEnter').bind('keydown', function(event) {
    	if (event.ctrlKey) {
    		if (event.which == 13) {
    			var $textarea = $(this),
     			text = $textarea.val(),
       			new_text = text.replace(/\n/g, "<br>");
    			if (new_text != text) {
  	    			$textarea.val(new_text);
    			}
				topBtn2.fadeOut();
 	        	topBtn3.fadeIn(4000);
				topBtn4.fadeOut(0);
				$('body').removeClass('noscroll');
				$(window).scrollTop(scrollTop2);
			    $.ajax({ type: "POST", url: "write.php", data: {date: $('#feedback .text').val(),date2: $('#feedback .text2').val(),date3: $('#feedback .text3').val()},});
      			//return false;
			}
		}
		}).bind('blur', function() {
			$.ajax({ type: "POST", url: "write.php", data: {date: $('#feedback .text').val(),date2: $('#feedback .text2').val(),date3: $('#feedback .text3').val()},});
		});
		
		$('#feedback .box').bind('click', function() {
    		topBtn2.fadeOut();
			topBtn4.fadeIn();
			$('#header').fadeIn(1000);
			$('body').removeClass('noscroll');
			$(window).scrollTop(scrollTop2);
		});

    });
	
	topBtn5.bind('click', function () {
    	var $textarea = $('#feedback #cancelEnter'),
       	text = $textarea.val(),
       	new_text = text.replace(/\n/g, "<br>");
    	if (new_text != text) {
  	    	$textarea.val(new_text);
    	}
		topBtn2.fadeOut();
        topBtn3.fadeIn(4000);
		topBtn4.fadeOut(0);
		$('#header').fadeIn(1000);
		$('body').removeClass('noscroll');
		$(window).scrollTop(scrollTop2);
		return false;
    }).bind('blur', function() {
		$.ajax({ type: "POST", url: "write.php", data: {date: $('#feedback .text').val(),date2: $('#feedback .text2').val(),date3: $('#feedback .text3').val()},});
	});
});

$(function() {
	var scrollTop;
	var scrollTop2;
    var topBtn_no = $('.sample_no');   
    var topBtn2_no = $('#feedback_no');
    var topBtn3 = $('.sample0'); 
	var topBtn4 = $('.sample1');
    var topBtn5_no = $('#feedback_no .submit_no');
	
	topBtn2_no.hide();
	topBtn3.hide();
    topBtn_no.click(function () {
    	topBtn2_no.fadeIn();
		topBtn4.fadeOut();
		$('#header').hide();
		scrollTop = $(window).scrollTop();
		$('body').addClass('noscroll').css('top', (-scrollTop) + 'px');
		scrollTop2 = scrollTop;
		
		$('#cancelEnter2').bind('keydown', function(event) {
			if(!event.shiftKey){
				if (event.which == 13) {
	    			// 貼りつけられたテキストの改行コードの変更の条件を指定して改行処理を調整している
					//（shiftKeyを外したときの処理：文章が１行目以上の場合、つまり入力途中のとき [ Enter ] で強制的に変換しないようにしている）
    				var $textarea = $(this),
       				text = $textarea.val(),
        			new_text = text.replace(/\n/g, '\\n');
    				if (new_text != text) {
						var input_text = document.getElementById('cancelEnter2').value;
						arr = input_text.split('\n');
						if(input_text.split('\n').length < 1){
  	    	  				$textarea.val(new_text);
						}
    				}
					return false;
				}
			}
		});

		$('#cancelEnter2').bind('keydown', function (event){
			if(event.shiftKey){
				if(event.which == 13){
					var $textarea = $(this),
       				text = $textarea.val(),
        			new_text = text.replace(/\n/g, '\n');
    				if (new_text != text) {
        				$textarea.val(new_text);
    				}
				}
			}
		}).bind('blur', function() {
    		// 貼りつけられたテキストの改行コードをそのまま利用して改行できるようにしている
    		var $textarea = $(this),
       		text = $textarea.val(),
        	new_text = text.replace(/\n/g, '\n');
    		if (new_text != text) {
        		$textarea.val(new_text);
    		}
		});
		
		$('#cancelEnter2').bind('keydown', function(event) {
    		if (event.ctrlKey) {
    			if (event.which == 13) {
					var $textarea = $(this),
       				text = $textarea.val(),
        			new_text = text.replace(/\n/g, '\\n');
    				if (new_text != text) {
  	    				$textarea.val(new_text);
    				}
					topBtn2_no.fadeOut();
 	       			topBtn3.fadeIn(4000);
					topBtn4.fadeOut(0);
					$('body').removeClass('noscroll');
					$(window).scrollTop(scrollTop2);
        			return false;
				}
			}
		}).bind('blur', function() {
			$.ajax({ type: "POST", url: "write.php", data: {date: $('#feedback_no .text_no').val(),date2: $('#feedback_no .text2_no').val(),date3: $('#feedback_no .text3_no').val()},});
		});
		
		$('#feedback_no .box').click(function() {
    		topBtn2_no.fadeOut();
			topBtn4.fadeIn();
			$('#header').fadeIn(1000);
			$('body').removeClass('noscroll');
			$(window).scrollTop(scrollTop2);

		});

    });
	
	topBtn5_no.bind('click', function () {	
    	var $textarea = $('#feedback_no #cancelEnter2'),
       	text = $textarea.val(),
        new_text = text.replace(/\n/g, '\\n');
    	if (new_text != text) {
  	    	$textarea.val(new_text);
    	}
		topBtn2_no.fadeOut();
        topBtn3.fadeIn(4000);
		topBtn4.fadeOut(0);
		$('#header').fadeIn(1000);
		$('body').removeClass('noscroll');
		$(window).scrollTop(scrollTop2);
		return false;
    }).bind('blur', function() {
		$.ajax({ type: "POST", url: "write.php", data: {date: $('#feedback_no .text_no').val(),date2: $('#feedback_no .text2_no').val(),date3: $('#feedback_no .text3_no').val()},});
	});	
});
/*
function send(){//
$.ajax({
type: "POST",
url: "write.php",//write.phpに送信
data: {
	date: $(".text").val(),
	date2: $(".text2").val(),
	date3: $(".text3").val()
},//「class="text"」なテキストエリアのvalue値を取得し「date」として送信。
});
}

function send2(){//
$.ajax({
type: "POST",
url: "write.php",//write.phpに送信
data: {
	date: $(".text_no").val(),
	date2: $(".text2_no").val(),
	date3: $(".text3_no").val()
},//「class="text_no"」なテキストエリアのvalue値を取得し「date」として送信。
});
}
*/


