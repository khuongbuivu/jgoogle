function getNewPost(url){
	if (FaceSeo.search(domain)<0)
		return;
	var myTable = '' ;
};



function getDetails(id)
{
var myTable = '' ;
myTable += '<table id="myTable" cellspacing=0 cellpadding=2 border=1>' ;
var id_val = id.value;

var url = "json.php?id="+id_val;
  $.getJSON(url, function(json) {
                var select = $('#city-list');
                $.each(json, function(k, v) {    
                  myTable +=   "<tr><td>"+k+"</td><td>"+v+"</td></tr>";    
                });
				$("#stud_tbl").html(myTable) ;
				
        });
}

function getAllDetails()
{
var myTable = '' ;
myTable += '<table id="myTable" cellspacing=0 cellpadding=2 border=1>' ;
  myTable +=   "<tr><td><b>No</b></td><td><b>Full Name</b></td><td><b>Mark1</b></td><td><b>Mark2</b></td><td><b>Mark3</b></td></tr>";    


var url = "json-example2.php";
  $.getJSON(url, function(json) {
           //i=1;
                $.each(json, function(k, v) { 	

				myTable +=   "<tr><td>"+v.reg_no+
"</td><td>"+v.full_name+
"</td><td>"+v.mark1+
"</td><td>"+v.mark2+
"</td><td>"+v.mark3+
"</td></tr>";   

                });
				$("#stud_tbl").html(myTable) ;
				
        });
}

