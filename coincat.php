<!DOCTYPE html>
<html lang="en">
<head>
  <title>Aeolian Alexanders: Coin Catalog</title>
  <meta charset="utf-8">
  <link rel="icon" type="image/svg+xml" href="/aeolis/img/aeolis_logo.svg">
  <link rel="alternate icon" href="/aeolis/favicon.ico">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>

    <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
  	<script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
  	<link rel="stylesheet" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css">

<style>
tfoot input {
        width: 80%;
        padding: 3px;
        box-sizing: border-box;
    }
</style>
  </head>
  <body style="margin:0;">
<?php
    include('nav.php');
      ?>
      <main role="main">
<br />
  <br />
  <br />
<h2>Double Click to open coin information in a new window.</h2>
    <div id="table">
      <center>
      <table id="coin_list" class="display">
    		<thead>
    			<tr>
    				<th>Coin ID</th>
    				<th>Mint</th>
    				<th>Type ID</th>
            <th>Weight</th>
            <th>Size</th>
            <th>Rotation</th>
    				<th>Obverse Die</th>
    				<th>Reverse Die</th>
    				<th>Title</th>
    				<th>Notes</th>
    			</tr>
    		</thead>
    		<tfoot>
    			<tr>
    				<th>Coin ID</th>
    				<th>Mint</th>
    				<th>Type ID</th>
            <th>Weight</th>
            <th>Size</th>
            <th>Rotation</th>
    				<th>Obverse Die</th>
    				<th>Reverse Die</th>
    				<th>Title</th>
    				<th>Notes</th>
    			</tr>
    		</tfoot>
    	</table>
    </center>
    </div>


  </main>

  </body>
  <script>


    $(document).ready(function() {

      $('#coin_list tfoot th').each( function () {
          var title = $(this).text();
          $(this).html( '<input type="text" placeholder="Search '+title+'" />' );
      } );


      var coinList = $('#coin_list').DataTable({
        initComplete: function () {
            // Apply the search
            this.api().columns().every( function () {
                var that = this;

                $( 'input', this.footer() ).on( 'keyup change clear', function () {
                    if ( that.search() !== this.value ) {
                        that
                            .search( this.value )
                            .draw();
                    }
                } );
            } );
        },



          "bAutoWidth": false,
          "processing": true,
          "serverSide": true,
          "ajax": {
              "url": "coin_proc",
              "type": "POST"
          },
          "columns": [{
                  "data": "id",
                  "render": function ( data) {
                    return '<a href="coins/' + data + '" target="_blank" return data-title="This is my tooltip content for:'+data+'" data-toggle="tooltip" data-trigger="hover">' + data+'</a>';
                  }
              },
              {
                  "data": "mint",
                  "render": function ( data) {
                    return '<a href="http://pleiades.stoa.org/places/' + data + '" target="_blank">' + data+'</a>';
                  }

              },
              {
                  "data": "type",
                  "render": function ( data ) {
                    return '<a href="http://numismatics.org/pella/id/price.' + data + '" target="_blank">' + data+'</a>';
                  }
              },
              {
                  "data": "weight"
              },
              {
                  "data": "size"
              },
              {
                  "data": "rotation"
              },
              {
                  "data": "obverse",
                  "render": function ( data) {
                    return '<a href="/aeolis/obversedies/' + data + '" target="_blank" return data-title="This is my tooltip content for:'+data+'" data-toggle="tooltip" data-trigger="hover">' + data+'</a>';
                  }

              },
              {
                  "data": "reverse",
                  "render": function ( data) {
                    return '<a href="/aeolis/reversedies/' + data + '" target="_blank" return data-title="This is my tooltip content for:'+data+'" data-toggle="tooltip" data-trigger="hover">' + data+'</a>';
                  }

              },
              {
                  "data": "title"
              },
              {
                  "data": "notes"
              }
          ]
      });

      $('#coin_list tbody').on('dblclick', 'tr', function() {
        var data = coinList.row(this).data();
        var filePath = 'http://localhost/aeolianalexanders/coins/'+ data['id'];
        var win = window.open(filePath, '_blank');
        win.focus();
      });
});

  </script>

</html>
