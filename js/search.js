 $(document).ready(function() {

    $('#searchindex').keyup(function() {
        var txt = $(this).val();
        if (txt != '')
        {
            $.ajax({
                url: "actionindex.php",
                method: "post",
                data: {search:txt},
                dataType: "text",
                success: function(data)
                {
                    $('#display_item').html(data);
                }
            });
        }
        else {
            $('#display_item').html('');
            $.ajax({
                url: "actionindexout.php",
                method: "post",
                data: {search:txt},
                dataType: "text",
                success: function(data)
                {
                    $('#display_item').html(data);
                }
            });
        }
    });

    $('#searchme').keyup(function() {
        var txt = $(this).val();
        if (txt != '')
        {
            $.ajax({
                url: "actionfind.php",
                method: "post",
                data: {search:txt},
                dataType: "text",
                success: function(data)
                {
                    $('#display_item').html(data);
                }
            });
        }
        else {
            $('#display_item').html('');
            $.ajax({
                url: "actionfind.php",
                method: "post",
                data: {search:txt},
                dataType: "text",
                success: function(data)
                {
                    $('#display_item').html(data);
                }
            });
        }
    });

    $(".radiobtn").click(function() {
      var action = 'data';
      var type = getFilterText('typeradio');
      var category = getFilterText('categoryradio');
      var recommended = getFilterText('recommendedradio');

      $.ajax({
        url:'actionsearch.php',
        method:'POST',
        data:{action:action, type:type, category:category, recommended:recommended},
        success:function(response){
          $("#display_item").html(response);
        }
      })
    });

    function getFilterText(text_id) {
  
      var filterData = [];
      $('#'+text_id+':checked').each(function() {
        filterData.push($(this).val());
      });
      return filterData;
    }	
  })