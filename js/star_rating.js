/*
* Written by eligeske
* downloaded from eligeske.com
* have fun. nerd.
*/

$(document).ready(function(){
	
	$rating = $('meta[name=description]').attr('content');
	if($rating == "not rated"){		
			$('#rating_on').css('width', "0px");
		}
		else{
			$('#rating_on').css('width', rateWidth($rating));		
		}
	// hover
	$('#rating_btns li').hover(function(){	
			$rating = $(this).text();
			$('#rating_on').css('width', rateWidth($rating));
	});	
	
	// mouseout
	$('#rating_btns li').mouseout(function(){
		
		//$rating = $('#rating').text();
		$rating = $('meta[name=description]').attr('content');

		if($rating == "not rated"){		
			$('#rating_on').css('width', "0px");
		}
		else{
			$('#rating_on').css('width', rateWidth($rating));		
		}
	});
	
	//click
	
	$('#rating_btns li').click(function(){
		//$rating = $(this).text();
		$rating = $(meta['description']);
		$('#rating').text($rating);
		$('#rating_output').val($rating);
		$pos = starSprite($rating);
		$('#small_stars').css('background-position', "0px " + $pos );							   
		$('#rating_btns').hide();
		$('#rating_on').hide();
		$('#rated').fadeIn();	
	});
	
	//edit
	$('#rate_edit').click(function(){
		$('#rated').hide();						   
		$('#rating_btns').fadeIn();
		$('#rating_on').fadeIn();
		
	});
	
	function rateWidth($rating){
		
		$rating = parseFloat($rating);
		switch ($rating){
			case 0.0: $width = "0px" ; break;
			case 0.1: $width = "3px" ; break;
			case 0.2: $width = "6px" ; break;
			case 0.3: $width = "9px" ; break;
			case 0.4: $width = "12px" ; break;
			case 0.5: $width = "14px"; break;
			case 0.6: $width = "17px"; break;
			case 0.7: $width = "20px"; break;
			case 0.8: $width = "23px"; break;
			case 0.9: $width = "26px"; break;
			case 1.0: $width = "28px"; break;
			case 1.1: $width = "30px"; break;
			case 1.2: $width = "33px"; break;
			case 1.3: $width = "36px"; break;
			case 1.4: $width = "39px"; break;
			case 1.5: $width = "42px"; break;
			case 1.6: $width = "45px"; break;
			case 1.7: $width = "48px"; break;
			case 1.8: $width = "51px"; break;
			case 1.9: $width = "54px"; break;
			case 2.0: $width = "56px"; break;
			case 2.1: $width = "59px"; break;
			case 2.2: $width = "62px"; break;
			case 2.3: $width = "65px"; break;
			case 2.4: $width = "68px"; break;
			case 2.5: $width = "70px"; break;
			case 2.6: $width = "73px"; break;
			case 2.7: $width = "76px"; break;
			case 2.8: $width = "79px"; break;
			case 2.9: $width = "82px"; break;
			case 3.0: $width = "84px"; break;
			case 3.1: $width = "87px"; break;
			case 3.2: $width = "90px"; break;
			case 3.3: $width = "93px"; break;
			case 3.4: $width = "96px"; break;
			case 3.5: $width = "98px"; break;
			case 3.6: $width = "101px"; break;
			case 3.7: $width = "104px"; break;
			case 3.8: $width = "107px"; break;
			case 3.9: $width = "110px"; break;
			case 4.0: $width = "112px"; break;
			case 4.1: $width = "115px"; break;
			case 4.2: $width = "118px"; break;
			case 4.3: $width = "121px"; break;
			case 4.4: $width = "124px"; break;
			case 4.5: $width = "126px"; break;
			case 4.6: $width = "129px"; break;
			case 4.7: $width = "132px"; break;
			case 4.8: $width = "135px"; break;
			case 4.9: $width = "138px"; break;
			case 5.0: $width = "140px"; break;
			default:  $width =  "0px";
		}
		return $width;
	}				
	
	function starSprite($rating){
		
		$rating = parseFloat($rating);
		switch ($rating){
			case 0.5: $pos = "-11px"; break;
			case 1.0: $pos = "-22px"; break;
			case 1.5: $pos = "-33px"; break;
			case 2.0: $pos = "-44px"; break;
			case 2.5: $pos = "-55px"; break;
			case 3.0: $pos = "-66px"; break;
			case 3.5: $pos = "-77px"; break;
			case 4.0: $pos = "-88px"; break;
			case 4.5: $pos = "-99px"; break;
			case 5.0: $pos = "-110px"; break;
			default:  $pos =  "-77px";
		}
		return $pos;
	}
	
});	

