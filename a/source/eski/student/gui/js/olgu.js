function kaydet(){
	jQuery.ajax({
	        type:'POST',
	        url:'inc/kaydet.php',
	        data:$('#save').serialize(),
                error:function(){ $('#kaydet').html("Bir hata algılandı."); },
	        success:function(cevap){ $("#kaydet").html(cevap) }
        })
}

function gonder(i){
	jQuery.ajax({
	        type:'POST',
	        url:'inc/alan.php',
	        data:$('#veri'+i).serialize(),
                error:function(){ $('#sonuc').html("Bir hata algılandı."); },
	        success:function(cevap){ $("#sonuc").html(cevap) }
        })
}

function kapat(){
	jQuery.ajax({
	        type:'POST',
	        url:'inc/kapat.php',
	        data:$('#close').serialize(),
                error:function(){ $('#kapat').html("Bir hata algılandı."); },
	        success:function(cevap){ $("#kapat").html(cevap) }
        })
}


/*
function toggle(chkbox, group) {
    document.getElementById(group).style.display='block';
    document.getElementById('fade').style.display='block';
    var visSetting = (chkbox.checked) ? "visible" : "hidden";
    document.getElementById(group).style.visibility = visSetting;
    document.getElementById('fade').style.visibility = visSetting;
}
*/



