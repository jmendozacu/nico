var $j_mw = jQuery.noConflict();
var focused=0;
$j_mw(function(){
	// operator & tag
	var baseUrl=$j_mw("#url").val();
	var moderatorarr=[];
	var tagsarr=[];
	var moderatorDistinctarr=[];
	$j_mw.ajax({
		type:"POST",url:baseUrl+"helpdesk/autocomplete/operator",
		complete:function(data){
			moderatorarr=eval('('+data.responseText+')');			
		}
    });
	$j_mw.ajax({
		type:"POST",url:baseUrl+"helpdesk/autocomplete/operatorDistinct",
		complete:function(data){
			moderatorDistinctarr=eval('('+data.responseText+')');			
		}
    });
	$j_mw("#member_id").attr('disabled', 'disabled');
	setTimeout(ac,2000);	
	function ac(){
		$j_mw("#member_id").removeAttr('disabled');
		$j_mw("#member_id").autocomplete(moderatorDistinctarr, {
			matchContains: "word",
			formatItem: function(row) {
				return row.name + " [" + row.email + "]";
			},
			formatResult: function(row) {
				return row.email;
			}
		});

	}
	
//	$j_mw('#department_id').change(function() {
//		if($j_mw("#moderator").val() == '') {
//			// xoa list neu ton tai
//			liop = document.getElementById('moderator_list');
//			if (liop != null) liop.parentNode.removeChild(liop);
//			
//			// neu chon department
//			var data = [], m = document.getElementById("moderator"), fix=0;
//			if($j_mw("#department_id").val() != '') {
//				for(var i=0;i<moderatorarr.length;i++){
//					if(moderatorarr[i]['department_name'] == $j_mw("#department_id :selected").text()) {
//						data[fix] = moderatorarr[i]['name']+' ['+moderatorarr[i]['email'] + ']';
//						fix++;
//					}
//				}
//				var select = createList(data);
//			    m.parentNode.insertBefore(select, m);
//				m.style.display='none';
//			} else {
//				m.style.display='';
//			}
//		}
//	});
//	function createList(data) {
//	  var select = document.createElement("select");
//	  select.id = 'moderator_list';
//	  select.name = 'moderator_list';
//	  for (var i = 0; i < data.length; i++) {
//	    var option = document.createElement("option");
//		var p = data[i].split("[")[1];
//	    option.value=p.split("]")[0];
//	    var newText = document.createTextNode(data[i]);
//	    option.appendChild(newText);
//	    select.appendChild(option);
//	  }
//	  return select;
//	}
});