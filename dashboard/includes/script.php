 <!--   Core   -->
 <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>

<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

  <script src="../assets/js/plugins/jquery/dist/jquery.min.js"></script>

  <script src="../assets/js/plugins/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  <!--   Optional JS   -->
  <script src="../assets/js/plugins/clipboard/dist/clipboard.min.js"></script>
  <!--   Argon JS   -->
  <script src="../assets/js/argon-dashboard.min.js?v=1.1.0"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdn.trackjs.com/agent/v3/latest/t.js"></script>

  <script type="text/javascript" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
  <script type="text/javascript">
  	
  	$(document).ready( function () {
    $('#myTable').DataTable();
} );
  </script>


  <script type="text/javascript">
    
    $(document).ready(function(){

      $("#submit_skills").click(function()
      {
		  alert("saving in progress");
		  var myform=document.getElementById("qwerq");
		  alert(myform);
        var formData = new FormData(myform);
        $.ajax({
          url: "data_fetch.php",
          method:"POST",
          data:formData,
		  			cache: false,
			contentType: false,
			processData: false,
          success:function(data){
            alert(data);



          }
        });
      });

    }); 
    


  </script>
 
<!--   
-->