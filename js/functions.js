$(document).ready(function() {
    function fetchData() {
    	$.ajax({
    		url: "select.php",
    		method: "POST",
    		success: function(data) {
    			$("#liveData").html(data);
    		}
    	});
    }

    function editData(id, text, columnName) {
    	$.ajax({
    		url: "edit.php",
    		method: "POST",
    		data: {id:id, text:text, columnName:columnName},
    		dataType: "text",
    		success: function(data) {
    			fetchData();
    		}
    	});
    }

    fetchData();

    $(document).on('click', '#btnAdd', function() {
    	var firstName = $("#firstName").text();
    	var lastName = $("#lastName").text();

    	if(firstName == "") {
    		alert("Enter First Name!");
    		return false;
    	}

    	if(lastName == "") {
    		alert("Enter Last Name!");
    		return false;
    	}

    	$.ajax({
    		url: "insert.php",
    		method: "POST",
    		data: {firstName:firstName, lastName:lastName},
    		dataType: "text",
    		success: function(data) {
    			fetchData();
    		}
    	});
    });

    $(document).on("blur", ".firstName", function() {
    	var id = $(this).data("id1");
    	var firstName = $(this).text();
    	editData(id, firstName, "first_name");
    });

    $(document).on("blur", ".lastName", function() {
    	var id = $(this).data("id2");
    	var lastName = $(this).text();
    	editData(id, lastName, "last_name");
    } );

    $(document).on("click", ".btnDelete", function() {
    	var id = $(this).data("id3");
    	if(confirm("Are you want to delete this?")) {
    		$.ajax({
    			url: "delete.php",
    			method: "POST",
    			data: {id:id},
    			dataType: "text",
    			success: function() {
    				fetchData();
    			}
    		});
    	}
    });
});