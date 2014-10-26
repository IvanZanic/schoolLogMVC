
	// getStudentsByClass
	$( "#classListID" ).change(function() {
		var page = getURLParameter('page');
		getStudentsByClass ($(this).val(), page)
		$('#duplicateDateError').html("");
	});
	
	// get "aktivnost" activity and student name (dates)(schoolWork)
	$( "#studentListID" ).change(function() {
		var page = getURLParameter('page');
		var activity = $(".nav-tabs .active a").data("value");
		
		if(page == 'schoolWork') {
			if($(this).val() == 0) {
				$('table tbody').html("");
			} else {
				getActivities($(this).val(), page, activity);
				getStudentData($(this).val(), page);
			}
		}
		$('#duplicateDateError').html("");
	});	
	
	$(".nav-tabs a").click(function(){
		var page = getURLParameter('page');
		if(page == 'schoolWork') {
			// zero because studentId is already in session
			getActivities(0, page, $(this).data("value"));
		}
		$('#duplicateDateError').html("");		
	});
	
	// saveActivity
	$("#saveActivity").click(function() {
		var date = $(".datepicker").val();
		if(date == "") {
			$('#duplicateDateError').html("Datum nije izabran. Izaberi datum.");
		} else {
			var activity = $(".nav-tabs .active a").data("value");
			var page = getURLParameter('page');
			$(".datepicker").val("");
			saveActivity(date, activity, page);
		}
	});
	
	// deleteDate
	var deleteActivityHandler = deleteActivityFn;
	
	$("table tbody tr td button").click(deleteActivityFn);
	
	function deleteActivityFn() {
		var activityDateId = $(this).val();
		var status = confirm("Želiš li izbrisati izabrani datum?");
		if(status) {
			var page = getURLParameter('page');
			var activity = $(".nav-tabs .active a").data("value");
			deleteActivity(activityDateId, page, activity);	
		}
	}
	
	function deleteActivity (activityDateId, page, activity) {
		$.ajax({
			type : "POST",
			url : "index.php",
			data : {
				activityDateId : activityDateId,
				activity : activity,
				isAjax : 1,
				page : page,
				action : "deleteActivity"
			},
			success : function (json) {
				
				var data = JSON.parse(json);
				$('table tbody').html(createTable(data));
				$("table tbody tr td button").click(deleteActivityHandler);
			}
		});
	}
	
//	// getStudentsByClass
//	function getStudentsByClass (classId ,page) {
//		$.ajax({
//			type : "POST",
//			url : "index.php",
//			data : {
//				classId : classId,
//				isAjax : 1,
//				page : page,
//				action : "getStudentsByClass"
//			},
//			success : function(data) {
//				$('#studentListID').html(data);
//			}
//		});	
//	}	
	
	// getStudentsByClass
	function getStudentsByClass (classId ,page) {
		$.ajax({
			type : "POST",
			url : "index.php",
			data : {
				classId : classId,
				isAjax : 1,
				page : page,
				action : "getStudentsByClass"
			},
			success : function(json) {
				var data = JSON.parse(json);
				
				var html = '<option value="0">Izaberi učenika</option>';
				for(var i = 0; i < data.length; i++) {
					html += createOptionElement(data[i].id, data[i].name);
				}
				
				$('#studentListID').html(html);
			}
		});	
	}		
	
	// getStudentName
	function getStudentData (studentId, page) {
		
		$.ajax({
			type : "POST",
			url : "index.php",
			data : {
				isAjax : 1,
				page : page,
				action : "getStudentData",
				studentId : studentId
			},
			success : function (json) {
				var data = JSON.parse(json);
				var name = data[0].name;
				$("#studentName").text(name);
				$("#studentClass").text(data[0].className);
			}
		});
	}
	
	// saveActivity
	function saveActivity(date, activity, page) {
		
		$.ajax({
			type : "POST",
			url : "index.php",
			data : {
				isAjax : 1,
				page : page,
				activity : activity,
				date : date,
				action : "saveActivity"
			},
			success : function(json) {
			
				var data = JSON.parse(json);
				if(data[0]) {
					$('table tbody').html(createTable(data[1]));
					$("table tbody tr td button").click(deleteActivityHandler);
					$('#duplicateDateError').html("");
				} else {
					$('#duplicateDateError').html("Izabrani datum već postoji u tablici. Izaberi drugi.");
				}
			}
		});
	}
		
	// getActivityDates
	function getActivities(studentId, page, activity) {
		
		$.ajax({
			type : "POST",
			url : "index.php",
			data : {
				studentId : studentId,
				isAjax : 1,
				page : page,
				activity : activity,
				action : "getActivityDates"
			},
			success : function(json) {				
				var data = JSON.parse(json);
				$('table tbody').html(createTable(data));
				$("table tbody tr td button").click(deleteActivityHandler);
			}
		});		
	}
	
	function getAppearance (activity) {
		var appearance = '';
		if(activity == 1) {
			appearance = "Aktivnost";
		} else if (activity == 2) {
			appearance = "Pribor";
		} else if (activity == 3) {
			appearance = "Zadaće";
		}
		return appearance;
	}
		
	function getURLParameter(name) {
		return decodeURIComponent((new RegExp('[?|&]' + name + '=' + '([^&;]+?)(&|#|;|$)').exec(location.search)||[,""])[1].replace(/\+/g, '%20'))||null
	}	
	
	function createOptionElement (value, title) {
		return '<option value="'+value+'">'+title+'</option>';
	} 
	
	function createTable (dataArray) {
		if (dataArray !== undefined && dataArray.length != 0) {
			var dataTable = '';
			for(var i = 0; i < dataArray.length; i++) {

				dataTable += '<tr><td>'+(i+1)+'.</td>';
				dataTable += '<td>'+dataArray[i].date+'</td>';
				dataTable += '<td><button value="'+dataArray[i].id+'" class="btn btn-default btn-sm"><i class="fa fa-times"></i></button></td></tr>';
			}				
		} else {
			dataTable = '<tr><td>nema podataka</td></tr>';
		}	
		return dataTable;
	}	
