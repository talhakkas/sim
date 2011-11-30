(function($){
  $(function(){
    $('.multiselect').multiSelect({});
    $('#multiselectHeaders').multiSelect({
      selectableHeader : '<h4>Selectable Items</h4>',
      selectedHeader : '<h4>Selected Items</h4>'
    });
    
    $('#simpleCountries').multiSelect({});

    $('#empty-array-select').multiSelect({ emptyArray: true})
    
    $('#callback').multiSelect({
      afterSelect: function(value, text){
        alert('Seçilen ders : \n'+text);
      },
      afterDeselect: function(value, text){
        alert('Silinen ders : \n'+text);
      }
    });
    
    $('#selectAll').click(function(){
      $('#outsideCountries').multiSelect('select_all');
      return false;
    });
    
    $('#deselectAll').click(function(){
      $('#outsideCountries').multiSelect('deselect_all');
      return false;
    });
    
    $('#selectFR').click(function(){
      $('#outsideCountries').multiSelect('select', 'fr');
      return false;
    });
    
    $('#deselectFR').click(function(){
      $('#outsideCountries').multiSelect('deselect', 'fr');
      return false;
    });
    
    
    $('#demos-menu li').click(function(){
      $('#demos-menu li').removeClass('active');
      $('#demos-content').children('div').hide();
      $(this).addClass('active');
      $('#demos-content .'+$(this).attr('id')).show();
    });
    
    $('#real-form').submit(function(){
      var value = $('#real-form').find('select').val();
      var str = value ? '['+value+']' : value;
      alert("select value:\n"+str);
      return false;
    });
    
    $('#empty-array-form').submit(function(){
      var value = $('#empty-array-form').find('select').val();
      var str = value ? '['+value+']' : value;
      alert("select value:\n"+str);
      return false;
    });
  });
})(jQuery)
