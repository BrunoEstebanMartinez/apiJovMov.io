$(document).ready(function(){


    
           
  function inLiveQuery(todo = ''){
        $.ajax({
            url: 'busqueda/',
            method: 'GET',
            data:{
                todo:todo,
              
                },
            success:function(data){
               var isData = $(data).find('tbody').html();
               console.log(isData);
               $('tbody').html(isData);
               
            }
        })
    }

    function allDataQuery(){
        $.ajax({
            url:"",
            method:'GET',
            success:function(data){
                var isFlush = $(data).find('tbody').html();
                $('tbody').html(isFlush);
                
            }
        })
       
    }

    
    $(document).on('keyup', '#isSearch', function(){
        var search = $(this).val();
            if(search != ''){
                inLiveQuery(search);
            }else{
                var search = $(this).val('');
                allDataQuery();
            }

                
        });



});