 
// Edit Jasa
 $(document).ready(function(){
    $('#myModal').on('show.bs.modal', function (e){
      
      var rowid = $(e.relatedTarget).data('id');
      $.ajax({
        type:'post',
        url:'content/modal_jasa.php',
        data: 'rowid='+rowid,
        success: function(data){
          $('.fatched-data').html(data)
        }
      });
    });

  });





 // Edit Petugas
  $(document).ready(function(){
    $('#myModalptg').on('show.bs.modal', function (e){
      
      var rowid = $(e.relatedTarget).data('id');
      $.ajax({
        type:'post',
        url:'content/modal_ptg.php',
        data: 'rowid='+rowid,
        success: function(data){
          $('.fatched-data').html(data)
        }
      });
    });

  });



  // Edit Pelanggan
  $(document).ready(function(){
    $('#myModalplg').on('show.bs.modal', function (e){
      
      var rowid = $(e.relatedTarget).data('id');
      $.ajax({
        type:'post',
        url:'content/modal_plg.php',
        data: 'rowid='+rowid,
        success: function(data){
          $('.fatched-data').html(data)
        }
      });
    });

  });



  